<?php

namespace App\Services;

use App\Models\TelegramPost;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TelegramService
{
    public function sendNewProduct(Product $product): bool
    {
        $token = (string) env('TELEGRAM_BOT_TOKEN', '');
        $channel = (string) env('TELEGRAM_CHANNEL_ID', '@aurawomenuz');
        $caption = $this->buildCaption($product);

        $post = TelegramPost::create([
            'product_id' => $product->id,
            'title' => $product->name,
            'description' => $product->description,
            'image' => $product->image,
            'caption' => $caption,
            'status' => 'pending',
            'telegram_chat_id' => $channel,
        ]);

        if ($token === '' || $channel === '') {
            $post->update([
                'status' => 'failed',
                'error_message' => 'Telegram token or channel is missing.',
            ]);
            return false;
        }

        $apiUrl = sprintf('https://api.telegram.org/bot%s', $token);
        $response = null;

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            $filePath = Storage::disk('public')->path($product->image);
            $response = Http::attach(
                'photo',
                fopen($filePath, 'r'),
                basename($product->image)
            )->post($apiUrl . '/sendPhoto', [
                'chat_id' => $channel,
                'caption' => $caption,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => false,
            ]);
        } else {
            $response = Http::post($apiUrl . '/sendMessage', [
                'chat_id' => $channel,
                'text' => $caption,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => false,
            ]);
        }

        if ($response->successful()) {
            $payload = $response->json('result', []);
            $messageId = data_get($payload, 'message_id');
            $chatId = data_get($payload, 'chat.id', $channel);

            $post->update([
                'status' => 'sent',
                'telegram_message_id' => $messageId ? (string) $messageId : null,
                'telegram_chat_id' => $chatId ? (string) $chatId : $channel,
                'telegram_url' => $messageId ? $this->buildTelegramUrl($chatId ?: $channel, $messageId) : null,
                'sent_at' => now(),
                'error_message' => null,
            ]);

            return true;
        }

        $post->update([
            'status' => 'failed',
            'error_message' => $response->body(),
        ]);

        return false;
    }

    private function buildCaption(Product $product): string
    {
        $name = e($product->name);
        $category = e($product->category ?? 'Uncategorized');
        $price = number_format((float) ($product->final_price ?? $product->price ?? 0), 2);
        $description = Str::limit(strip_tags((string) $product->description), 300);
        $description = e($description);
        $productUrl = url('/admin/products/' . $product->id . '/edit');

        $lines = [
            '<b>Yangi mahsulot</b>',
            '',
            '<b>Nomi:</b> ' . $name,
            '<b>Kategoriya:</b> ' . $category,
            '<b>Narx:</b> $' . $price,
        ];

        if ($description !== '') {
            $lines[] = '<b>Tavsif:</b> ' . $description;
        }

        $lines[] = '';
        $lines[] = '<a href="' . e($productUrl) . '">Mahsulotni ko‘rish</a>';
        $lines[] = '<a href="https://t.me/aurawomenuz">@aurawomenuz</a>';

        return implode("\n", $lines);
    }

    private function buildTelegramUrl(string $chatId, string|int $messageId): ?string
    {
        if (Str::startsWith($chatId, '@')) {
            return 'https://t.me/' . ltrim($chatId, '@') . '/' . $messageId;
        }

        return null;
    }

}

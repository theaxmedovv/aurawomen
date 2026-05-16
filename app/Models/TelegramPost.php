<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'title',
        'description',
        'image',
        'caption',
        'status',
        'telegram_message_id',
        'telegram_chat_id',
        'telegram_url',
        'sent_at',
        'error_message',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

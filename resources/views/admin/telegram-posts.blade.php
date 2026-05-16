@extends('admin.layout')

@section('title', 'Telegram Posts')
@section('page-title', 'Telegram Posts Management')

@section('content')
    <div class="mb-6 flex items-center justify-between gap-4 flex-wrap">
        <div>
            <h3 class="text-xl font-bold text-slate-800">Telegram postlar</h3>
            <p class="text-sm text-slate-500">Mahsulot qo‘shilganda yaratilgan postlar ro‘yxati.</p>
        </div>
        <a href="https://t.me/aurawomenuz" target="_blank" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:shadow-lg transition">
            <i class="fab fa-telegram mr-2"></i>Open Channel
        </a>
    </div>

    @forelse($posts as $post)
        <div class="dashboard-card mb-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 rounded-xl bg-slate-100 overflow-hidden flex items-center justify-center flex-shrink-0">
                        @if($post->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($post->image))
                            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-full object-cover" alt="{{ $post->title }}">
                        @else
                            <i class="fas fa-telegram text-slate-300 text-2xl"></i>
                        @endif
                    </div>
                    <div>
                        <h4 class="text-lg font-bold text-slate-800">{{ $post->title }}</h4>
                        <p class="text-sm text-slate-500 mt-1">{{ $post->description ?? 'No description' }}</p>
                        <p class="text-xs text-slate-400 mt-2">
                            {{ $post->created_at?->format('Y-m-d H:i') }}
                            @if($post->product)
                                • Product: <a href="{{ route('admin.products.edit', $post->product_id) }}" class="text-pink-600 hover:underline">{{ $post->product->name }}</a>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-2 flex-wrap">
                    @if($post->status === 'sent')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">✓ Sent</span>
                    @elseif($post->status === 'failed')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">✗ Failed</span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">⏱ Pending</span>
                    @endif

                    @if($post->telegram_url)
                        <a href="{{ $post->telegram_url }}" target="_blank" class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 hover:bg-blue-200 transition">
                            <i class="fas fa-external-link-alt mr-1"></i>Open Post
                        </a>
                    @endif

                    @if($post->status === 'failed')
                        <button onclick="retryPost({{ $post->id }})" class="px-3 py-1 rounded-full text-xs font-bold bg-orange-100 text-orange-700 hover:bg-orange-200 transition">
                            <i class="fas fa-redo mr-1"></i>Retry
                        </button>
                    @endif

                    <button onclick="deletePost({{ $post->id }})" class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 hover:bg-red-200 transition">
                        <i class="fas fa-trash mr-1"></i>Delete
                    </button>
                </div>
            </div>

            @if($post->error_message)
                <div class="mt-4 text-xs text-red-600 bg-red-50 border border-red-100 rounded-lg p-3">
                    {{ $post->error_message }}
                </div>
            @endif
        </div>
    @empty
        <div class="dashboard-card border-dashed border-2 border-slate-200 bg-slate-50/70 text-center py-16">
            <div class="w-16 h-16 mx-auto rounded-2xl bg-white shadow-sm flex items-center justify-center text-slate-300 mb-4">
                <i class="fas fa-telegram text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-800 mb-2">Hali Telegram post yo‘q</h3>
            <p class="text-sm text-slate-500 max-w-md mx-auto">
                Yangi mahsulot qo‘shilganda bu yerda post paydo bo‘ladi va kanalga yuboriladi.
            </p>
        </div>
    @endforelse

    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    <script>
        function retryPost(postId) {
            if (confirm('Postni qayta yubormoqchisiz?')) {
                fetch(`/admin/telegram-posts/${postId}/retry`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Post muvaffaqiyatli yuborildi! Halaman qayta yuklanyapti...');
                        location.reload();
                    } else {
                        alert('Xato: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Xato yuz berdi');
                });
            }
        }

        function deletePost(postId) {
            if (confirm('Postni oʻchirishni xohlaysizmi? Bu amalni qaytarib bolmaydi!')) {
                fetch(`/admin/telegram-posts/${postId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Post muvaffaqiyatli oʻchirildi! Halaman qayta yuklanyapti...');
                        location.reload();
                    } else {
                        alert('Xato: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Xato yuz berdi');
                });
            }
        }
    </script>
@endsection

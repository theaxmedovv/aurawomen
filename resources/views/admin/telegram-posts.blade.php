@extends('admin.layout')

@section('title', 'Telegram Posts')
@section('page-title', 'Telegram Posts Management')

@section('content')
    <!-- Create Post Button -->
    <div class="mb-6">
        <button class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-3 px-6 rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Create New Post
        </button>
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
        <!-- Post Card 1 -->
        <div class="dashboard-card">
            <div class="mb-4">
                <div class="w-full h-48 rounded-lg bg-gradient-to-br from-pink-200 to-purple-200 flex items-center justify-center mb-4">
                    <i class="fas fa-image text-pink-500 text-5xl"></i>
                </div>
                <div class="flex items-center justify-between mb-3">
                    <span class="inline-block bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Published</span>
                    <span class="text-xs text-gray-500">Posted 2 hours ago</span>
                </div>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Essence Pearl - New Arrival!</h3>
            <p class="text-sm text-gray-600 mb-4">Discover our latest fragrance collection. Premium quality perfumes with exotic notes. Limited time offer - 20% off!</p>
            <div class="grid grid-cols-3 gap-3 mb-4 text-center">
                <div class="bg-blue-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Views</p>
                    <p class="text-lg font-bold text-blue-600">2.5K</p>
                </div>
                <div class="bg-pink-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Reactions</p>
                    <p class="text-lg font-bold text-pink-600">456</p>
                </div>
                <div class="bg-purple-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Shares</p>
                    <p class="text-lg font-bold text-purple-600">128</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 border border-gray-200 text-gray-700 font-semibold py-2 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-edit mr-1"></i> Edit
                </button>
                <button class="flex-1 border border-red-200 text-red-600 font-semibold py-2 rounded-lg hover:bg-red-50 transition">
                    <i class="fas fa-trash mr-1"></i> Delete
                </button>
            </div>
        </div>

        <!-- Post Card 2 -->
        <div class="dashboard-card">
            <div class="mb-4">
                <div class="w-full h-48 rounded-lg bg-gradient-to-br from-yellow-200 to-orange-200 flex items-center justify-center mb-4">
                    <i class="fas fa-image text-yellow-600 text-5xl"></i>
                </div>
                <div class="flex items-center justify-between mb-3">
                    <span class="inline-block bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Published</span>
                    <span class="text-xs text-gray-500">Posted 5 hours ago</span>
                </div>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Gold Elegance - Customer Review</h3>
            <p class="text-sm text-gray-600 mb-4">Check out what our customers are saying about our Gold Elegance collection. 5-star rated! Shop now with free shipping.</p>
            <div class="grid grid-cols-3 gap-3 mb-4 text-center">
                <div class="bg-blue-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Views</p>
                    <p class="text-lg font-bold text-blue-600">3.2K</p>
                </div>
                <div class="bg-pink-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Reactions</p>
                    <p class="text-lg font-bold text-pink-600">678</p>
                </div>
                <div class="bg-purple-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Shares</p>
                    <p class="text-lg font-bold text-purple-600">245</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 border border-gray-200 text-gray-700 font-semibold py-2 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-edit mr-1"></i> Edit
                </button>
                <button class="flex-1 border border-red-200 text-red-600 font-semibold py-2 rounded-lg hover:bg-red-50 transition">
                    <i class="fas fa-trash mr-1"></i> Delete
                </button>
            </div>
        </div>

        <!-- Post Card 3 -->
        <div class="dashboard-card">
            <div class="mb-4">
                <div class="w-full h-48 rounded-lg bg-gradient-to-br from-purple-200 to-pink-200 flex items-center justify-center mb-4">
                    <i class="fas fa-image text-purple-500 text-5xl"></i>
                </div>
                <div class="flex items-center justify-between mb-3">
                    <span class="inline-block bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1 rounded-full">Scheduled</span>
                    <span class="text-xs text-gray-500">Scheduled for tomorrow</span>
                </div>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Luxury Rose - Special Promo</h3>
            <p class="text-sm text-gray-600 mb-4">Flash sale alert! Luxury Rose collection at unbeatable prices. Only this week! Don't miss out on the best deals.</p>
            <div class="grid grid-cols-3 gap-3 mb-4 text-center">
                <div class="bg-blue-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Views</p>
                    <p class="text-lg font-bold text-blue-600">-</p>
                </div>
                <div class="bg-pink-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Reactions</p>
                    <p class="text-lg font-bold text-pink-600">-</p>
                </div>
                <div class="bg-purple-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Shares</p>
                    <p class="text-lg font-bold text-purple-600">-</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 border border-gray-200 text-gray-700 font-semibold py-2 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-edit mr-1"></i> Edit
                </button>
                <button class="flex-1 border border-red-200 text-red-600 font-semibold py-2 rounded-lg hover:bg-red-50 transition">
                    <i class="fas fa-trash mr-1"></i> Delete
                </button>
            </div>
        </div>

        <!-- Post Card 4 -->
        <div class="dashboard-card">
            <div class="mb-4">
                <div class="w-full h-48 rounded-lg bg-gradient-to-br from-green-200 to-blue-200 flex items-center justify-center mb-4">
                    <i class="fas fa-image text-green-600 text-5xl"></i>
                </div>
                <div class="flex items-center justify-between mb-3">
                    <span class="inline-block bg-gray-100 text-gray-700 text-xs font-bold px-3 py-1 rounded-full">Draft</span>
                    <span class="text-xs text-gray-500">Not published</span>
                </div>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">Summer Collection Preview</h3>
            <p class="text-sm text-gray-600 mb-4">Get ready for summer! Preview of our upcoming summer fragrance collection. Coming next week with exclusive early access for subscribers.</p>
            <div class="grid grid-cols-3 gap-3 mb-4 text-center">
                <div class="bg-blue-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Views</p>
                    <p class="text-lg font-bold text-blue-600">-</p>
                </div>
                <div class="bg-pink-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Reactions</p>
                    <p class="text-lg font-bold text-pink-600">-</p>
                </div>
                <div class="bg-purple-50 rounded-lg py-2">
                    <p class="text-xs text-gray-600">Shares</p>
                    <p class="text-lg font-bold text-purple-600">-</p>
                </div>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 border border-gray-200 text-gray-700 font-semibold py-2 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-edit mr-1"></i> Edit
                </button>
                <button class="flex-1 border border-green-200 text-green-600 font-semibold py-2 rounded-lg hover:bg-green-50 transition">
                    <i class="fas fa-check mr-1"></i> Publish
                </button>
            </div>
        </div>
    </div>
@endsection

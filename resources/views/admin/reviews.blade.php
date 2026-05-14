@extends('admin.layout')

@section('title', 'Reviews Management')
@section('page-title', 'Product Reviews')

@section('content')
    <div class="mb-6 flex gap-4">
        <input type="text" placeholder="Search by customer or product..." class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
        <select class="px-4 py-2 border border-gray-200 rounded-lg">
            <option>All Ratings</option>
            <option>5 Stars</option>
            <option>4 Stars</option>
            <option>3 Stars</option>
            <option>2 Stars</option>
            <option>1 Star</option>
        </select>
        <select class="px-4 py-2 border border-gray-200 rounded-lg">
            <option>All Status</option>
            <option>Approved</option>
            <option>Pending</option>
            <option>Rejected</option>
        </select>
    </div>

    <div class="space-y-4">
        <!-- Review Card 1 -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <p class="font-bold text-gray-800">Essence Pearl Perfume - Outstanding!</p>
                    <p class="text-sm text-gray-600 mt-1">By Sarah Mitchell</p>
                </div>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Approved</span>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <span class="text-yellow-400"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                <span class="text-sm text-gray-600">5/5</span>
            </div>
            <p class="text-gray-600 text-sm mb-3">Amazing fragrance! The scent is absolutely gorgeous and lasts all day. Highly recommended for anyone looking for a premium perfume. Will definitely order again!</p>
            <div class="flex gap-2">
                <button class="text-red-500 hover:text-red-700 text-sm font-semibold"><i class="fas fa-check-circle mr-1"></i>Approve</button>
                <button class="text-gray-500 hover:text-gray-700 text-sm font-semibold"><i class="fas fa-trash mr-1"></i>Delete</button>
            </div>
        </div>

        <!-- Review Card 2 -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <p class="font-bold text-gray-800">Luxury Rose Collection - Beautiful but Pricey</p>
                    <p class="text-sm text-gray-600 mt-1">By Emma Johnson</p>
                </div>
                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-bold">Pending</span>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <span class="text-yellow-400"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></span>
                <span class="text-sm text-gray-600">4.5/5</span>
            </div>
            <p class="text-gray-600 text-sm mb-3">Lovely fragrance with complex notes. A bit expensive but the quality justifies the price. Perfect for special occasions.</p>
            <div class="flex gap-2">
                <button class="text-green-600 hover:text-green-700 text-sm font-semibold"><i class="fas fa-check-circle mr-1"></i>Approve</button>
                <button class="text-gray-500 hover:text-gray-700 text-sm font-semibold"><i class="fas fa-trash mr-1"></i>Delete</button>
            </div>
        </div>

        <!-- Review Card 3 -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <p class="font-bold text-gray-800">Gold Elegance EDP - Decent</p>
                    <p class="text-sm text-gray-600 mt-1">By Jessica Clark</p>
                </div>
                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold">Rejected</span>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <span class="text-yellow-400"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="fas fa-star text-gray-300"></i></span>
                <span class="text-sm text-gray-600">3.5/5</span>
            </div>
            <p class="text-gray-600 text-sm mb-3">It's okay. Smells nice but fades quickly. Expected better for the price point.</p>
            <div class="flex gap-2">
                <button class="text-green-600 hover:text-green-700 text-sm font-semibold"><i class="fas fa-check-circle mr-1"></i>Approve</button>
                <button class="text-gray-500 hover:text-gray-700 text-sm font-semibold"><i class="fas fa-trash mr-1"></i>Delete</button>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layout')

@section('title', 'Delivery Tracking')
@section('page-title', 'Delivery Tracking')

@section('content')
    <div class="mb-6">
        <input type="text" placeholder="Search by order ID..." class="w-full md:w-64 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
    </div>

    <div class="space-y-6">
        <!-- Delivery 1 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h3 class="font-bold text-gray-800">#ORD-2456</h3>
                    <p class="text-sm text-gray-600">Sarah Mitchell</p>
                </div>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Delivered</span>
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center"><i class="fas fa-check"></i></div>
                        <div class="w-1 h-12 bg-green-500 my-2"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Order Confirmed</p>
                        <p class="text-xs text-gray-500">May 10, 2024 - 10:30 AM</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center"><i class="fas fa-check"></i></div>
                        <div class="w-1 h-12 bg-green-500 my-2"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Packed</p>
                        <p class="text-xs text-gray-500">May 11, 2024 - 2:15 PM</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center"><i class="fas fa-check"></i></div>
                        <div class="w-1 h-12 bg-green-500 my-2"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Shipped</p>
                        <p class="text-xs text-gray-500">May 12, 2024 - 4:45 PM</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center"><i class="fas fa-check"></i></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Delivered</p>
                        <p class="text-xs text-gray-500">May 14, 2024 - 10:00 AM</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delivery 2 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <h3 class="font-bold text-gray-800">#ORD-2455</h3>
                    <p class="text-sm text-gray-600">Emma Johnson</p>
                </div>
                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">In Transit</span>
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center"><i class="fas fa-check"></i></div>
                        <div class="w-1 h-12 bg-green-500 my-2"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Order Confirmed</p>
                        <p class="text-xs text-gray-500">May 13, 2024 - 9:00 AM</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-green-500 text-white flex items-center justify-center"><i class="fas fa-check"></i></div>
                        <div class="w-1 h-12 bg-green-500 my-2"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Packed</p>
                        <p class="text-xs text-gray-500">May 13, 2024 - 3:30 PM</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center"><i class="fas fa-truck"></i></div>
                        <div class="w-1 h-12 bg-gray-300 my-2"></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Shipped</p>
                        <p class="text-xs text-gray-500">May 14, 2024 - 5:00 PM</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center"><i class="fas fa-clock"></i></div>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">Out for Delivery</p>
                        <p class="text-xs text-gray-500">Expected May 15, 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

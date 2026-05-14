@extends('admin.layout')

@section('title', 'Customers Management')
@section('page-title', 'Customers Management')

@section('content')
    <!-- Search and Filter -->
    <div class="dashboard-card mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <input type="text" placeholder="Search by name or email..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200">
            </div>
            <div>
                <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    <option>All Loyalty Levels</option>
                    <option>Bronze</option>
                    <option>Silver</option>
                    <option>Gold</option>
                    <option>Platinum</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 px-4 rounded-lg hover:shadow-lg transition">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Customers Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Customer Card 1 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-pink-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Sarah Mitchell</h3>
                        <p class="text-xs text-gray-500">sarah@email.com</p>
                    </div>
                </div>
                <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-2 py-1 rounded-full">Gold</span>
            </div>
            <div class="border-t border-gray-100 pt-4 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-semibold text-gray-800">+1 (555) 234-5678</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Orders:</span>
                    <span class="font-semibold text-gray-800">24</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Total Spent:</span>
                    <span class="font-semibold text-pink-500">$3,245.99</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Join Date:</span>
                    <span class="font-semibold text-gray-800">Jan 15, 2023</span>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <button class="flex-1 bg-blue-100 text-blue-700 font-semibold py-2 rounded-lg hover:bg-blue-200 transition text-sm">
                    <i class="fas fa-eye mr-1"></i> View Profile
                </button>
                <button class="flex-1 bg-purple-100 text-purple-700 font-semibold py-2 rounded-lg hover:bg-purple-200 transition text-sm">
                    <i class="fas fa-envelope mr-1"></i> Email
                </button>
            </div>
        </div>

        <!-- Customer Card 2 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-400 to-purple-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Emma Johnson</h3>
                        <p class="text-xs text-gray-500">emma@email.com</p>
                    </div>
                </div>
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-full">Silver</span>
            </div>
            <div class="border-t border-gray-100 pt-4 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-semibold text-gray-800">+1 (555) 345-6789</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Orders:</span>
                    <span class="font-semibold text-gray-800">12</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Total Spent:</span>
                    <span class="font-semibold text-pink-500">$1,876.50</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Join Date:</span>
                    <span class="font-semibold text-gray-800">Mar 22, 2023</span>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <button class="flex-1 bg-blue-100 text-blue-700 font-semibold py-2 rounded-lg hover:bg-blue-200 transition text-sm">
                    <i class="fas fa-eye mr-1"></i> View Profile
                </button>
                <button class="flex-1 bg-purple-100 text-purple-700 font-semibold py-2 rounded-lg hover:bg-purple-200 transition text-sm">
                    <i class="fas fa-envelope mr-1"></i> Email
                </button>
            </div>
        </div>

        <!-- Customer Card 3 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Jessica Clark</h3>
                        <p class="text-xs text-gray-500">jessica@email.com</p>
                    </div>
                </div>
                <span class="bg-red-100 text-red-700 text-xs font-bold px-2 py-1 rounded-full">Bronze</span>
            </div>
            <div class="border-t border-gray-100 pt-4 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-semibold text-gray-800">+1 (555) 456-7890</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Orders:</span>
                    <span class="font-semibold text-gray-800">5</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Total Spent:</span>
                    <span class="font-semibold text-pink-500">$748.25</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Join Date:</span>
                    <span class="font-semibold text-gray-800">May 10, 2024</span>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <button class="flex-1 bg-blue-100 text-blue-700 font-semibold py-2 rounded-lg hover:bg-blue-200 transition text-sm">
                    <i class="fas fa-eye mr-1"></i> View Profile
                </button>
                <button class="flex-1 bg-purple-100 text-purple-700 font-semibold py-2 rounded-lg hover:bg-purple-200 transition text-sm">
                    <i class="fas fa-envelope mr-1"></i> Email
                </button>
            </div>
        </div>

        <!-- Customer Card 4 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-red-400 to-red-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Rachel Adams</h3>
                        <p class="text-xs text-gray-500">rachel@email.com</p>
                    </div>
                </div>
                <span class="bg-purple-100 text-purple-700 text-xs font-bold px-2 py-1 rounded-full">Platinum</span>
            </div>
            <div class="border-t border-gray-100 pt-4 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-semibold text-gray-800">+1 (555) 567-8901</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Orders:</span>
                    <span class="font-semibold text-gray-800">48</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Total Spent:</span>
                    <span class="font-semibold text-pink-500">$7,892.45</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Join Date:</span>
                    <span class="font-semibold text-gray-800">Aug 5, 2022</span>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <button class="flex-1 bg-blue-100 text-blue-700 font-semibold py-2 rounded-lg hover:bg-blue-200 transition text-sm">
                    <i class="fas fa-eye mr-1"></i> View Profile
                </button>
                <button class="flex-1 bg-purple-100 text-purple-700 font-semibold py-2 rounded-lg hover:bg-purple-200 transition text-sm">
                    <i class="fas fa-envelope mr-1"></i> Email
                </button>
            </div>
        </div>

        <!-- Customer Card 5 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-rose-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Olivia Davis</h3>
                        <p class="text-xs text-gray-500">olivia@email.com</p>
                    </div>
                </div>
                <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-2 py-1 rounded-full">Gold</span>
            </div>
            <div class="border-t border-gray-100 pt-4 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-semibold text-gray-800">+1 (555) 678-9012</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Orders:</span>
                    <span class="font-semibold text-gray-800">31</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Total Spent:</span>
                    <span class="font-semibold text-pink-500">$4,156.75</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Join Date:</span>
                    <span class="font-semibold text-gray-800">Feb 28, 2023</span>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <button class="flex-1 bg-blue-100 text-blue-700 font-semibold py-2 rounded-lg hover:bg-blue-200 transition text-sm">
                    <i class="fas fa-eye mr-1"></i> View Profile
                </button>
                <button class="flex-1 bg-purple-100 text-purple-700 font-semibold py-2 rounded-lg hover:bg-purple-200 transition text-sm">
                    <i class="fas fa-envelope mr-1"></i> Email
                </button>
            </div>
        </div>

        <!-- Customer Card 6 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-400 to-green-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Victoria White</h3>
                        <p class="text-xs text-gray-500">victoria@email.com</p>
                    </div>
                </div>
                <span class="bg-red-100 text-red-700 text-xs font-bold px-2 py-1 rounded-full">Bronze</span>
            </div>
            <div class="border-t border-gray-100 pt-4 space-y-3">
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Phone:</span>
                    <span class="font-semibold text-gray-800">+1 (555) 789-0123</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Orders:</span>
                    <span class="font-semibold text-gray-800">8</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Total Spent:</span>
                    <span class="font-semibold text-pink-500">$1,234.50</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Join Date:</span>
                    <span class="font-semibold text-gray-800">Apr 12, 2024</span>
                </div>
            </div>
            <div class="mt-4 flex gap-2">
                <button class="flex-1 bg-blue-100 text-blue-700 font-semibold py-2 rounded-lg hover:bg-blue-200 transition text-sm">
                    <i class="fas fa-eye mr-1"></i> View Profile
                </button>
                <button class="flex-1 bg-purple-100 text-purple-700 font-semibold py-2 rounded-lg hover:bg-purple-200 transition text-sm">
                    <i class="fas fa-envelope mr-1"></i> Email
                </button>
            </div>
        </div>
    </div>
@endsection

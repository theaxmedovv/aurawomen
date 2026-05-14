@extends('admin.layout')

@section('title', 'Staff Management')
@section('page-title', 'Staff Management')

@section('content')
    <div class="mb-6">
        <button class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 px-6 rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add Staff Member
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Staff Card 1 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-400 to-pink-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Sarah Mitchell</h3>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                </div>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">Active</span>
            </div>
            <div class="space-y-2 text-sm mb-4">
                <p class="text-gray-600"><i class="fas fa-envelope text-pink-500 mr-2"></i>sarah@aurawomenuz.com</p>
                <p class="text-gray-600"><i class="fas fa-phone text-pink-500 mr-2"></i>+1 (555) 234-5678</p>
                <p class="text-gray-600"><i class="fas fa-calendar text-pink-500 mr-2"></i>Joined Jan 2023</p>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 border border-blue-200 text-blue-600 font-semibold py-1 rounded text-sm hover:bg-blue-50">Edit</button>
                <button class="flex-1 border border-red-200 text-red-600 font-semibold py-1 rounded text-sm hover:bg-red-50">Remove</button>
            </div>
        </div>

        <!-- Staff Card 2 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-400 to-purple-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Emma Johnson</h3>
                        <p class="text-xs text-gray-500">Manager</p>
                    </div>
                </div>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">Active</span>
            </div>
            <div class="space-y-2 text-sm mb-4">
                <p class="text-gray-600"><i class="fas fa-envelope text-pink-500 mr-2"></i>emma@aurawomenuz.com</p>
                <p class="text-gray-600"><i class="fas fa-phone text-pink-500 mr-2"></i>+1 (555) 345-6789</p>
                <p class="text-gray-600"><i class="fas fa-calendar text-pink-500 mr-2"></i>Joined Mar 2023</p>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 border border-blue-200 text-blue-600 font-semibold py-1 rounded text-sm hover:bg-blue-50">Edit</button>
                <button class="flex-1 border border-red-200 text-red-600 font-semibold py-1 rounded text-sm hover:bg-red-50">Remove</button>
            </div>
        </div>

        <!-- Staff Card 3 -->
        <div class="dashboard-card">
            <div class="flex items-start justify-between mb-4">
                <div class="flex gap-3">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Jessica Clark</h3>
                        <p class="text-xs text-gray-500">Support Staff</p>
                    </div>
                </div>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">Active</span>
            </div>
            <div class="space-y-2 text-sm mb-4">
                <p class="text-gray-600"><i class="fas fa-envelope text-pink-500 mr-2"></i>jessica@aurawomenuz.com</p>
                <p class="text-gray-600"><i class="fas fa-phone text-pink-500 mr-2"></i>+1 (555) 456-7890</p>
                <p class="text-gray-600"><i class="fas fa-calendar text-pink-500 mr-2"></i>Joined May 2023</p>
            </div>
            <div class="flex gap-2">
                <button class="flex-1 border border-blue-200 text-blue-600 font-semibold py-1 rounded text-sm hover:bg-blue-50">Edit</button>
                <button class="flex-1 border border-red-200 text-red-600 font-semibold py-1 rounded text-sm hover:bg-red-50">Remove</button>
            </div>
        </div>
    </div>
@endsection

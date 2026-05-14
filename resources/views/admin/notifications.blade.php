@extends('admin.layout')

@section('title', 'Notifications')
@section('page-title', 'Notifications Center')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Notifications -->
        <div class="lg:col-span-2">
            <div class="dashboard-card">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Recent Notifications</h3>
                <div class="space-y-4">
                    <div class="p-4 border-l-4 border-green-500 bg-green-50 rounded-lg flex justify-between items-start">
                        <div class="flex gap-3">
                            <i class="fas fa-check-circle text-green-500 text-lg mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Order #2456 Delivered</p>
                                <p class="text-sm text-gray-600 mt-1">Customer Sarah Mitchell received their order</p>
                                <p class="text-xs text-gray-500 mt-2">2 minutes ago</p>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
                    </div>

                    <div class="p-4 border-l-4 border-blue-500 bg-blue-50 rounded-lg flex justify-between items-start">
                        <div class="flex gap-3">
                            <i class="fas fa-user-plus text-blue-500 text-lg mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">New Customer Registration</p>
                                <p class="text-sm text-gray-600 mt-1">Emma Johnson joined AuraWomenuz</p>
                                <p class="text-xs text-gray-500 mt-2">15 minutes ago</p>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
                    </div>

                    <div class="p-4 border-l-4 border-pink-500 bg-pink-50 rounded-lg flex justify-between items-start">
                        <div class="flex gap-3">
                            <i class="fas fa-star text-pink-500 text-lg mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">New Product Review</p>
                                <p class="text-sm text-gray-600 mt-1">5-star review on Essence Pearl Perfume</p>
                                <p class="text-xs text-gray-500 mt-2">32 minutes ago</p>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
                    </div>

                    <div class="p-4 border-l-4 border-orange-500 bg-orange-50 rounded-lg flex justify-between items-start">
                        <div class="flex gap-3">
                            <i class="fas fa-exclamation-triangle text-orange-500 text-lg mt-1"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Low Stock Alert</p>
                                <p class="text-sm text-gray-600 mt-1">Gold Elegance EDP - Only 5 items remaining</p>
                                <p class="text-xs text-gray-500 mt-2">1 hour ago</p>
                            </div>
                        </div>
                        <button class="text-gray-400 hover:text-gray-600"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notification Settings -->
        <div class="dashboard-card">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Notification Preferences</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <label class="text-sm font-semibold text-gray-700">Order Alerts</label>
                    <input type="checkbox" checked class="w-5 h-5">
                </div>
                <div class="flex items-center justify-between">
                    <label class="text-sm font-semibold text-gray-700">Customer Alerts</label>
                    <input type="checkbox" checked class="w-5 h-5">
                </div>
                <div class="flex items-center justify-between">
                    <label class="text-sm font-semibold text-gray-700">Product Alerts</label>
                    <input type="checkbox" checked class="w-5 h-5">
                </div>
                <div class="flex items-center justify-between">
                    <label class="text-sm font-semibold text-gray-700">Payment Alerts</label>
                    <input type="checkbox" checked class="w-5 h-5">
                </div>
                <div class="flex items-center justify-between">
                    <label class="text-sm font-semibold text-gray-700">Telegram Notifications</label>
                    <input type="checkbox" checked class="w-5 h-5">
                </div>
                <div class="flex items-center justify-between">
                    <label class="text-sm font-semibold text-gray-700">Email Notifications</label>
                    <input type="checkbox" checked class="w-5 h-5">
                </div>
                <button class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 rounded-lg hover:shadow-lg transition mt-4">
                    Save Settings
                </button>
            </div>
        </div>
    </div>
@endsection

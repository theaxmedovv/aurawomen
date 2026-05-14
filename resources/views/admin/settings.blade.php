@extends('admin.layout')

@section('title', 'Settings')
@section('page-title', 'Settings')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Settings Menu -->
        <div class="dashboard-card h-fit">
            <div class="space-y-2">
                <button class="w-full text-left px-4 py-3 rounded-lg bg-pink-50 text-pink-600 font-semibold border-l-4 border-pink-500">
                    <i class="fas fa-globe mr-2"></i>Website Settings
                </button>
                <button class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100 text-gray-700 font-semibold transition">
                    <i class="fab fa-telegram mr-2"></i>Bot Settings
                </button>
                <button class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100 text-gray-700 font-semibold transition">
                    <i class="fas fa-credit-card mr-2"></i>Payment Settings
                </button>
                <button class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100 text-gray-700 font-semibold transition">
                    <i class="fas fa-share-alt mr-2"></i>Social Media Links
                </button>
                <button class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100 text-gray-700 font-semibold transition">
                    <i class="fas fa-user-circle mr-2"></i>Admin Profile
                </button>
                <button class="w-full text-left px-4 py-3 rounded-lg hover:bg-gray-100 text-gray-700 font-semibold transition">
                    <i class="fas fa-shield-alt mr-2"></i>Security Settings
                </button>
            </div>
        </div>

        <!-- Settings Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Website Settings -->
            <div class="dashboard-card">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Website Settings</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Site Name</label>
                        <input type="text" value="AuraWomenuz" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Site Description</label>
                        <textarea class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500" rows="3">Premium women's perfumes and beauty products with integrated Telegram channel and bot services.</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Site URL</label>
                        <input type="text" value="https://aurawomenuz.com" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Support Email</label>
                        <input type="email" value="support@aurawomenuz.com" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Support Phone</label>
                        <input type="text" value="+1 (555) 123-4567" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <button class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 rounded-lg hover:shadow-lg transition">
                        Save Changes
                    </button>
                </div>
            </div>

            <!-- Bot Settings -->
            <div class="dashboard-card">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Telegram Bot Settings</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Bot Token</label>
                        <input type="password" value="••••••••••••••••••••••••••" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Channel ID</label>
                        <input type="text" value="-1001234567890" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">API URL</label>
                        <input type="text" value="https://api.telegram.org" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div class="flex items-center justify-between">
                        <label class="text-sm font-semibold text-gray-700">Enable Auto-Replies</label>
                        <input type="checkbox" checked class="w-5 h-5">
                    </div>
                    <button class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 rounded-lg hover:shadow-lg transition">
                        Test Connection
                    </button>
                </div>
            </div>

            <!-- Social Media -->
            <div class="dashboard-card">
                <h3 class="text-lg font-bold text-gray-800 mb-6">Social Media Links</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2"><i class="fab fa-telegram text-blue-500 mr-2"></i>Telegram Channel</label>
                        <input type="text" value="https://t.me/aurawomenuz" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2"><i class="fab fa-instagram text-pink-500 mr-2"></i>Instagram</label>
                        <input type="text" value="https://instagram.com/aurawomenuz" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2"><i class="fab fa-facebook text-blue-600 mr-2"></i>Facebook</label>
                        <input type="text" value="https://facebook.com/aurawomenuz" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
                    </div>
                    <button class="w-full bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 rounded-lg hover:shadow-lg transition">
                        Update Social Links
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

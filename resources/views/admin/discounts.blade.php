@extends('admin.layout')

@section('title', 'Discounts & Promo Codes')
@section('page-title', 'Discounts & Promo Codes')

@section('content')
    <div class="mb-6">
        <button class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 px-6 rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Create Promo Code
        </button>
    </div>

    <div class="dashboard-card overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Code</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Discount</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Type</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Usage</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Valid Until</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Status</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-100 hover:bg-pink-50">
                    <td class="px-6 py-4 font-bold text-pink-600">SUMMER20</td>
                    <td class="px-6 py-4">20% OFF</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Percentage</td>
                    <td class="px-6 py-4 text-sm text-gray-600">234 / 500</td>
                    <td class="px-6 py-4 text-sm text-gray-600">2024-06-30</td>
                    <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">Active</span></td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b border-gray-100 hover:bg-pink-50">
                    <td class="px-6 py-4 font-bold text-pink-600">WELCOME15</td>
                    <td class="px-6 py-4">15% OFF</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Percentage</td>
                    <td class="px-6 py-4 text-sm text-gray-600">156 / Unlimited</td>
                    <td class="px-6 py-4 text-sm text-gray-600">2024-12-31</td>
                    <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-bold">Active</span></td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                <tr class="border-b border-gray-100 hover:bg-pink-50">
                    <td class="px-6 py-4 font-bold text-pink-600">FLASH50</td>
                    <td class="px-6 py-4">$50 OFF</td>
                    <td class="px-6 py-4 text-sm text-gray-600">Fixed</td>
                    <td class="px-6 py-4 text-sm text-gray-600">89 / 100</td>
                    <td class="px-6 py-4 text-sm text-gray-600">2024-05-20</td>
                    <td class="px-6 py-4"><span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs font-bold">Expired</span></td>
                    <td class="px-6 py-4 flex gap-2">
                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                        <button class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

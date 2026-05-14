@extends('admin.layout')

@section('title', 'Payments')
@section('page-title', 'Payments Management')

@section('content')
    <div class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" placeholder="Search payment ID..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500">
            </div>
            <div>
                <select class="w-full px-4 py-2 border border-gray-200 rounded-lg">
                    <option>All Status</option>
                    <option>Completed</option>
                    <option>Pending</option>
                    <option>Failed</option>
                    <option>Refunded</option>
                </select>
            </div>
            <div>
                <select class="w-full px-4 py-2 border border-gray-200 rounded-lg">
                    <option>All Methods</option>
                    <option>Credit Card</option>
                    <option>Debit Card</option>
                    <option>Bank Transfer</option>
                    <option>Mobile Wallet</option>
                </select>
            </div>
            <button class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 rounded-lg hover:shadow-lg transition">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
        </div>
    </div>

    <div class="dashboard-card overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-4 text-left font-bold text-gray-800">Payment ID</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-800">Order ID</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-800">Amount</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-800">Method</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-800">Status</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-800">Date</th>
                    <th class="px-6 py-4 text-left font-bold text-gray-800">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-100 hover:bg-pink-50">
                    <td class="px-6 py-4 font-bold">#PAY-2456</td>
                    <td class="px-6 py-4">#ORD-2456</td>
                    <td class="px-6 py-4 font-bold text-pink-600">$245.99</td>
                    <td class="px-6 py-4">Credit Card</td>
                    <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Completed</span></td>
                    <td class="px-6 py-4">2024-05-14</td>
                    <td class="px-6 py-4 flex gap-2"><i class="fas fa-eye text-blue-500 cursor-pointer"></i></td>
                </tr>
                <tr class="border-b border-gray-100 hover:bg-pink-50">
                    <td class="px-6 py-4 font-bold">#PAY-2455</td>
                    <td class="px-6 py-4">#ORD-2455</td>
                    <td class="px-6 py-4 font-bold text-pink-600">$389.50</td>
                    <td class="px-6 py-4">Debit Card</td>
                    <td class="px-6 py-4"><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded text-xs font-bold">Pending</span></td>
                    <td class="px-6 py-4">2024-05-14</td>
                    <td class="px-6 py-4 flex gap-2"><i class="fas fa-eye text-blue-500 cursor-pointer"></i></td>
                </tr>
                <tr class="border-b border-gray-100 hover:bg-pink-50">
                    <td class="px-6 py-4 font-bold">#PAY-2454</td>
                    <td class="px-6 py-4">#ORD-2454</td>
                    <td class="px-6 py-4 font-bold text-pink-600">$149.99</td>
                    <td class="px-6 py-4">Mobile Wallet</td>
                    <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs font-bold">Completed</span></td>
                    <td class="px-6 py-4">2024-05-13</td>
                    <td class="px-6 py-4 flex gap-2"><i class="fas fa-eye text-blue-500 cursor-pointer"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

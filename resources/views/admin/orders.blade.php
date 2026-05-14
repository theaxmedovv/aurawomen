@extends('admin.layout')

@section('title', 'Orders Management')
@section('page-title', 'Orders Management')

@section('content')
    <!-- Filters and Search -->
    <div class="dashboard-card mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Search Order ID</label>
                <input type="text" placeholder="Enter Order ID..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200">
                    <option>All Status</option>
                    <option>New Order Received</option>
                    <option>Under Review</option>
                    <option>Approved</option>
                    <option>Preparing Order</option>
                    <option>Shipping</option>
                    <option>Delivered</option>
                    <option>Cancelled</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Date Range</label>
                <input type="date" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-pink-500 focus:ring-2 focus:ring-pink-200">
            </div>
            <div class="flex items-end gap-2">
                <button class="flex-1 bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 px-4 rounded-lg hover:shadow-lg transition">
                    <i class="fas fa-filter mr-2"></i> Filter
                </button>
                <button class="flex-1 bg-gray-100 text-gray-700 font-semibold py-2 px-4 rounded-lg hover:bg-gray-200 transition">
                    <i class="fas fa-download mr-2"></i> Export
                </button>
            </div>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="dashboard-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Order ID</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Customer</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Phone</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Address</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Products</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Total</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Payment</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Date</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Order 1 -->
                    <tr class="border-b border-gray-100 hover:bg-pink-50 transition">
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">#ORD-2456</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-400 to-pink-600"></div>
                                <span class="text-sm text-gray-700">Sarah Mitchell</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">+1 (555) 234-5678</td>
                        <td class="px-6 py-4 text-sm text-gray-600">123 Fashion St, NY 10001</td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-700">2 items</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">$245.99</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <i class="fas fa-check-circle mr-1"></i> Paid
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2024-05-14</td>
                        <td class="px-6 py-4">
                            <select class="status-select text-sm px-2 py-1 rounded-lg border border-green-200 bg-green-50 text-green-700 font-semibold cursor-pointer">
                                <option selected>Delivered</option>
                                <option>New Order Received</option>
                                <option>Under Review</option>
                                <option>Approved</option>
                                <option>Preparing Order</option>
                                <option>Shipping</option>
                                <option>Cancelled</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button class="text-blue-500 hover:text-blue-700 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-purple-500 hover:text-purple-700 transition" title="Contact Customer">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700 transition" title="Print Invoice">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Order 2 -->
                    <tr class="border-b border-gray-100 hover:bg-pink-50 transition">
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">#ORD-2455</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-400 to-purple-600"></div>
                                <span class="text-sm text-gray-700">Emma Johnson</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">+1 (555) 345-6789</td>
                        <td class="px-6 py-4 text-sm text-gray-600">456 Beauty Ave, LA 90001</td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-700">3 items</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">$389.50</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                <i class="fas fa-clock mr-1"></i> Pending
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2024-05-14</td>
                        <td class="px-6 py-4">
                            <select class="status-select text-sm px-2 py-1 rounded-lg border border-orange-200 bg-orange-50 text-orange-700 font-semibold cursor-pointer">
                                <option selected>Preparing Order</option>
                                <option>New Order Received</option>
                                <option>Under Review</option>
                                <option>Approved</option>
                                <option>Shipping</option>
                                <option>Delivered</option>
                                <option>Cancelled</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button class="text-blue-500 hover:text-blue-700 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-purple-500 hover:text-purple-700 transition" title="Contact Customer">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700 transition" title="Print Invoice">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Order 3 -->
                    <tr class="border-b border-gray-100 hover:bg-pink-50 transition">
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">#ORD-2454</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-400 to-blue-600"></div>
                                <span class="text-sm text-gray-700">Jessica Clark</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">+1 (555) 456-7890</td>
                        <td class="px-6 py-4 text-sm text-gray-600">789 Luxury Blvd, Miami 33101</td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-700">1 item</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">$149.99</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <i class="fas fa-check-circle mr-1"></i> Paid
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2024-05-13</td>
                        <td class="px-6 py-4">
                            <select class="status-select text-sm px-2 py-1 rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-semibold cursor-pointer">
                                <option selected>Shipping</option>
                                <option>New Order Received</option>
                                <option>Under Review</option>
                                <option>Approved</option>
                                <option>Preparing Order</option>
                                <option>Delivered</option>
                                <option>Cancelled</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button class="text-blue-500 hover:text-blue-700 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-purple-500 hover:text-purple-700 transition" title="Contact Customer">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700 transition" title="Print Invoice">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Order 4 -->
                    <tr class="border-b border-gray-100 hover:bg-pink-50 transition">
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">#ORD-2453</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-red-400 to-red-600"></div>
                                <span class="text-sm text-gray-700">Rachel Adams</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">+1 (555) 567-8901</td>
                        <td class="px-6 py-4 text-sm text-gray-600">321 Pink Lane, Chicago 60601</td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-700">4 items</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">$524.75</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                <i class="fas fa-check-circle mr-1"></i> Paid
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2024-05-12</td>
                        <td class="px-6 py-4">
                            <select class="status-select text-sm px-2 py-1 rounded-lg border border-yellow-200 bg-yellow-50 text-yellow-700 font-semibold cursor-pointer">
                                <option selected>Under Review</option>
                                <option>New Order Received</option>
                                <option>Approved</option>
                                <option>Preparing Order</option>
                                <option>Shipping</option>
                                <option>Delivered</option>
                                <option>Cancelled</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button class="text-blue-500 hover:text-blue-700 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-purple-500 hover:text-purple-700 transition" title="Contact Customer">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700 transition" title="Print Invoice">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Order 5 -->
                    <tr class="border-b border-gray-100 hover:bg-pink-50 transition">
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">#ORD-2452</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-pink-400 to-rose-600"></div>
                                <span class="text-sm text-gray-700">Olivia Davis</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">+1 (555) 678-9012</td>
                        <td class="px-6 py-4 text-sm text-gray-600">654 Elegance Dr, Boston 02101</td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-700">2 items</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-800">$299.99</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                <i class="fas fa-times-circle mr-1"></i> Failed
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">2024-05-11</td>
                        <td class="px-6 py-4">
                            <select class="status-select text-sm px-2 py-1 rounded-lg border border-red-200 bg-red-50 text-red-700 font-semibold cursor-pointer">
                                <option selected>Cancelled</option>
                                <option>New Order Received</option>
                                <option>Under Review</option>
                                <option>Approved</option>
                                <option>Preparing Order</option>
                                <option>Shipping</option>
                                <option>Delivered</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <button class="text-blue-500 hover:text-blue-700 transition" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="text-purple-500 hover:text-purple-700 transition" title="Contact Customer">
                                    <i class="fas fa-phone"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700 transition" title="Print Invoice">
                                    <i class="fas fa-print"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-700 transition" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center">
            <span class="text-sm text-gray-600">Showing 1 to 5 of 2,456 orders</span>
            <div class="flex gap-2">
                <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-100 transition text-sm">Previous</button>
                <button class="px-3 py-1 rounded-lg bg-pink-500 text-white transition text-sm">1</button>
                <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-100 transition text-sm">2</button>
                <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-100 transition text-sm">3</button>
                <button class="px-3 py-1 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-100 transition text-sm">Next</button>
            </div>
        </div>
    </div>
@endsection

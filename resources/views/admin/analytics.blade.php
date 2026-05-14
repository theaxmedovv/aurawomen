@extends('admin.layout')

@section('title', 'Analytics')
@section('page-title', 'Analytics & Reports')

@section('content')
    <!-- Time Period Selector -->
    <div class="mb-6">
        <div class="flex gap-2 flex-wrap">
            <button class="px-4 py-2 rounded-lg border-2 border-pink-500 bg-pink-50 text-pink-600 font-semibold transition">Last 7 Days</button>
            <button class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition">Last 30 Days</button>
            <button class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition">Last 90 Days</button>
            <button class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 font-semibold hover:bg-gray-50 transition">This Year</button>
        </div>
    </div>

    <!-- Summary Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="dashboard-card">
            <p class="text-gray-500 text-sm font-medium">Total Revenue</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">$45,230</h3>
            <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 23% from last period</p>
        </div>
        <div class="dashboard-card">
            <p class="text-gray-500 text-sm font-medium">Total Orders</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">2,456</h3>
            <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 12% from last period</p>
        </div>
        <div class="dashboard-card">
            <p class="text-gray-500 text-sm font-medium">Average Order Value</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">$184.35</h3>
            <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 8% from last period</p>
        </div>
        <div class="dashboard-card">
            <p class="text-gray-500 text-sm font-medium">Conversion Rate</p>
            <h3 class="text-3xl font-bold text-gray-800 mt-2">3.24%</h3>
            <p class="text-red-500 text-xs mt-2"><i class="fas fa-arrow-down"></i> 0.5% from last period</p>
        </div>
    </div>

    <!-- Charts Row 1 -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Revenue Trend -->
        <div class="dashboard-card">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Revenue Trend</h3>
            <canvas id="revenueTrendChart"></canvas>
        </div>

        <!-- Product Performance -->
        <div class="dashboard-card">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Product Performance</h3>
            <canvas id="productPerformanceChart"></canvas>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Order Status Distribution -->
        <div class="dashboard-card">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Order Status Distribution</h3>
            <canvas id="orderStatusChart"></canvas>
        </div>

        <!-- Customer Activity -->
        <div class="dashboard-card">
            <h3 class="text-lg font-bold text-gray-800 mb-6">Customer Activity</h3>
            <canvas id="customerActivityChart"></canvas>
        </div>
    </div>

    <!-- Telegram Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="dashboard-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Telegram Posts</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">145</h3>
                    <p class="text-blue-500 text-xs mt-2">Total published posts</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                    <i class="fab fa-telegram text-blue-500 text-lg"></i>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Telegram Followers</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">8,234</h3>
                    <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 234 this week</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                    <i class="fas fa-users text-blue-500 text-lg"></i>
                </div>
            </div>
        </div>

        <div class="dashboard-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Telegram Engagement</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">12.5%</h3>
                    <p class="text-green-500 text-xs mt-2">Average engagement rate</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                    <i class="fas fa-chart-pie text-blue-500 text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Products Table -->
    <div class="dashboard-card">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Top Selling Products</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="px-4 py-3 text-left font-bold text-gray-800">Product Name</th>
                        <th class="px-4 py-3 text-left font-bold text-gray-800">Units Sold</th>
                        <th class="px-4 py-3 text-left font-bold text-gray-800">Revenue</th>
                        <th class="px-4 py-3 text-left font-bold text-gray-800">Growth</th>
                        <th class="px-4 py-3 text-left font-bold text-gray-800">Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-gray-100 hover:bg-pink-50">
                        <td class="px-4 py-3 font-semibold">Essence Pearl Perfume</td>
                        <td class="px-4 py-3">445</td>
                        <td class="px-4 py-3 font-semibold text-pink-500">$8,920</td>
                        <td class="px-4 py-3"><span class="text-green-600 font-semibold">↑ 23%</span></td>
                        <td class="px-4 py-3">⭐ 4.8</td>
                    </tr>
                    <tr class="border-b border-gray-100 hover:bg-pink-50">
                        <td class="px-4 py-3 font-semibold">Luxury Rose Collection</td>
                        <td class="px-4 py-3">382</td>
                        <td class="px-4 py-3 font-semibold text-pink-500">$7,640</td>
                        <td class="px-4 py-3"><span class="text-green-600 font-semibold">↑ 18%</span></td>
                        <td class="px-4 py-3">⭐ 4.9</td>
                    </tr>
                    <tr class="border-b border-gray-100 hover:bg-pink-50">
                        <td class="px-4 py-3 font-semibold">Gold Elegance EDP</td>
                        <td class="px-4 py-3">321</td>
                        <td class="px-4 py-3 font-semibold text-pink-500">$6,420</td>
                        <td class="px-4 py-3"><span class="text-green-600 font-semibold">↑ 12%</span></td>
                        <td class="px-4 py-3">⭐ 4.7</td>
                    </tr>
                    <tr class="hover:bg-pink-50">
                        <td class="px-4 py-3 font-semibold">Midnight Mystique</td>
                        <td class="px-4 py-3">298</td>
                        <td class="px-4 py-3 font-semibold text-pink-500">$5,960</td>
                        <td class="px-4 py-3"><span class="text-red-600 font-semibold">↓ 5%</span></td>
                        <td class="px-4 py-3">⭐ 4.6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Trend Chart
            const ctx1 = document.getElementById('revenueTrendChart').getContext('2d');
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Daily Revenue',
                        data: [6500, 7200, 6800, 8500, 9200, 10500, 9800],
                        borderColor: '#ec4899',
                        backgroundColor: 'rgba(236, 72, 153, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // Product Performance Chart
            const ctx2 = document.getElementById('productPerformanceChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Essence Pearl', 'Luxury Rose', 'Gold Elegance', 'Midnight Mystique'],
                    datasets: [{
                        label: 'Units Sold',
                        data: [445, 382, 321, 298],
                        backgroundColor: ['rgba(236, 72, 153, 0.5)', 'rgba(168, 85, 247, 0.5)', 'rgba(251, 191, 36, 0.5)', 'rgba(99, 102, 241, 0.5)'],
                        borderColor: ['#ec4899', '#a855f7', '#fbbf24', '#6366f1'],
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // Order Status Distribution
            const ctx3 = document.getElementById('orderStatusChart').getContext('2d');
            new Chart(ctx3, {
                type: 'doughnut',
                data: {
                    labels: ['Delivered', 'Shipping', 'Preparing', 'Approved', 'Cancelled'],
                    datasets: [{
                        data: [870, 420, 280, 150, 100],
                        backgroundColor: ['#10b981', '#3b82f6', '#f59e0b', '#8b5cf6', '#ef4444'],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom' } }
                }
            });

            // Customer Activity Chart
            const ctx4 = document.getElementById('customerActivityChart').getContext('2d');
            new Chart(ctx4, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [
                        {
                            label: 'New Customers',
                            data: [45, 52, 48, 60],
                            borderColor: '#ec4899',
                            backgroundColor: 'rgba(236, 72, 153, 0.1)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 2
                        },
                        {
                            label: 'Active Customers',
                            data: [120, 135, 142, 156],
                            borderColor: '#7c3aed',
                            backgroundColor: 'rgba(124, 58, 237, 0.1)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { position: 'bottom' } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        });
    </script>
@endsection

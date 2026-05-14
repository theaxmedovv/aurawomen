@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
    <!-- Dashboard Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Orders Card -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Orders</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">2,456</h3>
                    <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 12% from last month</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-pink-100 to-pink-50 flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-pink-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Today Orders Card -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Today's Orders</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">48</h3>
                    <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 8% from yesterday</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-100 to-purple-50 flex items-center justify-center">
                    <i class="fas fa-calendar-day text-purple-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Revenue</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">$45,230</h3>
                    <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 25% from last month</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-yellow-100 to-yellow-50 flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-yellow-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- New Customers Card -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">New Customers</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">156</h3>
                    <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up"></i> 18% from last month</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-100 to-blue-50 flex items-center justify-center">
                    <i class="fas fa-user-plus text-blue-500 text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row of Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Pending Orders -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Pending Orders</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">23</h3>
                    <p class="text-orange-500 text-xs mt-2"><i class="fas fa-clock"></i> Awaiting review</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-100 to-orange-50 flex items-center justify-center">
                    <i class="fas fa-hourglass-half text-orange-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Delivered Orders -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Delivered Orders</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">2,134</h3>
                    <p class="text-green-500 text-xs mt-2">87% success rate</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-100 to-green-50 flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Product Statistics -->
        <div class="dashboard-card">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Products</p>
                    <h3 class="text-3xl font-bold text-gray-800 mt-2">384</h3>
                    <p class="text-blue-500 text-xs mt-2">28 low stock items</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-indigo-100 to-indigo-50 flex items-center justify-center">
                    <i class="fas fa-box text-indigo-500 text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts and Analytics Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Sales Chart -->
        <div class="dashboard-card">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-800">Sales Overview</h3>
                <select class="text-sm border border-gray-200 rounded-lg px-3 py-1 text-gray-600">
                    <option>Last 7 Days</option>
                    <option>Last 30 Days</option>
                    <option>Last 90 Days</option>
                </select>
            </div>
            <canvas id="salesChart"></canvas>
        </div>

        <!-- Monthly Revenue -->
        <div class="dashboard-card">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-800">Monthly Revenue</h3>
                <i class="fas fa-ellipsis-h text-gray-400 cursor-pointer"></i>
            </div>
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Top Products and Customer Growth -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Top Selling Products -->
        <div class="dashboard-card">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-800">Top Selling Products</h3>
                <a href="#" class="text-pink-500 text-sm hover:text-pink-600">View All</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-pink-100 flex items-center justify-center">
                            <i class="fas fa-spray-can text-pink-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Essence Pearl Perfume</p>
                            <p class="text-xs text-gray-500">445 sold this month</p>
                        </div>
                    </div>
                    <span class="text-sm font-bold text-gray-800">$8,920</span>
                </div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                            <i class="fas fa-spray-can text-purple-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Luxury Rose Collection</p>
                            <p class="text-xs text-gray-500">382 sold this month</p>
                        </div>
                    </div>
                    <span class="text-sm font-bold text-gray-800">$7,640</span>
                </div>
                <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center">
                            <i class="fas fa-spray-can text-yellow-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Gold Elegance EDP</p>
                            <p class="text-xs text-gray-500">321 sold this month</p>
                        </div>
                    </div>
                    <span class="text-sm font-bold text-gray-800">$6,420</span>
                </div>
                <div class="flex items-center justify-between pb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-pink-100 flex items-center justify-center">
                            <i class="fas fa-spray-can text-pink-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">Blooming Beauty Set</p>
                            <p class="text-xs text-gray-500">198 sold this month</p>
                        </div>
                    </div>
                    <span class="text-sm font-bold text-gray-800">$3,960</span>
                </div>
            </div>
        </div>

        <!-- Customer Growth -->
        <div class="dashboard-card">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-800">Customer Growth</h3>
                <span class="text-sm text-green-500">+23%</span>
            </div>
            <canvas id="customerChart"></canvas>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="grid grid-cols-1 gap-6">
        <div class="dashboard-card">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-bold text-gray-800">Recent Activities</h3>
                <a href="#" class="text-pink-500 text-sm hover:text-pink-600">View All</a>
            </div>
            <div class="space-y-4">
                <div class="flex items-start gap-4 pb-4 border-b border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-check text-green-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">Order #2456 Delivered</p>
                        <p class="text-xs text-gray-500">Customer: Sarah Mitchell</p>
                        <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                    </div>
                    <span class="text-sm text-pink-500 font-semibold">$245.99</span>
                </div>
                <div class="flex items-start gap-4 pb-4 border-b border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user-plus text-blue-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">New Customer Registered</p>
                        <p class="text-xs text-gray-500">Emma Johnson joined</p>
                        <p class="text-xs text-gray-400 mt-1">15 minutes ago</p>
                    </div>
                </div>
                <div class="flex items-start gap-4 pb-4 border-b border-gray-100">
                    <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-comment text-purple-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">New Review Posted</p>
                        <p class="text-xs text-gray-500">5 stars on Essence Pearl Perfume</p>
                        <p class="text-xs text-gray-400 mt-1">32 minutes ago</p>
                    </div>
                    <div class="flex gap-1">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-warning text-orange-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">Low Stock Alert</p>
                        <p class="text-xs text-gray-500">Gold Elegance EDP - 5 items left</p>
                        <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Charts
        document.addEventListener('DOMContentLoaded', function() {
            // Sales Chart
            const ctx1 = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [
                        {
                            label: 'Orders',
                            data: [65, 72, 68, 85, 92, 105, 98],
                            borderColor: '#ec4899',
                            backgroundColor: 'rgba(236, 72, 153, 0.05)',
                            fill: true,
                            tension: 0.4,
                            borderWidth: 2,
                            pointRadius: 4,
                            pointBackgroundColor: '#ec4899',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            });

            // Revenue Chart
            const ctx2 = document.getElementById('revenueChart').getContext('2d');
            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [32000, 38000, 35000, 42000, 45230, 48000],
                        backgroundColor: [
                            'rgba(236, 72, 153, 0.1)',
                            'rgba(236, 72, 153, 0.3)',
                            'rgba(236, 72, 153, 0.1)',
                            'rgba(236, 72, 153, 0.3)',
                            'rgba(236, 72, 153, 0.5)',
                            'rgba(236, 72, 153, 0.3)'
                        ],
                        borderColor: '#ec4899',
                        borderWidth: 2,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            });

            // Customer Growth Chart
            const ctx3 = document.getElementById('customerChart').getContext('2d');
            new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
                    datasets: [{
                        label: 'New Customers',
                        data: [25, 35, 28, 45, 52, 60],
                        borderColor: '#7c3aed',
                        backgroundColor: 'rgba(124, 58, 237, 0.05)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: '#7c3aed'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection

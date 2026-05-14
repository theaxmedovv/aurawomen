<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - AuraWomenuz</title>

    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body { font-family: 'Inter', sans-serif; letter-spacing: -0.01em; }

        /* Sidebar styling */
        .sidebar-gradient {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            border-radius: 12px;
            color: #94a3b8;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 500;
            margin-bottom: 4px;
        }

        .nav-item:hover {
            background: rgba(236, 72, 153, 0.1);
            color: #f472b6;
            transform: translateX(4px);
        }

        .nav-item.active {
            background: linear-gradient(90deg, rgba(236, 72, 153, 0.2) 0%, rgba(236, 72, 153, 0.05) 100%);
            color: #f472b6;
            border-left: 3px solid #ec4899;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Custom Scrollbar */
        .custom-scroll::-webkit-scrollbar { width: 4px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }

        /* Glass effect for header */
        .header-glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .search-focus:focus-within {
            ring: 2px solid #ec4899;
            background: white;
            box-shadow: 0 0 20px rgba(236, 72, 153, 0.1);
        }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-700">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-72 sidebar-gradient text-white shadow-2xl flex flex-col hidden lg:flex">
            <!-- Logo Section -->
            <div class="p-8">
                <div class="flex items-center gap-4">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-pink-500 to-rose-400 flex items-center justify-center shadow-lg shadow-pink-500/20">
                        <i class="fas fa-crown text-white text-lg"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight">Aura<span class="text-pink-400">Women</span></h1>
                        <p class="text-[10px] uppercase tracking-[0.2em] text-slate-400 font-bold">Premium Admin</p>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 space-y-1 overflow-y-auto custom-scroll">
                <div class="pb-4 px-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Main Menu</div>

                <a href="{{ route('admin.dashboard') }}" class="nav-item @if(request()->routeIs('admin.dashboard')) active @endif">
                    <i class="fas fa-house-user w-5"></i> <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.orders') }}" class="nav-item @if(request()->routeIs('admin.orders')) active @endif">
                    <i class="fas fa-shopping-bag w-5"></i> <span>Orders</span>
                </a>

                <a href="{{ route('admin.products.index') }}" class="nav-item @if(request()->routeIs('admin.products*')) active @endif">
                    <i class="fas fa-layer-group w-5"></i> <span>Products</span>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="nav-item @if(request()->routeIs('admin.categories*')) active @endif">
                    <i class="fas fa-th-large w-5"></i> <span>Categories</span>
                </a>

                <a href="{{ route('admin.telegram-posts') }}" class="nav-item @if(request()->routeIs('admin.telegram-posts')) active @endif">
                    <i class="fab fa-telegram-plane w-5"></i> <span>Telegram Posts</span>
                </a>

                <div class="py-4 px-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Analytics & Users</div>

                <a href="{{ route('admin.customers') }}" class="nav-item @if(request()->routeIs('admin.customers')) active @endif">
                    <i class="fas fa-user-friends w-5"></i> <span>Customers</span>
                </a>

                <a href="{{ route('admin.analytics') }}" class="nav-item @if(request()->routeIs('admin.analytics')) active @endif">
                    <i class="fas fa-chart-pie w-5"></i> <span>Analytics</span>
                </a>

                <a href="{{ route('admin.payments') }}" class="nav-item @if(request()->routeIs('admin.payments')) active @endif">
                    <i class="fas fa-credit-card w-5"></i> <span>Payments</span>
                </a>

                <div class="py-4 px-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">System</div>

                <a href="{{ route('admin.notifications') }}" class="nav-item @if(request()->routeIs('admin.notifications')) active @endif">
                    <i class="fas fa-bell w-5"></i> <span>Notifications</span>
                </a>

                <a href="{{ route('admin.reviews') }}" class="nav-item @if(request()->routeIs('admin.reviews')) active @endif">
                    <i class="fas fa-star w-5"></i> <span>Reviews</span>
                </a>

                <a href="{{ route('admin.discounts') }}" class="nav-item @if(request()->routeIs('admin.discounts')) active @endif">
                    <i class="fas fa-tags w-5"></i> <span>Discounts</span>
                </a>

                <a href="{{ route('admin.delivery') }}" class="nav-item @if(request()->routeIs('admin.delivery')) active @endif">
                    <i class="fas fa-truck-loading w-5"></i> <span>Delivery Tracking</span>
                </a>

                <a href="{{ route('admin.staff') }}" class="nav-item @if(request()->routeIs('admin.staff')) active @endif">
                    <i class="fas fa-user-shield w-5"></i> <span>Staff Management</span>
                </a>

                <a href="{{ route('admin.settings') }}" class="nav-item @if(request()->routeIs('admin.settings')) active @endif">
                    <i class="fas fa-sliders-h w-5"></i> <span>Settings</span>
                </a>
            </nav>

            <!-- User Profile Footer -->
            <div class="p-6 mt-auto border-t border-slate-700/50">
                <div class="flex items-center justify-between p-3 rounded-2xl bg-slate-800/50 hover:bg-slate-800 transition cursor-pointer group">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-pink-500 to-purple-600 p-[2px]">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=1e293b&color=fff" class="w-full h-full rounded-full object-cover border-2 border-slate-900" alt="Admin">
                        </div>
                        <div>
                            <p class="text-xs font-bold text-white group-hover:text-pink-400 transition">Admin User</p>
                            <p class="text-[10px] text-slate-400">Super Admin</p>
                        </div>
                    </div>
                    <i class="fas fa-sign-out-alt text-slate-500 hover:text-pink-400"></i>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-hidden">

            <!-- Top Navigation -->
            <header class="header-glass border-b border-slate-200/60 sticky top-0 z-50 h-20 flex items-center">
                <div class="w-full px-8 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <button onclick="toggleSidebar()" class="w-10 h-10 flex lg:hidden items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div>
                            <h2 class="text-xl font-extrabold text-slate-800">@yield('page-title', 'Dashboard')</h2>
                            <p class="text-[11px] text-slate-400 font-medium">Xush kelibsiz, AuraWomen boshqaruv tizimiga!</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Search -->
                        <div class="hidden md:flex items-center bg-slate-100 border border-transparent rounded-2xl px-4 py-2 search-focus transition-all">
                            <i class="fas fa-search text-slate-400 mr-2 text-sm"></i>
                            <input type="text" placeholder="Qidiruv..." class="bg-transparent outline-none text-sm text-slate-700 w-56">
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center gap-2">
                            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-500 hover:bg-pink-50 hover:text-pink-500 transition relative">
                                <i class="far fa-bell text-lg"></i>
                                <span class="absolute top-2 right-2 w-2 h-2 bg-pink-500 border-2 border-white rounded-full"></span>
                            </button>
                            <button class="w-10 h-10 rounded-xl flex items-center justify-center text-slate-500 hover:bg-blue-50 hover:text-blue-500 transition">
                                <i class="far fa-envelope text-lg"></i>
                            </button>
                        </div>

                        <div class="h-8 w-[1px] bg-slate-200 mx-2"></div>

                        <!-- Dropdown -->
                        <div class="relative group">
                            <button class="flex items-center gap-3 p-1 pr-3 rounded-xl hover:bg-slate-100 transition">
                                <div class="w-9 h-9 rounded-lg bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-sm">A</div>
                                <i class="fas fa-chevron-down text-[10px] text-slate-400"></i>
                            </button>
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50 p-2">
                                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm text-slate-600 hover:bg-slate-50 hover:text-pink-500 rounded-xl transition">
                                    <i class="far fa-user-circle text-lg"></i> Profil sozlamalari
                                </a>
                                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm text-slate-600 hover:bg-slate-50 hover:text-pink-500 rounded-xl transition">
                                    <i class="fas fa-shield-alt text-lg"></i> Xavfsizlik
                                </a>
                                <div class="my-2 border-t border-slate-100"></div>
                                <a href="#" class="flex items-center gap-3 px-4 py-3 text-sm text-rose-500 hover:bg-rose-50 rounded-xl transition">
                                    <i class="fas fa-power-off text-lg"></i> Tizimdan chiqish
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-auto bg-[#f8fafc]">
                <div class="p-8">
                    @if(session('success'))
                        <div class="mb-4 p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="mb-4 p-4 rounded-lg bg-rose-50 border border-rose-200 text-rose-800">
                            {{ session('error') }}
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>

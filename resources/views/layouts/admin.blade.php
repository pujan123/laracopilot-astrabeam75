<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - EliteShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        admin: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a'
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-admin-50 to-admin-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-admin-800 to-admin-900 text-white shadow-2xl">
            <div class="p-6 border-b border-admin-700">
                <h2 class="text-xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                    <i class="fas fa-store mr-2"></i>EliteShop Admin
                </h2>
                <p class="text-admin-300 text-sm mt-1">Management Panel</p>
            </div>
            
            <nav class="mt-6">
                <div class="px-4 mb-4">
                    <p class="text-xs uppercase tracking-wider text-admin-400 font-semibold">Main Menu</p>
                </div>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.products') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-box mr-3"></i>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.orders') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customers') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.customers') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-users mr-3"></i>
                            Customers
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.inventory') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.inventory') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-warehouse mr-3"></i>
                            Inventory
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.categories') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-tags mr-3"></i>
                            Categories
                        </a>
                    </li>
                </ul>
                
                <div class="px-4 mt-8 mb-4">
                    <p class="text-xs uppercase tracking-wider text-admin-400 font-semibold">Analytics & Reports</p>
                </div>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.analytics') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.analytics') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-chart-line mr-3"></i>
                            Analytics
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="alert('Coming Soon!')" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200">
                            <i class="fas fa-file-alt mr-3"></i>
                            Reports
                        </a>
                    </li>
                </ul>
                
                <div class="px-4 mt-8 mb-4">
                    <p class="text-xs uppercase tracking-wider text-admin-400 font-semibold">System</p>
                </div>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.settings') }}" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.settings') ? 'bg-admin-700 text-white border-r-4 border-blue-500' : '' }}">
                            <i class="fas fa-cog mr-3"></i>
                            Settings
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="alert('Coming Soon!')" class="flex items-center px-6 py-3 text-admin-200 hover:bg-admin-700 hover:text-white transition-all duration-200">
                            <i class="fas fa-shield-alt mr-3"></i>
                            Security
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-lg border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center space-x-4">
                        <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all">
                            <i class="fas fa-external-link-alt mr-2"></i>Back to Website
                        </a>
                        
                        <div class="relative">
                            <button class="flex items-center space-x-3 bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg transition-colors">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" alt="Admin" class="w-8 h-8 rounded-full">
                                <div class="text-left">
                                    <p class="text-sm font-semibold text-gray-700">{{ session('admin_user.name', 'Administrator') }}</p>
                                    <p class="text-xs text-gray-500">{{ session('admin_user.role', 'Admin') }}</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </button>
                        </div>
                        
                        <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gradient-to-br from-gray-50 to-white p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Sidebar navigation highlight
            $('.nav-link').on('click', function() {
                $('.nav-link').removeClass('bg-admin-700 text-white border-r-4 border-blue-500');
                $(this).addClass('bg-admin-700 text-white border-r-4 border-blue-500');
            });

            // Auto-refresh dashboard stats every 30 seconds
            if (window.location.pathname.includes('dashboard')) {
                setInterval(function() {
                    // Simulate real-time updates
                    $('.stat-value').each(function() {
                        var current = parseFloat($(this).text().replace(/[^0-9.-]+/g, ''));
                        var change = (Math.random() - 0.5) * 0.1;
                        var newValue = current * (1 + change);
                        
                        if ($(this).text().includes('$')) {
                            $(this).text('$' + newValue.toFixed(2));
                        } else if ($(this).text().includes('%')) {
                            $(this).text(newValue.toFixed(1) + '%');
                        } else {
                            $(this).text(Math.round(newValue));
                        }
                    });
                }, 30000);
            }
        });
    </script>
</body>
</html>
@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm">Total Sales</p>
                <p class="text-3xl font-bold">${{ number_format($stats['total_sales'], 2) }}</p>
                <p class="text-blue-200 text-sm mt-1">+12.5% from last month</p>
            </div>
            <div class="bg-white/20 p-3 rounded-full">
                <i class="fas fa-dollar-sign text-2xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm">Total Orders</p>
                <p class="text-3xl font-bold">{{ number_format($stats['total_orders']) }}</p>
                <p class="text-green-200 text-sm mt-1">+8.2% from last month</p>
            </div>
            <div class="bg-white/20 p-3 rounded-full">
                <i class="fas fa-shopping-cart text-2xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm">Total Customers</p>
                <p class="text-3xl font-bold">{{ number_format($stats['total_customers']) }}</p>
                <p class="text-purple-200 text-sm mt-1">+15.3% from last month</p>
            </div>
            <div class="bg-white/20 p-3 rounded-full">
                <i class="fas fa-users text-2xl"></i>
            </div>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm">Conversion Rate</p>
                <p class="text-3xl font-bold">{{ $stats['conversion_rate'] }}%</p>
                <p class="text-orange-200 text-sm mt-1">+2.1% from last month</p>
            </div>
            <div class="bg-white/20 p-3 rounded-full">
                <i class="fas fa-chart-line text-2xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Sales Chart -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Monthly Sales</h3>
            <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-blue-500">
                <option>Last 12 months</option>
                <option>Last 6 months</option>
                <option>Last 3 months</option>
            </select>
        </div>
        <div style="width: 100%; height: 300px;">
            <canvas id="salesChart" width="400" height="300"></canvas>
        </div>
    </div>
    
    <!-- Top Products -->
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-6">Top Selling Products</h3>
        <div class="space-y-4">
            @foreach($topProducts as $index => $product)
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full flex items-center justify-center font-semibold">
                        {{ $index + 1 }}
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">{{ $product['name'] }}</h4>
                        <p class="text-sm text-gray-600">{{ $product['sales'] }} sales</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold text-gray-800">${{ number_format($product['revenue'], 2) }}</p>
                    <p class="text-sm text-green-600">Revenue</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Recent Orders & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Orders -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-800">Recent Orders</h3>
            <a href="{{ route('admin.orders') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">View All</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Order ID</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Customer</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Total</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $order)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="py-3 px-4">
                            <span class="font-medium text-blue-600">{{ $order['id'] }}</span>
                        </td>
                        <td class="py-3 px-4">{{ $order['customer'] }}</td>
                        <td class="py-3 px-4 font-semibold">${{ $order['total'] }}</td>
                        <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $order['status'] === 'Delivered' ? 'bg-green-100 text-green-800' : 
                                   ($order['status'] === 'Processing' ? 'bg-yellow-100 text-yellow-800' : 
                                   ($order['status'] === 'Shipped' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800')) }}">
                                {{ $order['status'] }}
                            </span>
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $order['date'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Quick Actions & Alerts -->
    <div class="space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('admin.products') }}" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-4 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all flex items-center justify-center">
                    <i class="fas fa-plus mr-2"></i>Add Product
                </a>
                <a href="{{ route('admin.orders') }}" class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 px-4 rounded-lg hover:from-green-700 hover:to-green-800 transition-all flex items-center justify-center">
                    <i class="fas fa-eye mr-2"></i>View Orders
                </a>
                <a href="{{ route('admin.customers') }}" class="w-full bg-gradient-to-r from-purple-600 to-purple-700 text-white py-3 px-4 rounded-lg hover:from-purple-700 hover:to-purple-800 transition-all flex items-center justify-center">
                    <i class="fas fa-users mr-2"></i>Manage Customers
                </a>
            </div>
        </div>
        
        <!-- Alerts -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">System Alerts</h3>
            <div class="space-y-3">
                <div class="flex items-start space-x-3 p-3 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                    <i class="fas fa-exclamation-triangle text-yellow-500 mt-1"></i>
                    <div>
                        <p class="text-sm font-medium text-yellow-800">Low Stock Alert</p>
                        <p class="text-xs text-yellow-700">{{ $stats['low_stock_items'] }} products running low</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-3 p-3 bg-blue-50 border-l-4 border-blue-400 rounded">
                    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                    <div>
                        <p class="text-sm font-medium text-blue-800">Pending Orders</p>
                        <p class="text-xs text-blue-700">{{ $stats['pending_orders'] }} orders need attention</p>
                    </div>
                </div>
                
                <div class="flex items-start space-x-3 p-3 bg-green-50 border-l-4 border-green-400 rounded">
                    <i class="fas fa-check-circle text-green-500 mt-1"></i>
                    <div>
                        <p class="text-sm font-medium text-green-800">System Status</p>
                        <p class="text-xs text-green-700">All systems operational</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Sales Chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales ($)',
                    data: [12500, 15200, 18900, 22100, 19800, 25600, 28900, 32100, 29800, 35200, 38900, 42100],
                    borderColor: 'rgb(59, 130, 246)',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
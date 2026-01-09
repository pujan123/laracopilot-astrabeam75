@extends('layouts.admin')

@section('title', 'Orders Management')
@section('page-title', 'Orders')

@section('content')
<!-- Header Actions -->
<div class="flex items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Order Management</h2>
        <p class="text-gray-600">Track and manage customer orders</p>
    </div>
    <div class="flex space-x-4">
        <button class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-green-800 transition-all">
            <i class="fas fa-plus mr-2"></i>Create Order
        </button>
        <button class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all">
            <i class="fas fa-download mr-2"></i>Export Orders
        </button>
    </div>
</div>

<!-- Order Stats -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-center">
            <p class="text-blue-100 text-sm">Total Orders</p>
            <p class="text-3xl font-bold">{{ count($orders) }}</p>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-center">
            <p class="text-yellow-100 text-sm">Processing</p>
            <p class="text-3xl font-bold">{{ count(array_filter($orders, function($o) { return $o['status'] === 'Processing'; })) }}</p>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-center">
            <p class="text-purple-100 text-sm">Shipped</p>
            <p class="text-3xl font-bold">{{ count(array_filter($orders, function($o) { return $o['status'] === 'Shipped'; })) }}</p>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-center">
            <p class="text-green-100 text-sm">Delivered</p>
            <p class="text-3xl font-bold">{{ count(array_filter($orders, function($o) { return $o['status'] === 'Delivered'; })) }}</p>
        </div>
    </div>
    
    <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-2xl shadow-lg">
        <div class="text-center">
            <p class="text-red-100 text-sm">Cancelled</p>
            <p class="text-3xl font-bold">{{ count(array_filter($orders, function($o) { return $o['status'] === 'Cancelled'; })) }}</p>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Search Orders</label>
            <div class="relative">
                <input type="text" placeholder="Order ID, customer..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option>All Status</option>
                <option>Processing</option>
                <option>Shipped</option>
                <option>Delivered</option>
                <option>Cancelled</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Payment</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option>All Methods</option>
                <option>Credit Card</option>
                <option>PayPal</option>
                <option>Apple Pay</option>
                <option>Bank Transfer</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option>All Time</option>
                <option>Today</option>
                <option>This Week</option>
                <option>This Month</option>
                <option>Last 30 Days</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option>All Amounts</option>
                <option>Under $50</option>
                <option>$50 - $200</option>
                <option>$200 - $500</option>
                <option>Over $500</option>
            </select>
        </div>
    </div>
</div>

<!-- Orders Table -->
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                        <input type="checkbox" class="rounded border-gray-300">
                    </th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Order ID</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Customer</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Email</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Total</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Status</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Payment</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Items</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Date</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($orders as $order)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6">
                        <input type="checkbox" class="rounded border-gray-300">
                    </td>
                    <td class="py-4 px-6">
                        <span class="font-mono text-blue-600 font-semibold">{{ $order['id'] }}</span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="font-medium text-gray-800">{{ $order['customer'] }}</div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="text-gray-600">{{ $order['email'] }}</div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="font-semibold text-gray-800">${{ $order['total'] }}</span>
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            {{ $order['status'] === 'Delivered' ? 'bg-green-100 text-green-800' : 
                               ($order['status'] === 'Processing' ? 'bg-yellow-100 text-yellow-800' : 
                               ($order['status'] === 'Shipped' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800')) }}">
                            {{ $order['status'] }}
                        </span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center space-x-2">
                            @if($order['payment'] === 'Credit Card')
                                <i class="fas fa-credit-card text-blue-500"></i>
                            @elseif($order['payment'] === 'PayPal')
                                <i class="fab fa-paypal text-blue-600"></i>
                            @elseif($order['payment'] === 'Apple Pay')
                                <i class="fab fa-apple text-gray-800"></i>
                            @endif
                            <span class="text-sm text-gray-600">{{ $order['payment'] }}</span>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="text-gray-600">{{ $order['items'] }} items</span>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $order['date'] }}</td>
                    <td class="py-4 px-6">
                        <div class="flex items-center space-x-2">
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="Edit Status">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-colors" title="Print Invoice">
                                <i class="fas fa-print"></i>
                            </button>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Cancel Order">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">
                Showing 1 to {{ count($orders) }} of {{ count($orders) }} results
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded-lg transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-3 py-2 text-sm bg-blue-600 text-white rounded-lg">1</button>
                <button class="px-3 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded-lg transition-colors">2</button>
                <button class="px-3 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded-lg transition-colors">3</button>
                <button class="px-3 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-gray-200 rounded-lg transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Status update functionality
        $('.fa-edit').parent().on('click', function() {
            const currentRow = $(this).closest('tr');
            const orderId = currentRow.find('.font-mono').text();
            const currentStatus = currentRow.find('.px-3').text().trim();
            
            const newStatus = prompt(`Update status for order ${orderId}:\n\nCurrent: ${currentStatus}\n\nEnter new status (Processing, Shipped, Delivered, Cancelled):`, currentStatus);
            
            if (newStatus && newStatus !== currentStatus) {
                const statusSpan = currentRow.find('.px-3');
                statusSpan.text(newStatus);
                
                // Update status color
                statusSpan.removeClass().addClass('px-3 py-1 rounded-full text-xs font-medium');
                if (newStatus === 'Delivered') {
                    statusSpan.addClass('bg-green-100 text-green-800');
                } else if (newStatus === 'Processing') {
                    statusSpan.addClass('bg-yellow-100 text-yellow-800');
                } else if (newStatus === 'Shipped') {
                    statusSpan.addClass('bg-blue-100 text-blue-800');
                } else if (newStatus === 'Cancelled') {
                    statusSpan.addClass('bg-red-100 text-red-800');
                }
                
                alert('Order status updated successfully!');
            }
        });
        
        // View details functionality
        $('.fa-eye').parent().on('click', function() {
            const orderId = $(this).closest('tr').find('.font-mono').text();
            alert(`View details for order ${orderId}\n\nThis would open a detailed order view modal or page.`);
        });
        
        // Print invoice functionality
        $('.fa-print').parent().on('click', function() {
            const orderId = $(this).closest('tr').find('.font-mono').text();
            alert(`Print invoice for order ${orderId}\n\nThis would generate and print the invoice.`);
        });
        
        // Cancel order functionality
        $('.fa-times').parent().on('click', function() {
            const orderId = $(this).closest('tr').find('.font-mono').text();
            if (confirm(`Are you sure you want to cancel order ${orderId}?`)) {
                $(this).closest('tr').find('.px-3').removeClass().addClass('px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800').text('Cancelled');
                alert('Order cancelled successfully!');
            }
        });
        
        // Search functionality
        $('input[placeholder*="Order ID"]').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('tbody tr').each(function() {
                const text = $(this).text().toLowerCase();
                $(this).toggle(text.includes(searchTerm));
            });
        });
    });
</script>
@endsection
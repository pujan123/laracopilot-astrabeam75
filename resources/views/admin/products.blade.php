@extends('layouts.admin')

@section('title', 'Products Management')
@section('page-title', 'Products')

@section('content')
<!-- Header Actions -->
<div class="flex items-center justify-between mb-8">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Product Management</h2>
        <p class="text-gray-600">Manage your product catalog</p>
    </div>
    <div class="flex space-x-4">
        <button class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-3 rounded-lg hover:from-green-700 hover:to-green-800 transition-all">
            <i class="fas fa-plus mr-2"></i>Add Product
        </button>
        <button class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all">
            <i class="fas fa-upload mr-2"></i>Import Products
        </button>
    </div>
</div>

<!-- Filters and Search -->
<div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Search Products</label>
            <div class="relative">
                <input type="text" placeholder="Search by name, SKU..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option>All Categories</option>
                <option>Electronics</option>
                <option>Fashion</option>
                <option>Home & Garden</option>
                <option>Sports</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option>All Status</option>
                <option>Active</option>
                <option>Inactive</option>
                <option>Low Stock</option>
                <option>Out of Stock</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                <option>All Prices</option>
                <option>Under $50</option>
                <option>$50 - $200</option>
                <option>$200 - $500</option>
                <option>Over $500</option>
            </select>
        </div>
    </div>
    
    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-200">
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-600">{{ count($products) }} products found</span>
            <div class="flex items-center space-x-2">
                <input type="checkbox" id="select-all" class="rounded border-gray-300">
                <label for="select-all" class="text-sm text-gray-700">Select All</label>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            <button class="px-4 py-2 text-sm text-gray-600 hover:text-gray-800">Bulk Edit</button>
            <button class="px-4 py-2 text-sm text-red-600 hover:text-red-800">Delete Selected</button>
        </div>
    </div>
</div>

<!-- Products Table -->
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">
                        <input type="checkbox" class="rounded border-gray-300">
                    </th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Product</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">SKU</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Category</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Price</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Stock</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Status</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Created</th>
                    <th class="text-left py-4 px-6 font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($products as $product)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-4 px-6">
                        <input type="checkbox" class="rounded border-gray-300">
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center space-x-3">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-12 h-12 object-cover rounded-lg">
                            <div>
                                <h3 class="font-medium text-gray-800">{{ $product['name'] }}</h3>
                                <p class="text-sm text-gray-500">ID: {{ $product['id'] }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="font-mono text-sm">{{ $product['sku'] }}</span>
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded">{{ $product['category'] }}</span>
                    </td>
                    <td class="py-4 px-6">
                        <span class="font-semibold text-gray-800">${{ $product['price'] }}</span>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center space-x-2">
                            <span class="font-medium {{ $product['stock'] <= 5 ? 'text-red-600' : 'text-gray-800' }}">
                                {{ $product['stock'] }}
                            </span>
                            @if($product['stock'] <= 5)
                                <i class="fas fa-exclamation-triangle text-red-500 text-sm"></i>
                            @endif
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <span class="px-3 py-1 rounded-full text-xs font-medium
                            {{ $product['status'] === 'Active' ? 'bg-green-100 text-green-800' : 
                               ($product['status'] === 'Low Stock' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ $product['status'] }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-sm text-gray-600">{{ $product['created_at'] }}</td>
                    <td class="py-4 px-6">
                        <div class="flex items-center space-x-2">
                            <button class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition-colors" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition-colors" title="Duplicate">
                                <i class="fas fa-copy"></i>
                            </button>
                            <button class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                <i class="fas fa-trash"></i>
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
                Showing 1 to {{ count($products) }} of {{ count($products) }} results
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

<!-- Quick Stats -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">
    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="fas fa-box text-blue-600"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800">{{ count($products) }}</h3>
        <p class="text-gray-600 text-sm">Total Products</p>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="fas fa-check-circle text-green-600"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800">{{ count(array_filter($products, function($p) { return $p['status'] === 'Active'; })) }}</h3>
        <p class="text-gray-600 text-sm">Active Products</p>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="fas fa-exclamation-triangle text-yellow-600"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800">{{ count(array_filter($products, function($p) { return $p['stock'] <= 5; })) }}</h3>
        <p class="text-gray-600 text-sm">Low Stock</p>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-3">
            <i class="fas fa-times-circle text-red-600"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800">{{ count(array_filter($products, function($p) { return $p['stock'] === 0; })) }}</h3>
        <p class="text-gray-600 text-sm">Out of Stock</p>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Select all functionality
        $('#select-all').on('change', function() {
            $('tbody input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });
        
        // Search functionality
        $('input[placeholder*="Search"]').on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            $('tbody tr').each(function() {
                const text = $(this).text().toLowerCase();
                $(this).toggle(text.includes(searchTerm));
            });
        });
        
        // Filter functionality
        $('select').on('change', function() {
            // Simulate filtering
            console.log('Filter applied:', $(this).val());
        });
        
        // Action buttons
        $('.fa-edit').parent().on('click', function() {
            alert('Edit product functionality would open a modal or redirect to edit page');
        });
        
        $('.fa-trash').parent().on('click', function() {
            if (confirm('Are you sure you want to delete this product?')) {
                $(this).closest('tr').fadeOut();
            }
        });
    });
</script>
@endsection
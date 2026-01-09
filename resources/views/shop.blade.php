@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Shop All Products</h1>
        <p class="text-gray-600">Discover our complete collection of premium products</p>
    </div>
    
    <!-- Filters and Sort -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <!-- Filters -->
            <div class="flex flex-wrap gap-4">
                <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Fashion</option>
                    <option>Sports</option>
                    <option>Home & Garden</option>
                </select>
                
                <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none">
                    <option>Price Range</option>
                    <option>Under $50</option>
                    <option>$50 - $100</option>
                    <option>$100 - $300</option>
                    <option>Over $300</option>
                </select>
                
                <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none">
                    <option>Brand</option>
                    <option>Apple</option>
                    <option>Samsung</option>
                    <option>Nike</option>
                    <option>Adidas</option>
                </select>
            </div>
            
            <!-- Sort and View -->
            <div class="flex items-center gap-4">
                <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none">
                    <option>Sort by: Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Customer Rating</option>
                    <option>Newest First</option>
                </select>
                
                <div class="flex border-2 border-gray-200 rounded-lg">
                    <button class="px-3 py-2 bg-blue-600 text-white rounded-l-lg">
                        <i class="fas fa-th"></i>
                    </button>
                    <button class="px-3 py-2 hover:bg-gray-100 rounded-r-lg">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($products as $product)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2 group">
            <div class="relative overflow-hidden">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                
                <!-- Discount Badge -->
                @if($product['original_price'] > $product['price'])
                <div class="absolute top-4 left-4">
                    <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        -{{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}%
                    </span>
                </div>
                @endif
                
                <!-- Quick Actions -->
                <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                    <div class="flex flex-col gap-2">
                        <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                            <i class="fas fa-heart text-red-500"></i>
                        </button>
                        <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-blue-50 transition-colors">
                            <i class="fas fa-eye text-blue-500"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Quick Add to Cart -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="bg-gradient-to-r from-green-600 to-green-700 text-white px-6 py-2 rounded-full hover:from-green-700 hover:to-green-800 transition-all add-to-cart">
                        <i class="fas fa-cart-plus mr-2"></i>Quick Add
                    </button>
                </div>
            </div>
            
            <div class="p-6">
                <div class="mb-2">
                    <span class="text-sm text-blue-600 font-medium">{{ $product['category'] }}</span>
                </div>
                
                <h3 class="text-lg font-semibold mb-2 group-hover:text-blue-600 transition-colors">{{ $product['name'] }}</h3>
                
                <div class="flex items-center mb-3">
                    <div class="flex text-yellow-400 mr-2">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $product['rating'] ? '' : 'text-gray-300' }}"></i>
                        @endfor
                    </div>
                    <span class="text-sm text-gray-600">({{ $product['reviews'] }})</span>
                </div>
                
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="text-2xl font-bold text-gray-800">${{ $product['price'] }}</span>
                        @if($product['original_price'] > $product['price'])
                            <span class="text-lg text-gray-500 line-through ml-2">${{ $product['original_price'] }}</span>
                        @endif
                    </div>
                </div>
                
                <div class="flex gap-2">
                    <a href="{{ route('product', $product['id']) }}" class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-2 px-4 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all text-center">
                        View Details
                    </a>
                    <button class="bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-lg hover:from-green-700 hover:to-green-800 transition-all add-to-cart">
                        <i class="fas fa-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <!-- Pagination -->
    <div class="mt-12 flex justify-center">
        <nav class="flex space-x-2">
            <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">1</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">2</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">3</button>
            <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition-colors">
                <i class="fas fa-chevron-right"></i>
            </button>
        </nav>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Add to cart functionality
        $('.add-to-cart').on('click', function(e) {
            e.preventDefault();
            $(this).html('<i class="fas fa-check"></i> Added').addClass('from-green-600 to-green-700');
            setTimeout(() => {
                $(this).html('<i class="fas fa-cart-plus"></i>').removeClass('from-green-600 to-green-700');
            }, 2000);
        });
        
        // Filter functionality
        $('select').on('change', function() {
            // Simulate filtering
            $('.grid > div').fadeOut(200).fadeIn(600);
        });
    });
</script>
@endsection
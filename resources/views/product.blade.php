@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <div class="flex items-center space-x-2 text-sm">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">Home</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="{{ route('shop') }}" class="text-blue-600 hover:text-blue-800">Shop</a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-600">{{ $product['category'] }}</span>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-800 font-medium">{{ $product['name'] }}</span>
        </div>
    </nav>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
        <!-- Product Images -->
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <img id="main-image" src="{{ $product['images'][0] }}" alt="{{ $product['name'] }}" class="w-full h-96 object-cover">
            </div>
            
            <div class="flex space-x-4">
                @foreach($product['images'] as $index => $image)
                <button class="thumbnail-btn {{ $index === 0 ? 'ring-2 ring-blue-500' : '' }}" data-image="{{ $image }}">
                    <img src="{{ $image }}" alt="Product view {{ $index + 1 }}" class="w-20 h-20 object-cover rounded-lg">
                </button>
                @endforeach
            </div>
        </div>
        
        <!-- Product Details -->
        <div class="space-y-6">
            <div>
                <span class="text-blue-600 font-medium text-sm uppercase tracking-wider">{{ $product['category'] }}</span>
                <h1 class="text-3xl font-bold text-gray-800 mt-2">{{ $product['name'] }}</h1>
            </div>
            
            <!-- Rating and Reviews -->
            <div class="flex items-center space-x-4">
                <div class="flex text-yellow-400">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $product['rating'] ? '' : 'text-gray-300' }}"></i>
                    @endfor
                </div>
                <span class="text-gray-600">{{ $product['rating'] }} ({{ $product['reviews'] }} reviews)</span>
                <a href="#reviews" class="text-blue-600 hover:text-blue-800 text-sm">Read Reviews</a>
            </div>
            
            <!-- Price -->
            <div class="flex items-center space-x-4">
                <span class="text-4xl font-bold text-gray-800">${{ $product['price'] }}</span>
                <span class="text-2xl text-gray-500 line-through">${{ $product['original_price'] }}</span>
                <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                    Save ${{ $product['original_price'] - $product['price'] }}
                </span>
            </div>
            
            <!-- Stock Status -->
            <div class="flex items-center space-x-2">
                @if($product['stock'] > 10)
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-green-600 font-medium">In Stock ({{ $product['stock'] }} available)</span>
                @elseif($product['stock'] > 0)
                    <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                    <span class="text-yellow-600 font-medium">Limited Stock ({{ $product['stock'] }} left)</span>
                @else
                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                    <span class="text-red-600 font-medium">Out of Stock</span>
                @endif
            </div>
            
            <!-- Description -->
            <div>
                <p class="text-gray-600 leading-relaxed">{{ $product['description'] }}</p>
            </div>
            
            <!-- Quantity and Add to Cart -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center border-2 border-gray-200 rounded-lg">
                    <button class="px-4 py-2 hover:bg-gray-100 transition-colors" onclick="decreaseQuantity()">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input type="number" id="quantity" value="1" min="1" max="{{ $product['stock'] }}" class="w-16 text-center border-0 focus:outline-none">
                    <button class="px-4 py-2 hover:bg-gray-100 transition-colors" onclick="increaseQuantity()">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                
                <button class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-8 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all transform hover:scale-105 font-semibold" id="add-to-cart">
                    <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                </button>
                
                <button class="bg-gradient-to-r from-green-600 to-green-700 text-white py-3 px-6 rounded-lg hover:from-green-700 hover:to-green-800 transition-all">
                    <i class="fas fa-bolt mr-2"></i>Buy Now
                </button>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex space-x-4">
                <button class="flex items-center space-x-2 text-gray-600 hover:text-red-600 transition-colors">
                    <i class="fas fa-heart"></i>
                    <span>Add to Wishlist</span>
                </button>
                <button class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 transition-colors">
                    <i class="fas fa-share-alt"></i>
                    <span>Share</span>
                </button>
            </div>
            
            <!-- Features -->
            <div class="bg-gray-50 rounded-2xl p-6">
                <h3 class="text-lg font-semibold mb-4">Key Features</h3>
                <ul class="space-y-2">
                    @foreach($product['features'] as $feature)
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span class="text-gray-700">{{ $feature }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Product Tabs -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-16">
        <div class="border-b border-gray-200">
            <nav class="flex">
                <button class="tab-btn active px-8 py-4 font-medium border-b-2 border-blue-600 text-blue-600" data-tab="description">
                    Description
                </button>
                <button class="tab-btn px-8 py-4 font-medium text-gray-600 hover:text-gray-800" data-tab="specifications">
                    Specifications
                </button>
                <button class="tab-btn px-8 py-4 font-medium text-gray-600 hover:text-gray-800" data-tab="reviews">
                    Reviews ({{ $product['reviews'] }})
                </button>
            </nav>
        </div>
        
        <div class="p-8">
            <!-- Description Tab -->
            <div id="description" class="tab-content">
                <h3 class="text-xl font-semibold mb-4">Product Description</h3>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $product['description'] }}</p>
                
                <h4 class="text-lg font-semibold mb-3">What's in the Box</h4>
                <ul class="list-disc list-inside text-gray-600 space-y-1">
                    <li>{{ $product['name'] }}</li>
                    <li>USB Charging Cable</li>
                    <li>Quick Start Guide</li>
                    <li>Warranty Card</li>
                </ul>
            </div>
            
            <!-- Specifications Tab -->
            <div id="specifications" class="tab-content hidden">
                <h3 class="text-xl font-semibold mb-4">Technical Specifications</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($product['specifications'] as $key => $value)
                    <div class="flex justify-between py-2 border-b border-gray-200">
                        <span class="font-medium text-gray-800">{{ $key }}:</span>
                        <span class="text-gray-600">{{ $value }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Reviews Tab -->
            <div id="reviews" class="tab-content hidden">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-semibold">Customer Reviews</h3>
                    <button class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all">
                        Write a Review
                    </button>
                </div>
                
                <div class="space-y-6">
                    <!-- Sample Reviews -->
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=40&h=40&fit=crop&crop=face" alt="Reviewer" class="w-10 h-10 rounded-full">
                                <div>
                                    <h4 class="font-semibold">Sarah Johnson</h4>
                                    <p class="text-sm text-gray-500">Verified Purchase</p>
                                </div>
                            </div>
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </div>
                        </div>
                        <p class="text-gray-600">Absolutely love this product! The quality is exceptional and it works exactly as described. Highly recommend!</p>
                    </div>
                    
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center space-x-3">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" alt="Reviewer" class="w-10 h-10 rounded-full">
                                <div>
                                    <h4 class="font-semibold">Mike Chen</h4>
                                    <p class="text-sm text-gray-500">Verified Purchase</p>
                                </div>
                            </div>
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 4; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                <i class="fas fa-star text-gray-300"></i>
                            </div>
                        </div>
                        <p class="text-gray-600">Great value for money. Fast shipping and excellent customer service. Will definitely shop here again.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Related Products -->
    <section>
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Related Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="relative overflow-hidden">
                    <img src="{{ $relatedProduct['image'] }}" alt="{{ $relatedProduct['name'] }}" class="w-full h-48 object-cover">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">{{ $relatedProduct['name'] }}</h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 mr-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $relatedProduct['rating'] ? '' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        <span class="text-sm text-gray-600">({{ $relatedProduct['rating'] }})</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-gray-800">${{ $relatedProduct['price'] }}</span>
                        <a href="{{ route('product', $relatedProduct['id']) }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all">
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        // Image gallery
        $('.thumbnail-btn').on('click', function() {
            const newImage = $(this).data('image');
            $('#main-image').attr('src', newImage);
            $('.thumbnail-btn').removeClass('ring-2 ring-blue-500');
            $(this).addClass('ring-2 ring-blue-500');
        });
        
        // Tabs
        $('.tab-btn').on('click', function() {
            const tabId = $(this).data('tab');
            
            $('.tab-btn').removeClass('active border-b-2 border-blue-600 text-blue-600').addClass('text-gray-600');
            $(this).removeClass('text-gray-600').addClass('active border-b-2 border-blue-600 text-blue-600');
            
            $('.tab-content').addClass('hidden');
            $(`#${tabId}`).removeClass('hidden');
        });
        
        // Add to cart
        $('#add-to-cart').on('click', function() {
            $(this).html('<i class="fas fa-check mr-2"></i>Added to Cart');
            setTimeout(() => {
                $(this).html('<i class="fas fa-cart-plus mr-2"></i>Add to Cart');
            }, 2000);
        });
    });
    
    function increaseQuantity() {
        const qty = document.getElementById('quantity');
        const max = parseInt(qty.getAttribute('max'));
        if (parseInt(qty.value) < max) {
            qty.value = parseInt(qty.value) + 1;
        }
    }
    
    function decreaseQuantity() {
        const qty = document.getElementById('quantity');
        if (parseInt(qty.value) > 1) {
            qty.value = parseInt(qty.value) - 1;
        }
    }
</script>
@endsection
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-purple-900 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="absolute inset-0" style="background-image: url('https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1920'); background-size: cover; background-position: center; opacity: 0.2;"></div>
    
    <div class="relative container mx-auto px-6 py-24">
        <div class="flex items-center min-h-96">
            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    Discover Your
                    <span class="bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Perfect</span>
                    Shopping Experience
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-blue-100 leading-relaxed">
                    Premium products, unbeatable prices, and exceptional service. Shop with confidence at EliteShop.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('shop') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all transform hover:scale-105 shadow-xl">
                        <i class="fas fa-shopping-bag mr-2"></i>Shop Now
                    </a>
                    <a href="#features" class="border-2 border-white hover:bg-white hover:text-blue-900 text-white px-8 py-4 rounded-full text-lg font-semibold transition-all">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-20 bg-gradient-to-br from-white to-blue-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose EliteShop?</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Experience the difference with our premium e-commerce platform</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shipping-fast text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Free Shipping</h3>
                <p class="text-gray-600">Free delivery on orders over $75. Fast and reliable shipping worldwide.</p>
            </div>
            
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Secure Payment</h3>
                <p class="text-gray-600">Multiple payment options with bank-level security for safe transactions.</p>
            </div>
            
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-undo text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Easy Returns</h3>
                <p class="text-gray-600">30-day return policy. No questions asked, hassle-free returns.</p>
            </div>
            
            <div class="text-center p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-headset text-2xl text-white"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">24/7 Support</h3>
                <p class="text-gray-600">Round-the-clock customer support to help you anytime, anywhere.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Featured Products</h2>
            <p class="text-xl text-gray-600">Discover our handpicked selection of premium products</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all transform hover:-translate-y-2 group">
                <div class="relative overflow-hidden">
                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">{{ $product['badge'] }}</span>
                    </div>
                    <div class="absolute top-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 transition-colors">
                            <i class="fas fa-heart text-red-500"></i>
                        </button>
                    </div>
                </div>
                
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2 group-hover:text-blue-600 transition-colors">{{ $product['name'] }}</h3>
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400 mr-2">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star {{ $i <= $product['rating'] ? '' : 'text-gray-300' }}"></i>
                            @endfor
                        </div>
                        <span class="text-sm text-gray-600">({{ $product['reviews'] }} reviews)</span>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-2xl font-bold text-gray-800">${{ $product['price'] }}</span>
                            <span class="text-lg text-gray-500 line-through ml-2">${{ $product['original_price'] }}</span>
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
        
        <div class="text-center mt-12">
            <a href="{{ route('shop') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-full hover:from-blue-700 hover:to-blue-800 transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-arrow-right mr-2"></i>View All Products
            </a>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-20 bg-gradient-to-br from-blue-900 to-purple-900 text-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4">Shop by Category</h2>
            <p class="text-xl text-blue-100">Find exactly what you're looking for</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach($categories as $category)
            <a href="#" class="group">
                <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 text-center hover:bg-white/20 transition-all transform hover:-translate-y-2 hover:shadow-2xl">
                    <div class="w-16 h-16 bg-gradient-to-r from-white/20 to-white/30 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                        <i class="{{ $category['icon'] }} text-2xl text-white"></i>
                    </div>
                    <h3 class="font-semibold mb-2 group-hover:text-blue-200 transition-colors">{{ $category['name'] }}</h3>
                    <p class="text-sm text-blue-200">{{ $category['count'] }} items</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-20 bg-gradient-to-r from-green-600 to-blue-600">
    <div class="container mx-auto px-6 text-center">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-4xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-xl text-green-100 mb-8">Subscribe to our newsletter for exclusive deals and new product announcements</p>
            
            <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-3 rounded-full border-0 focus:outline-none focus:ring-4 focus:ring-white/30">
                <button class="bg-white text-green-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition-colors">
                    Subscribe
                </button>
            </div>
            
            <p class="text-sm text-green-100 mt-4">We respect your privacy. Unsubscribe at any time.</p>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">What Our Customers Say</h2>
            <p class="text-xl text-gray-600">Real reviews from satisfied customers</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex text-yellow-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-gray-600 mb-6">"Amazing quality products and super fast delivery. EliteShop has become my go-to online store!"</p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=60&h=60&fit=crop&crop=face" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Sarah Johnson</h4>
                        <p class="text-sm text-gray-500">Verified Buyer</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex text-yellow-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-gray-600 mb-6">"Excellent customer service and hassle-free returns. Highly recommend EliteShop to everyone!"</p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Mike Chen</h4>
                        <p class="text-sm text-gray-500">Verified Buyer</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-8 rounded-2xl shadow-lg">
                <div class="flex text-yellow-400 mb-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-gray-600 mb-6">"Great prices, authentic products, and secure payment. Shopping here is always a pleasure!"</p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=60&h=60&fit=crop&crop=face" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Emma Wilson</h4>
                        <p class="text-sm text-gray-500">Verified Buyer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Add to cart functionality
        $('.add-to-cart').on('click', function(e) {
            e.preventDefault();
            $(this).html('<i class="fas fa-check"></i>').addClass('from-green-600 to-green-700');
            setTimeout(() => {
                $(this).html('<i class="fas fa-cart-plus"></i>').removeClass('from-green-600 to-green-700');
            }, 2000);
        });

        // Newsletter subscription
        $('button:contains("Subscribe")').on('click', function(e) {
            e.preventDefault();
            alert('Thank you for subscribing to our newsletter!');
        });
    });
</script>
@endsection
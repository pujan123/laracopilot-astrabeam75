<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteShop - Premium E-commerce Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-blue-50 font-sans">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-md shadow-lg sticky top-0 z-50 border-b border-blue-100">
        <div class="container mx-auto px-6">
            <!-- Top Bar -->
            <div class="border-b border-gray-100 py-2">
                <div class="flex justify-between items-center text-sm">
                    <div class="text-gray-600">
                        <i class="fas fa-phone mr-2"></i>+1 (555) 123-4567
                        <span class="mx-4">|</span>
                        <i class="fas fa-envelope mr-2"></i>support@eliteshop.com
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 transition-colors">
                            <i class="fas fa-user mr-1"></i>Login
                        </a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 transition-colors">Register</a>
                        <a href="/admin/login" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-3 py-1 rounded-full text-xs hover:from-blue-700 hover:to-blue-800 transition-all">
                            Admin Panel
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Main Navigation -->
            <nav class="flex items-center justify-between py-4">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        <i class="fas fa-store mr-2"></i>EliteShop
                    </a>
                </div>
                
                <!-- Search Bar -->
                <div class="flex-1 max-w-xl mx-8">
                    <div class="relative">
                        <input type="text" placeholder="Search products..." class="w-full px-4 py-3 pl-12 rounded-full border-2 border-gray-200 focus:border-blue-500 focus:outline-none transition-colors bg-gray-50 focus:bg-white">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-2 rounded-full hover:from-blue-700 hover:to-blue-800 transition-all">
                            Search
                        </button>
                    </div>
                </div>
                
                <!-- Cart & Account -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('account') }}" class="text-gray-600 hover:text-blue-600 transition-colors">
                        <i class="fas fa-heart text-xl"></i>
                        <span class="ml-2 hidden md:inline">Wishlist</span>
                    </a>
                    <a href="{{ route('cart') }}" class="relative text-gray-600 hover:text-blue-600 transition-colors">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-gradient-to-r from-red-500 to-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                        <span class="ml-2 hidden md:inline">Cart</span>
                    </a>
                    <a href="{{ route('account') }}" class="flex items-center space-x-2 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-blue-50 hover:to-blue-100 px-4 py-2 rounded-full transition-all">
                        <i class="fas fa-user-circle text-xl text-gray-600"></i>
                        <span class="hidden md:inline text-gray-700">Account</span>
                    </a>
                </div>
            </nav>
            
            <!-- Category Navigation -->
            <div class="border-t border-gray-100 py-3">
                <nav class="flex justify-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Home</a>
                    <a href="{{ route('shop') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Shop</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Electronics</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Fashion</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Home & Garden</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Sports</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Books</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 font-medium transition-colors">Beauty</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white mt-16">
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="space-y-4">
                    <h3 class="text-xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
                        <i class="fas fa-store mr-2"></i>EliteShop
                    </h3>
                    <p class="text-gray-300 leading-relaxed">Your premier destination for quality products and exceptional shopping experience. We deliver excellence in every order.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-blue-700 hover:to-blue-800 transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-pink-600 to-red-600 rounded-full flex items-center justify-center hover:from-pink-700 hover:to-red-700 transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gradient-to-r from-blue-400 to-blue-500 rounded-full flex items-center justify-center hover:from-blue-500 hover:to-blue-600 transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-blue-400">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-blue-400 transition-colors">Home</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-300 hover:text-blue-400 transition-colors">Shop</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">About Us</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Contact</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Track Order</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Returns</a></li>
                    </ul>
                </div>
                
                <!-- Categories -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-blue-400">Categories</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Electronics</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Fashion</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Home & Garden</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Sports & Fitness</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Books & Media</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-blue-400 transition-colors">Beauty & Health</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-blue-400">Contact Info</h4>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-blue-400"></i>
                            <span class="text-gray-300">123 Commerce Street<br>Business District, NY 10001</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-blue-400"></i>
                            <span class="text-gray-300">+1 (555) 123-4567</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-blue-400"></i>
                            <span class="text-gray-300">support@eliteshop.com</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-clock text-blue-400"></i>
                            <span class="text-gray-300">Mon-Fri: 9AM-8PM<br>Sat-Sun: 10AM-6PM</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400">&copy; {{ date('Y') }} EliteShop. All rights reserved.</p>
                    <p class="text-gray-400 mt-2 md:mt-0">Made with ❤️ by LaraCopilot</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            // Smooth scrolling for anchor links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if( target.length ) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                }
            });

            // Header scroll effect
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('header').addClass('shadow-xl');
                } else {
                    $('header').removeClass('shadow-xl');
                }
            });

            // Add to cart animation
            $('.add-to-cart').on('click', function(e) {
                e.preventDefault();
                $(this).addClass('animate-pulse');
                setTimeout(() => {
                    $(this).removeClass('animate-pulse');
                }, 1000);
            });
        });
    </script>
</body>
</html>
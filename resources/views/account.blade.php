@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">My Account</h1>
        <p class="text-gray-600">Manage your account and view your orders</p>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Navigation -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <!-- User Info -->
                <div class="text-center mb-6 pb-6 border-b border-gray-200">
                    <img src="{{ $user['avatar'] }}" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $user['name'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $user['email'] }}</p>
                </div>
                
                <!-- Navigation Menu -->
                <nav class="space-y-2">
                    <a href="#" class="account-nav-link active flex items-center space-x-3 px-4 py-3 rounded-lg bg-blue-50 text-blue-600" data-section="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="#" class="account-nav-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-gray-700" data-section="orders">
                        <i class="fas fa-shopping-bag"></i>
                        <span>My Orders</span>
                    </a>
                    <a href="#" class="account-nav-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-gray-700" data-section="wishlist">
                        <i class="fas fa-heart"></i>
                        <span>Wishlist</span>
                    </a>
                    <a href="#" class="account-nav-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-gray-700" data-section="addresses">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Addresses</span>
                    </a>
                    <a href="#" class="account-nav-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-gray-700" data-section="profile">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                    <a href="#" class="account-nav-link flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-50 text-gray-700" data-section="security">
                        <i class="fas fa-shield-alt"></i>
                        <span>Security</span>
                    </a>
                </nav>
                
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <a href="{{ route('login') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-red-50 text-red-600">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Dashboard Section -->
            <div id="dashboard" class="account-section">
                <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                    <h2 class="text-2xl font-semibold mb-6">Account Overview</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-blue-100">Total Orders</p>
                                    <p class="text-3xl font-bold">{{ count($orders) }}</p>
                                </div>
                                <i class="fas fa-shopping-bag text-4xl text-blue-200"></i>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-green-100">Total Spent</p>
                                    <p class="text-3xl font-bold">${{ array_sum(array_column($orders, 'total')) }}</p>
                                </div>
                                <i class="fas fa-dollar-sign text-4xl text-green-200"></i>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-6 rounded-xl">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-purple-100">Saved Items</p>
                                    <p class="text-3xl font-bold">12</p>
                                </div>
                                <i class="fas fa-heart text-4xl text-purple-200"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Orders -->
                    <h3 class="text-lg font-semibold mb-4">Recent Orders</h3>
                    <div class="space-y-4">
                        @foreach(array_slice($orders, 0, 3) as $order)
                        <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:shadow-md transition-all">
                            <div>
                                <h4 class="font-semibold">{{ $order['id'] }}</h4>
                                <p class="text-sm text-gray-600">{{ $order['date'] }} • {{ $order['items'] }} items</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">${{ $order['total'] }}</p>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    {{ $order['status'] === 'Delivered' ? 'bg-green-100 text-green-800' : 
                                       ($order['status'] === 'Processing' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                    {{ $order['status'] }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Orders Section -->
            <div id="orders" class="account-section hidden">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-semibold">My Orders</h2>
                        <div class="flex space-x-2">
                            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                <option>All Orders</option>
                                <option>Processing</option>
                                <option>Shipped</option>
                                <option>Delivered</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        @foreach($orders as $order)
                        <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-all">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold">{{ $order['id'] }}</h3>
                                    <p class="text-gray-600">Placed on {{ $order['date'] }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xl font-bold">${{ $order['total'] }}</p>
                                    <span class="px-3 py-1 rounded-full text-xs font-medium
                                        {{ $order['status'] === 'Delivered' ? 'bg-green-100 text-green-800' : 
                                           ($order['status'] === 'Processing' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                        {{ $order['status'] }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <p class="text-gray-600">{{ $order['items'] }} items</p>
                                <div class="flex space-x-2">
                                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        View Details
                                    </button>
                                    @if($order['status'] === 'Delivered')
                                    <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                                        Reorder
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Wishlist Section -->
            <div id="wishlist" class="account-section hidden">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-6">My Wishlist</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @for($i = 1; $i <= 6; $i++)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-all">
                            <img src="https://images.unsplash.com/photo-{{ 1505740420928 + $i }}-5e560c06d30e?w=300" alt="Product" class="w-full h-48 object-cover rounded-lg mb-4">
                            <h3 class="font-semibold mb-2">Wishlist Item {{ $i }}</h3>
                            <p class="text-xl font-bold text-gray-800 mb-3">${{ 99 + ($i * 25) }}.99</p>
                            <div class="flex space-x-2">
                                <button class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                    Add to Cart
                                </button>
                                <button class="px-3 py-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>
            
            <!-- Addresses Section -->
            <div id="addresses" class="account-section hidden">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-semibold">Saved Addresses</h2>
                        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-plus mr-2"></i>Add New Address
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="border border-gray-200 rounded-lg p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold">Home Address</h3>
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-medium">Default</span>
                            </div>
                            <address class="text-gray-600 not-italic mb-4">
                                123 Main Street<br>
                                New York, NY 10001<br>
                                United States
                            </address>
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                <button class="text-red-600 hover:text-red-800">Delete</button>
                            </div>
                        </div>
                        
                        <div class="border border-gray-200 rounded-lg p-6">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-semibold">Office Address</h3>
                            </div>
                            <address class="text-gray-600 not-italic mb-4">
                                456 Business Ave<br>
                                New York, NY 10002<br>
                                United States
                            </address>
                            <div class="flex space-x-2">
                                <button class="text-blue-600 hover:text-blue-800">Edit</button>
                                <button class="text-red-600 hover:text-red-800">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Profile Section -->
            <div id="profile" class="account-section hidden">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-6">Profile Information</h2>
                    
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" value="John" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" value="Doe" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" value="{{ $user['email'] }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel" value="{{ $user['phone'] }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                            <input type="date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                        </div>
                        
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            Save Changes
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Security Section -->
            <div id="security" class="account-section hidden">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-2xl font-semibold mb-6">Security Settings</h2>
                    
                    <div class="space-y-8">
                        <!-- Change Password -->
                        <div>
                            <h3 class="text-lg font-semibold mb-4">Change Password</h3>
                            <form class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                    <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                    <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                    <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                                </div>
                                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                                    Update Password
                                </button>
                            </form>
                        </div>
                        
                        <!-- Two-Factor Authentication -->
                        <div class="border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-semibold mb-4">Two-Factor Authentication</h3>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium">SMS Authentication</p>
                                    <p class="text-sm text-gray-600">Receive codes via text message</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Login Sessions -->
                        <div class="border-t border-gray-200 pt-8">
                            <h3 class="text-lg font-semibold mb-4">Active Sessions</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="font-medium">Current Session</p>
                                        <p class="text-sm text-gray-600">Chrome on Windows • New York, NY</p>
                                    </div>
                                    <span class="text-green-600 text-sm font-medium">Active Now</span>
                                </div>
                                <div class="flex items-center justify-between p-4 border border-gray-200 rounded-lg">
                                    <div>
                                        <p class="font-medium">Mobile App</p>
                                        <p class="text-sm text-gray-600">iPhone • Last active 2 hours ago</p>
                                    </div>
                                    <button class="text-red-600 hover:text-red-800 text-sm">Revoke</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Account navigation
        $('.account-nav-link').on('click', function(e) {
            e.preventDefault();
            
            const section = $(this).data('section');
            
            // Update navigation
            $('.account-nav-link').removeClass('active bg-blue-50 text-blue-600').addClass('text-gray-700');
            $(this).removeClass('text-gray-700').addClass('active bg-blue-50 text-blue-600');
            
            // Show/hide sections
            $('.account-section').addClass('hidden');
            $(`#${section}`).removeClass('hidden');
        });
        
        // Form submissions
        $('form').on('submit', function(e) {
            e.preventDefault();
            alert('Changes saved successfully!');
        });
        
        // Wishlist actions
        $('.fa-trash').parent().on('click', function() {
            if (confirm('Remove this item from your wishlist?')) {
                $(this).closest('.border').fadeOut();
            }
        });
    });
</script>
@endsection
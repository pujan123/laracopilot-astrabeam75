@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Secure Checkout</h1>
        <p class="text-gray-600">Complete your purchase securely</p>
    </div>
    
    <!-- Progress Steps -->
    <div class="mb-8">
        <div class="flex items-center justify-center space-x-8">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-semibold">1</div>
                <span class="ml-2 font-medium text-blue-600">Shipping</span>
            </div>
            <div class="flex-1 h-1 bg-blue-600"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center font-semibold">2</div>
                <span class="ml-2 font-medium text-blue-600">Payment</span>
            </div>
            <div class="flex-1 h-1 bg-gray-300"></div>
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center font-semibold">3</div>
                <span class="ml-2 text-gray-600">Review</span>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Checkout Form -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Shipping Information -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-6">Shipping Information</h2>
                
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="Doe">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="john@example.com">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="+1 (555) 123-4567">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Street Address</label>
                        <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="123 Main Street">
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                            <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="New York">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">State</label>
                            <select class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none">
                                <option>Select State</option>
                                <option>New York</option>
                                <option>California</option>
                                <option>Texas</option>
                                <option>Florida</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">ZIP Code</label>
                            <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="10001">
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Shipping Method -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-6">Shipping Method</h2>
                
                <div class="space-y-4">
                    <label class="flex items-center p-4 border-2 border-blue-500 rounded-lg bg-blue-50 cursor-pointer">
                        <input type="radio" name="shipping" value="standard" checked class="text-blue-600">
                        <div class="ml-3 flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-800">Standard Shipping</span>
                                <span class="font-semibold text-blue-600">$15.99</span>
                            </div>
                            <p class="text-sm text-gray-600">5-7 business days</p>
                        </div>
                    </label>
                    
                    <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                        <input type="radio" name="shipping" value="express" class="text-blue-600">
                        <div class="ml-3 flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-800">Express Shipping</span>
                                <span class="font-semibold text-gray-800">$29.99</span>
                            </div>
                            <p class="text-sm text-gray-600">2-3 business days</p>
                        </div>
                    </label>
                    
                    <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 cursor-pointer">
                        <input type="radio" name="shipping" value="overnight" class="text-blue-600">
                        <div class="ml-3 flex-1">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-gray-800">Overnight Shipping</span>
                                <span class="font-semibold text-gray-800">$49.99</span>
                            </div>
                            <p class="text-sm text-gray-600">Next business day</p>
                        </div>
                    </label>
                </div>
            </div>
            
            <!-- Payment Information -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-6">Payment Information</h2>
                
                <!-- Payment Methods -->
                <div class="mb-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <label class="payment-method active">
                            <input type="radio" name="payment" value="card" checked class="hidden">
                            <div class="p-4 border-2 border-blue-500 rounded-lg bg-blue-50 text-center cursor-pointer">
                                <i class="fas fa-credit-card text-2xl text-blue-600 mb-2"></i>
                                <p class="text-sm font-medium">Credit Card</p>
                            </div>
                        </label>
                        
                        <label class="payment-method">
                            <input type="radio" name="payment" value="paypal" class="hidden">
                            <div class="p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 text-center cursor-pointer">
                                <i class="fab fa-paypal text-2xl text-blue-600 mb-2"></i>
                                <p class="text-sm font-medium">PayPal</p>
                            </div>
                        </label>
                        
                        <label class="payment-method">
                            <input type="radio" name="payment" value="apple" class="hidden">
                            <div class="p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 text-center cursor-pointer">
                                <i class="fab fa-apple text-2xl text-gray-800 mb-2"></i>
                                <p class="text-sm font-medium">Apple Pay</p>
                            </div>
                        </label>
                        
                        <label class="payment-method">
                            <input type="radio" name="payment" value="google" class="hidden">
                            <div class="p-4 border-2 border-gray-200 rounded-lg hover:border-blue-300 text-center cursor-pointer">
                                <i class="fab fa-google text-2xl text-red-500 mb-2"></i>
                                <p class="text-sm font-medium">Google Pay</p>
                            </div>
                        </label>
                    </div>
                </div>
                
                <!-- Credit Card Form -->
                <div id="card-form" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Card Number</label>
                        <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="1234 5678 9012 3456">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Expiry Date</label>
                            <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="MM/YY">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">CVV</label>
                            <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="123">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cardholder Name</label>
                        <input type="text" class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none" placeholder="John Doe">
                    </div>
                </div>
                
                <!-- Alternative Payment Forms -->
                <div id="paypal-form" class="hidden">
                    <div class="text-center py-8">
                        <i class="fab fa-paypal text-6xl text-blue-600 mb-4"></i>
                        <p class="text-lg text-gray-700">You will be redirected to PayPal to complete your payment.</p>
                    </div>
                </div>
                
                <div id="apple-form" class="hidden">
                    <div class="text-center py-8">
                        <i class="fab fa-apple text-6xl text-gray-800 mb-4"></i>
                        <p class="text-lg text-gray-700">Use Touch ID or Face ID to pay with Apple Pay.</p>
                    </div>
                </div>
                
                <div id="google-form" class="hidden">
                    <div class="text-center py-8">
                        <i class="fab fa-google text-6xl text-red-500 mb-4"></i>
                        <p class="text-lg text-gray-700">Pay quickly and securely with Google Pay.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                <h2 class="text-xl font-semibold mb-6">Order Summary</h2>
                
                <!-- Cart Items -->
                <div class="space-y-4 mb-6">
                    @foreach($cartItems as $item)
                    <div class="flex items-center space-x-3">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-12 h-12 object-cover rounded-lg">
                        <div class="flex-1">
                            <h4 class="font-medium text-sm">{{ $item['name'] }}</h4>
                            <p class="text-gray-500 text-xs">Qty: {{ $item['quantity'] }}</p>
                        </div>
                        <span class="font-semibold">${{ $item['price'] }}</span>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pricing Breakdown -->
                <div class="space-y-3 mb-6 border-t border-gray-200 pt-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold">${{ $subtotal }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-semibold" id="shipping-cost">${{ $shipping }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span class="font-semibold">${{ $tax }}</span>
                    </div>
                    <div class="border-t border-gray-200 pt-3">
                        <div class="flex justify-between">
                            <span class="text-lg font-semibold">Total</span>
                            <span class="text-2xl font-bold text-blue-600" id="total-cost">${{ $total }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Place Order Button -->
                <button class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-4 rounded-lg hover:from-green-700 hover:to-green-800 transition-all transform hover:scale-105 font-semibold mb-4" onclick="placeOrder()">
                    <i class="fas fa-lock mr-2"></i>Place Order
                </button>
                
                <!-- Security Info -->
                <div class="text-center text-sm text-gray-600">
                    <div class="flex items-center justify-center space-x-2 mb-2">
                        <i class="fas fa-shield-alt text-green-600"></i>
                        <span>256-bit SSL encryption</span>
                    </div>
                    <p>Your payment information is secure</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Payment method selection
        $('.payment-method').on('click', function() {
            $('.payment-method').removeClass('active').find('div').removeClass('border-blue-500 bg-blue-50').addClass('border-gray-200');
            $(this).addClass('active').find('div').addClass('border-blue-500 bg-blue-50').removeClass('border-gray-200');
            
            const paymentType = $(this).find('input').val();
            $('.space-y-4, #paypal-form, #apple-form, #google-form').addClass('hidden');
            
            if (paymentType === 'card') {
                $('#card-form').removeClass('hidden');
            } else {
                $(`#${paymentType}-form`).removeClass('hidden');
            }
        });
        
        // Shipping method change
        $('input[name="shipping"]').on('change', function() {
            const shippingCosts = {
                'standard': 15.99,
                'express': 29.99,
                'overnight': 49.99
            };
            
            const selectedShipping = $(this).val();
            const newShippingCost = shippingCosts[selectedShipping];
            const subtotal = {{ $subtotal }};
            const tax = {{ $tax }};
            const newTotal = (subtotal + newShippingCost + tax).toFixed(2);
            
            $('#shipping-cost').text(`$${newShippingCost}`);
            $('#total-cost').text(`$${newTotal}`);
        });
        
        // Form validation
        $('input[required]').on('blur', function() {
            if (!$(this).val()) {
                $(this).addClass('border-red-500');
            } else {
                $(this).removeClass('border-red-500');
            }
        });
    });
    
    function placeOrder() {
        // Simulate order processing
        const button = event.target;
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
        button.disabled = true;
        
        setTimeout(() => {
            alert('Order placed successfully! You will receive a confirmation email shortly.');
            // In a real app, redirect to success page
            window.location.href = '{{ route("account") }}';
        }, 2000);
    }
</script>
@endsection
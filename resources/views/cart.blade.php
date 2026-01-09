@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-8">Shopping Cart</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold">Cart Items ({{ count($cartItems) }})</h2>
                </div>
                
                <div class="divide-y divide-gray-200">
                    @foreach($cartItems as $item)
                    <div class="p-6 flex items-center space-x-4">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-lg">
                        
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $item['name'] }}</h3>
                            <p class="text-gray-600">SKU: PRD-{{ str_pad($item['id'], 3, '0', STR_PAD_LEFT) }}</p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 font-medium">In Stock</span>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center border-2 border-gray-200 rounded-lg">
                                <button class="px-3 py-1 hover:bg-gray-100 transition-colors" onclick="updateQuantity({{ $item['id'] }}, -1)">
                                    <i class="fas fa-minus text-sm"></i>
                                </button>
                                <input type="number" value="{{ $item['quantity'] }}" min="1" class="w-12 text-center border-0 focus:outline-none" id="qty-{{ $item['id'] }}">
                                <button class="px-3 py-1 hover:bg-gray-100 transition-colors" onclick="updateQuantity({{ $item['id'] }}, 1)">
                                    <i class="fas fa-plus text-sm"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="text-right">
                            <p class="text-lg font-semibold text-gray-800">${{ $item['price'] }}</p>
                            <p class="text-sm text-gray-500">Each</p>
                        </div>
                        
                        <div class="text-right">
                            <p class="text-xl font-bold text-gray-800">${{ $item['total'] }}</p>
                            <button class="text-red-600 hover:text-red-800 text-sm mt-1" onclick="removeItem({{ $item['id'] }})">
                                <i class="fas fa-trash mr-1"></i>Remove
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="p-6 bg-gray-50 flex items-center justify-between">
                    <a href="{{ route('shop') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>Continue Shopping
                    </a>
                    <button class="text-gray-600 hover:text-gray-800 font-medium" onclick="clearCart()">
                        <i class="fas fa-trash mr-2"></i>Clear Cart
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">
                <h2 class="text-xl font-semibold mb-6">Order Summary</h2>
                
                <div class="space-y-4 mb-6">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold">${{ $subtotal }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-semibold">${{ $shipping }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span class="font-semibold">${{ $tax }}</span>
                    </div>
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between">
                            <span class="text-lg font-semibold">Total</span>
                            <span class="text-2xl font-bold text-blue-600">${{ $total }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Promo Code -->
                <div class="mb-6">
                    <div class="flex space-x-2">
                        <input type="text" placeholder="Promo code" class="flex-1 px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none">
                        <button class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                            Apply
                        </button>
                    </div>
                </div>
                
                <!-- Checkout Button -->
                <a href="{{ route('checkout') }}" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all transform hover:scale-105 font-semibold text-center block">
                    <i class="fas fa-lock mr-2"></i>Secure Checkout
                </a>
                
                <!-- Payment Methods -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 mb-3">We accept:</p>
                    <div class="flex justify-center space-x-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa" class="h-8">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-8">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-8">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple Pay" class="h-8">
                    </div>
                </div>
                
                <!-- Security Badge -->
                <div class="mt-6 text-center">
                    <div class="inline-flex items-center space-x-2 text-green-600">
                        <i class="fas fa-shield-alt"></i>
                        <span class="text-sm">SSL Secure Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recommended Products -->
    <section class="mt-16">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">You might also like</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @for($i = 1; $i <= 4; $i++)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all">
                <img src="https://images.unsplash.com/photo-{{ 1505740420928 + $i }}-5e560c06d30e?w=300" alt="Product" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="font-semibold mb-2">Recommended Product {{ $i }}</h3>
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-bold text-gray-800">${{ 99 + ($i * 50) }}.99</span>
                        <button class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-blue-800 transition-all">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </section>
</div>

<script>
    function updateQuantity(itemId, change) {
        const qtyInput = document.getElementById(`qty-${itemId}`);
        let currentQty = parseInt(qtyInput.value);
        let newQty = currentQty + change;
        
        if (newQty >= 1) {
            qtyInput.value = newQty;
            // Update total price (simulate)
            updateItemTotal(itemId, newQty);
        }
    }
    
    function updateItemTotal(itemId, qty) {
        // Simulate price update
        const pricePerItem = itemId === 1 ? 299.99 : 199.99;
        const newTotal = (pricePerItem * qty).toFixed(2);
        
        // Update UI
        $(`#qty-${itemId}`).closest('.p-6').find('.text-xl.font-bold').last().text(`$${newTotal}`);
        
        // Recalculate totals
        updateOrderSummary();
    }
    
    function updateOrderSummary() {
        // Simulate order summary update
        let subtotal = 0;
        $('.text-xl.font-bold').each(function() {
            if ($(this).text().includes('$')) {
                subtotal += parseFloat($(this).text().replace('$', ''));
            }
        });
        
        const shipping = 15.99;
        const tax = subtotal * 0.08;
        const total = subtotal + shipping + tax;
        
        // Update summary (this is a simulation)
        console.log('Updated totals:', { subtotal, shipping, tax, total });
    }
    
    function removeItem(itemId) {
        if (confirm('Are you sure you want to remove this item?')) {
            $(`#qty-${itemId}`).closest('.p-6').fadeOut(300, function() {
                $(this).remove();
                updateOrderSummary();
            });
        }
    }
    
    function clearCart() {
        if (confirm('Are you sure you want to clear your cart?')) {
            $('.divide-y .p-6').fadeOut(300);
            alert('Cart cleared!');
        }
    }
    
    $(document).ready(function() {
        // Promo code functionality
        $('button:contains("Apply")').on('click', function() {
            const promoCode = $(this).prev('input').val();
            if (promoCode) {
                alert(`Promo code "${promoCode}" applied! (This is a demo)`);
            }
        });
    });
</script>
@endsection
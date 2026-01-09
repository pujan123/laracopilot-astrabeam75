<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = [
            [
                'id' => 1,
                'name' => 'Premium Wireless Headphones',
                'price' => 299.99,
                'original_price' => 399.99,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400',
                'rating' => 4.8,
                'reviews' => 124,
                'badge' => 'Best Seller'
            ],
            [
                'id' => 2,
                'name' => 'Smart Fitness Watch',
                'price' => 199.99,
                'original_price' => 249.99,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400',
                'rating' => 4.6,
                'reviews' => 89,
                'badge' => 'New Arrival'
            ],
            [
                'id' => 3,
                'name' => 'Bluetooth Speaker Pro',
                'price' => 149.99,
                'original_price' => 199.99,
                'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=400',
                'rating' => 4.7,
                'reviews' => 156,
                'badge' => 'Hot Deal'
            ],
            [
                'id' => 4,
                'name' => 'Gaming Mechanical Keyboard',
                'price' => 179.99,
                'original_price' => 229.99,
                'image' => 'https://images.unsplash.com/photo-1541140532154-b024d705b90a?w=400',
                'rating' => 4.9,
                'reviews' => 203,
                'badge' => 'Editor\'s Choice'
            ]
        ];

        $categories = [
            ['name' => 'Electronics', 'icon' => 'fas fa-laptop', 'count' => 245],
            ['name' => 'Fashion', 'icon' => 'fas fa-tshirt', 'count' => 189],
            ['name' => 'Home & Garden', 'icon' => 'fas fa-home', 'count' => 156],
            ['name' => 'Sports', 'icon' => 'fas fa-dumbbell', 'count' => 98],
            ['name' => 'Books', 'icon' => 'fas fa-book', 'count' => 234],
            ['name' => 'Beauty', 'icon' => 'fas fa-spa', 'count' => 167]
        ];

        return view('welcome', compact('featuredProducts', 'categories'));
    }

    public function shop()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Premium Wireless Headphones',
                'price' => 299.99,
                'original_price' => 399.99,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=400',
                'rating' => 4.8,
                'reviews' => 124,
                'category' => 'Electronics'
            ],
            [
                'id' => 2,
                'name' => 'Smart Fitness Watch',
                'price' => 199.99,
                'original_price' => 249.99,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=400',
                'rating' => 4.6,
                'reviews' => 89,
                'category' => 'Electronics'
            ],
            [
                'id' => 3,
                'name' => 'Designer Handbag',
                'price' => 449.99,
                'original_price' => 599.99,
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400',
                'rating' => 4.9,
                'reviews' => 67,
                'category' => 'Fashion'
            ],
            [
                'id' => 4,
                'name' => 'Organic Cotton T-Shirt',
                'price' => 29.99,
                'original_price' => 39.99,
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400',
                'rating' => 4.5,
                'reviews' => 234,
                'category' => 'Fashion'
            ],
            [
                'id' => 5,
                'name' => 'Professional Camera',
                'price' => 1299.99,
                'original_price' => 1599.99,
                'image' => 'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=400',
                'rating' => 4.8,
                'reviews' => 45,
                'category' => 'Electronics'
            ],
            [
                'id' => 6,
                'name' => 'Yoga Mat Premium',
                'price' => 79.99,
                'original_price' => 99.99,
                'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009eb?w=400',
                'rating' => 4.7,
                'reviews' => 178,
                'category' => 'Sports'
            ]
        ];

        return view('shop', compact('products'));
    }

    public function product($id)
    {
        $product = [
            'id' => $id,
            'name' => 'Premium Wireless Headphones',
            'price' => 299.99,
            'original_price' => 399.99,
            'images' => [
                'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600',
                'https://images.unsplash.com/photo-1484704849700-f032a568e944?w=600',
                'https://images.unsplash.com/photo-1583394838336-acd977736f90?w=600'
            ],
            'rating' => 4.8,
            'reviews' => 124,
            'description' => 'Experience premium sound quality with our flagship wireless headphones. Featuring active noise cancellation, 30-hour battery life, and premium comfort design.',
            'features' => [
                'Active Noise Cancellation',
                '30-hour Battery Life',
                'Premium Comfort Design',
                'Quick Charge Technology',
                'Wireless & Wired Options',
                '2-Year Warranty'
            ],
            'specifications' => [
                'Driver Size' => '40mm',
                'Frequency Response' => '20Hz - 20kHz',
                'Impedance' => '32 Ohms',
                'Weight' => '250g',
                'Connectivity' => 'Bluetooth 5.0, 3.5mm',
                'Battery' => '30 hours playback'
            ],
            'stock' => 15,
            'category' => 'Electronics'
        ];

        $relatedProducts = [
            [
                'id' => 2,
                'name' => 'Bluetooth Speaker Pro',
                'price' => 149.99,
                'image' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=300',
                'rating' => 4.7
            ],
            [
                'id' => 3,
                'name' => 'Wireless Earbuds',
                'price' => 89.99,
                'image' => 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=300',
                'rating' => 4.5
            ],
            [
                'id' => 4,
                'name' => 'Gaming Headset',
                'price' => 199.99,
                'image' => 'https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=300',
                'rating' => 4.6
            ]
        ];

        return view('product', compact('product', 'relatedProducts'));
    }

    public function cart()
    {
        $cartItems = [
            [
                'id' => 1,
                'name' => 'Premium Wireless Headphones',
                'price' => 299.99,
                'quantity' => 1,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=200',
                'total' => 299.99
            ],
            [
                'id' => 2,
                'name' => 'Smart Fitness Watch',
                'price' => 199.99,
                'quantity' => 2,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=200',
                'total' => 399.98
            ]
        ];

        $subtotal = 699.97;
        $shipping = 15.99;
        $tax = 57.60;
        $total = 773.56;

        return view('cart', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total'));
    }

    public function checkout()
    {
        $cartItems = [
            [
                'id' => 1,
                'name' => 'Premium Wireless Headphones',
                'price' => 299.99,
                'quantity' => 1,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100'
            ],
            [
                'id' => 2,
                'name' => 'Smart Fitness Watch',
                'price' => 199.99,
                'quantity' => 2,
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=100'
            ]
        ];

        $subtotal = 699.97;
        $shipping = 15.99;
        $tax = 57.60;
        $total = 773.56;

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'tax', 'total'));
    }

    public function account()
    {
        $user = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+1 (555) 123-4567',
            'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200'
        ];

        $orders = [
            [
                'id' => '#ORD-2024-001',
                'date' => '2024-01-15',
                'status' => 'Delivered',
                'total' => 299.99,
                'items' => 2
            ],
            [
                'id' => '#ORD-2024-002',
                'date' => '2024-01-10',
                'status' => 'Processing',
                'total' => 149.99,
                'items' => 1
            ],
            [
                'id' => '#ORD-2024-003',
                'date' => '2024-01-05',
                'status' => 'Shipped',
                'total' => 89.99,
                'items' => 1
            ]
        ];

        return view('account', compact('user', 'orders'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
}
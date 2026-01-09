<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Check admin authentication for all methods
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
    }

    public function dashboard()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $stats = [
            'total_sales' => 125430.50,
            'total_orders' => 1247,
            'total_customers' => 892,
            'total_products' => 156,
            'pending_orders' => 23,
            'low_stock_items' => 8,
            'monthly_revenue' => 45230.75,
            'conversion_rate' => 3.2
        ];

        $recentOrders = [
            ['id' => '#ORD-2024-045', 'customer' => 'Sarah Johnson', 'total' => 299.99, 'status' => 'Processing', 'date' => '2024-01-20'],
            ['id' => '#ORD-2024-044', 'customer' => 'Mike Chen', 'total' => 149.99, 'status' => 'Shipped', 'date' => '2024-01-20'],
            ['id' => '#ORD-2024-043', 'customer' => 'Emma Wilson', 'total' => 89.99, 'status' => 'Delivered', 'date' => '2024-01-19'],
            ['id' => '#ORD-2024-042', 'customer' => 'David Brown', 'total' => 199.99, 'status' => 'Processing', 'date' => '2024-01-19'],
            ['id' => '#ORD-2024-041', 'customer' => 'Lisa Davis', 'total' => 349.99, 'status' => 'Cancelled', 'date' => '2024-01-18']
        ];

        $topProducts = [
            ['name' => 'Premium Wireless Headphones', 'sales' => 234, 'revenue' => 70146.66],
            ['name' => 'Smart Fitness Watch', 'sales' => 189, 'revenue' => 37798.11],
            ['name' => 'Bluetooth Speaker Pro', 'sales' => 156, 'revenue' => 23398.44],
            ['name' => 'Gaming Mechanical Keyboard', 'sales' => 123, 'revenue' => 22137.77]
        ];

        return view('admin.dashboard', compact('stats', 'recentOrders', 'topProducts'));
    }

    public function products()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $products = [
            [
                'id' => 1,
                'name' => 'Premium Wireless Headphones',
                'sku' => 'PWH-001',
                'category' => 'Electronics',
                'price' => 299.99,
                'stock' => 15,
                'status' => 'Active',
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100',
                'created_at' => '2024-01-15'
            ],
            [
                'id' => 2,
                'name' => 'Smart Fitness Watch',
                'sku' => 'SFW-002',
                'category' => 'Electronics',
                'price' => 199.99,
                'stock' => 8,
                'status' => 'Active',
                'image' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=100',
                'created_at' => '2024-01-14'
            ],
            [
                'id' => 3,
                'name' => 'Designer Handbag',
                'sku' => 'DHB-003',
                'category' => 'Fashion',
                'price' => 449.99,
                'stock' => 3,
                'status' => 'Low Stock',
                'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=100',
                'created_at' => '2024-01-12'
            ],
            [
                'id' => 4,
                'name' => 'Organic Cotton T-Shirt',
                'sku' => 'OCT-004',
                'category' => 'Fashion',
                'price' => 29.99,
                'stock' => 45,
                'status' => 'Active',
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=100',
                'created_at' => '2024-01-10'
            ],
            [
                'id' => 5,
                'name' => 'Professional Camera',
                'sku' => 'PC-005',
                'category' => 'Electronics',
                'price' => 1299.99,
                'stock' => 1,
                'status' => 'Out of Stock',
                'image' => 'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=100',
                'created_at' => '2024-01-08'
            ]
        ];

        return view('admin.products', compact('products'));
    }

    public function orders()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $orders = [
            [
                'id' => '#ORD-2024-045',
                'customer' => 'Sarah Johnson',
                'email' => 'sarah@example.com',
                'total' => 299.99,
                'status' => 'Processing',
                'payment' => 'Credit Card',
                'items' => 1,
                'date' => '2024-01-20 10:30 AM'
            ],
            [
                'id' => '#ORD-2024-044',
                'customer' => 'Mike Chen',
                'email' => 'mike@example.com',
                'total' => 149.99,
                'status' => 'Shipped',
                'payment' => 'PayPal',
                'items' => 1,
                'date' => '2024-01-20 09:15 AM'
            ],
            [
                'id' => '#ORD-2024-043',
                'customer' => 'Emma Wilson',
                'email' => 'emma@example.com',
                'total' => 89.99,
                'status' => 'Delivered',
                'payment' => 'Credit Card',
                'items' => 1,
                'date' => '2024-01-19 03:45 PM'
            ],
            [
                'id' => '#ORD-2024-042',
                'customer' => 'David Brown',
                'email' => 'david@example.com',
                'total' => 199.99,
                'status' => 'Processing',
                'payment' => 'Apple Pay',
                'items' => 2,
                'date' => '2024-01-19 11:20 AM'
            ],
            [
                'id' => '#ORD-2024-041',
                'customer' => 'Lisa Davis',
                'email' => 'lisa@example.com',
                'total' => 349.99,
                'status' => 'Cancelled',
                'payment' => 'Credit Card',
                'items' => 1,
                'date' => '2024-01-18 02:10 PM'
            ]
        ];

        return view('admin.orders', compact('orders'));
    }

    public function customers()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $customers = [
            [
                'id' => 1,
                'name' => 'Sarah Johnson',
                'email' => 'sarah@example.com',
                'phone' => '+1 (555) 123-4567',
                'orders' => 12,
                'total_spent' => 2499.88,
                'status' => 'VIP',
                'joined' => '2023-03-15',
                'last_order' => '2024-01-20'
            ],
            [
                'id' => 2,
                'name' => 'Mike Chen',
                'email' => 'mike@example.com',
                'phone' => '+1 (555) 234-5678',
                'orders' => 8,
                'total_spent' => 1299.92,
                'status' => 'Regular',
                'joined' => '2023-06-22',
                'last_order' => '2024-01-20'
            ],
            [
                'id' => 3,
                'name' => 'Emma Wilson',
                'email' => 'emma@example.com',
                'phone' => '+1 (555) 345-6789',
                'orders' => 15,
                'total_spent' => 3249.85,
                'status' => 'VIP',
                'joined' => '2023-01-10',
                'last_order' => '2024-01-19'
            ],
            [
                'id' => 4,
                'name' => 'David Brown',
                'email' => 'david@example.com',
                'phone' => '+1 (555) 456-7890',
                'orders' => 3,
                'total_spent' => 599.97,
                'status' => 'New',
                'joined' => '2023-12-05',
                'last_order' => '2024-01-19'
            ],
            [
                'id' => 5,
                'name' => 'Lisa Davis',
                'email' => 'lisa@example.com',
                'phone' => '+1 (555) 567-8901',
                'orders' => 6,
                'total_spent' => 899.94,
                'status' => 'Regular',
                'joined' => '2023-08-18',
                'last_order' => '2024-01-18'
            ]
        ];

        return view('admin.customers', compact('customers'));
    }

    public function inventory()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $inventory = [
            [
                'id' => 1,
                'name' => 'Premium Wireless Headphones',
                'sku' => 'PWH-001',
                'current_stock' => 15,
                'min_stock' => 10,
                'max_stock' => 50,
                'cost_price' => 150.00,
                'sell_price' => 299.99,
                'supplier' => 'TechSupply Co.',
                'location' => 'A-1-001',
                'last_restock' => '2024-01-15'
            ],
            [
                'id' => 2,
                'name' => 'Smart Fitness Watch',
                'sku' => 'SFW-002',
                'current_stock' => 8,
                'min_stock' => 15,
                'max_stock' => 40,
                'cost_price' => 100.00,
                'sell_price' => 199.99,
                'supplier' => 'WearTech Ltd.',
                'location' => 'A-1-002',
                'last_restock' => '2024-01-10'
            ],
            [
                'id' => 3,
                'name' => 'Designer Handbag',
                'sku' => 'DHB-003',
                'current_stock' => 3,
                'min_stock' => 5,
                'max_stock' => 20,
                'cost_price' => 225.00,
                'sell_price' => 449.99,
                'supplier' => 'Fashion House Inc.',
                'location' => 'B-2-015',
                'last_restock' => '2024-01-05'
            ],
            [
                'id' => 4,
                'name' => 'Organic Cotton T-Shirt',
                'sku' => 'OCT-004',
                'current_stock' => 45,
                'min_stock' => 20,
                'max_stock' => 100,
                'cost_price' => 12.00,
                'sell_price' => 29.99,
                'supplier' => 'Organic Wear Co.',
                'location' => 'C-3-025',
                'last_restock' => '2024-01-12'
            ],
            [
                'id' => 5,
                'name' => 'Professional Camera',
                'sku' => 'PC-005',
                'current_stock' => 0,
                'min_stock' => 5,
                'max_stock' => 15,
                'cost_price' => 650.00,
                'sell_price' => 1299.99,
                'supplier' => 'Camera Pro Ltd.',
                'location' => 'A-1-010',
                'last_restock' => '2023-12-20'
            ]
        ];

        return view('admin.inventory', compact('inventory'));
    }

    public function categories()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $categories = [
            [
                'id' => 1,
                'name' => 'Electronics',
                'slug' => 'electronics',
                'products_count' => 45,
                'status' => 'Active',
                'description' => 'Latest technology and electronic devices',
                'created_at' => '2023-01-15'
            ],
            [
                'id' => 2,
                'name' => 'Fashion',
                'slug' => 'fashion',
                'products_count' => 32,
                'status' => 'Active',
                'description' => 'Trendy clothing and accessories',
                'created_at' => '2023-01-15'
            ],
            [
                'id' => 3,
                'name' => 'Home & Garden',
                'slug' => 'home-garden',
                'products_count' => 28,
                'status' => 'Active',
                'description' => 'Home improvement and garden supplies',
                'created_at' => '2023-01-20'
            ],
            [
                'id' => 4,
                'name' => 'Sports & Fitness',
                'slug' => 'sports-fitness',
                'products_count' => 19,
                'status' => 'Active',
                'description' => 'Sports equipment and fitness gear',
                'created_at' => '2023-02-01'
            ],
            [
                'id' => 5,
                'name' => 'Books & Media',
                'slug' => 'books-media',
                'products_count' => 15,
                'status' => 'Active',
                'description' => 'Books, magazines, and digital media',
                'created_at' => '2023-02-10'
            ],
            [
                'id' => 6,
                'name' => 'Beauty & Health',
                'slug' => 'beauty-health',
                'products_count' => 17,
                'status' => 'Inactive',
                'description' => 'Beauty products and health supplements',
                'created_at' => '2023-03-01'
            ]
        ];

        return view('admin.categories', compact('categories'));
    }

    public function analytics()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $analytics = [
            'sales_data' => [
                'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'data' => [12500, 15200, 18900, 22100, 19800, 25600, 28900, 32100, 29800, 35200, 38900, 42100]
            ],
            'top_categories' => [
                ['name' => 'Electronics', 'revenue' => 45230.50, 'percentage' => 35.2],
                ['name' => 'Fashion', 'revenue' => 32180.75, 'percentage' => 25.1],
                ['name' => 'Home & Garden', 'revenue' => 23450.25, 'percentage' => 18.3],
                ['name' => 'Sports', 'revenue' => 15670.00, 'percentage' => 12.2],
                ['name' => 'Books', 'revenue' => 11899.00, 'percentage' => 9.2]
            ],
            'customer_metrics' => [
                'new_customers' => 156,
                'returning_customers' => 342,
                'customer_lifetime_value' => 285.50,
                'churn_rate' => 12.5
            ],
            'traffic_sources' => [
                ['source' => 'Organic Search', 'visitors' => 2340, 'percentage' => 42.1],
                ['source' => 'Direct', 'visitors' => 1890, 'percentage' => 34.0],
                ['source' => 'Social Media', 'visitors' => 780, 'percentage' => 14.0],
                ['source' => 'Email', 'visitors' => 345, 'percentage' => 6.2],
                ['source' => 'Paid Ads', 'visitors' => 210, 'percentage' => 3.7]
            ]
        ];

        return view('admin.analytics', compact('analytics'));
    }

    public function settings()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $settings = [
            'store_info' => [
                'name' => 'EliteShop E-commerce',
                'email' => 'admin@eliteshop.com',
                'phone' => '+1 (555) 123-4567',
                'address' => '123 Commerce Street, Business District, NY 10001',
                'timezone' => 'America/New_York',
                'currency' => 'USD'
            ],
            'payment_methods' => [
                'stripe' => ['enabled' => true, 'test_mode' => true],
                'paypal' => ['enabled' => true, 'test_mode' => false],
                'square' => ['enabled' => false, 'test_mode' => true],
                'apple_pay' => ['enabled' => true, 'test_mode' => false],
                'google_pay' => ['enabled' => true, 'test_mode' => false]
            ],
            'shipping_methods' => [
                'standard' => ['enabled' => true, 'rate' => 9.99, 'days' => '5-7'],
                'express' => ['enabled' => true, 'rate' => 19.99, 'days' => '2-3'],
                'overnight' => ['enabled' => false, 'rate' => 39.99, 'days' => '1'],
                'free_shipping' => ['enabled' => true, 'minimum' => 75.00]
            ],
            'tax_settings' => [
                'tax_rate' => 8.25,
                'tax_included' => false,
                'tax_regions' => ['NY', 'CA', 'TX', 'FL']
            ]
        ];

        return view('admin.settings', compact('settings'));
    }
}
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <div class="text-center px-6">
        <div class="mb-8">
            <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full mb-6">
                <i class="fas fa-search text-6xl text-blue-500"></i>
            </div>
            <h1 class="text-8xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">404</h1>
        </div>
        
        <div class="max-w-md mx-auto mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Page Not Found</h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Oops! The page you're looking for seems to have wandered off. Don't worry, even the best explorers sometimes take a wrong turn.
            </p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-full hover:from-blue-700 hover:to-blue-800 transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-home mr-2"></i>Back to Home
            </a>
            <a href="{{ route('shop') }}" class="bg-gradient-to-r from-purple-600 to-purple-700 text-white px-8 py-3 rounded-full hover:from-purple-700 hover:to-purple-800 transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-shopping-bag mr-2"></i>Continue Shopping
            </a>
        </div>
        
        <div class="mt-12 text-gray-500">
            <p class="text-sm">Need help? Contact our support team</p>
            <a href="mailto:support@eliteshop.com" class="text-blue-600 hover:text-blue-800 font-medium">support@eliteshop.com</a>
        </div>
    </div>
</div>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    .fas.fa-search {
        animation: float 3s ease-in-out infinite;
    }
</style>
@endsection
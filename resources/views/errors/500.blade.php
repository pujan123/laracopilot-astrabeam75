@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-red-50 via-white to-orange-50">
    <div class="text-center px-6">
        <div class="mb-8">
            <div class="inline-flex items-center justify-center w-32 h-32 bg-gradient-to-r from-red-100 to-orange-100 rounded-full mb-6">
                <i class="fas fa-exclamation-triangle text-6xl text-red-500"></i>
            </div>
            <h1 class="text-8xl font-bold bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">500</h1>
        </div>
        
        <div class="max-w-md mx-auto mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Server Error</h2>
            <p class="text-gray-600 text-lg leading-relaxed">
                Something went wrong on our end. Our team has been notified and is working to fix the issue. Please try again in a few moments.
            </p>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('home') }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-8 py-3 rounded-full hover:from-blue-700 hover:to-blue-800 transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-home mr-2"></i>Back to Home
            </a>
            <button onclick="window.location.reload()" class="bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-3 rounded-full hover:from-green-700 hover:to-green-800 transition-all transform hover:scale-105 shadow-lg">
                <i class="fas fa-redo mr-2"></i>Try Again
            </button>
        </div>
        
        <div class="mt-12 text-gray-500">
            <p class="text-sm">If the problem persists, please contact our support team</p>
            <a href="mailto:support@eliteshop.com" class="text-blue-600 hover:text-blue-800 font-medium">support@eliteshop.com</a>
        </div>
    </div>
</div>

<style>
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    .fas.fa-exclamation-triangle {
        animation: shake 2s ease-in-out infinite;
    }
</style>
@endsection
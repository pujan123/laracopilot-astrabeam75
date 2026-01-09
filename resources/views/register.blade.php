@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-purple-50 via-white to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <h2 class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">Create Account</h2>
            <p class="mt-2 text-gray-600">Join EliteShop today</p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <form class="space-y-6" action="#" method="POST">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">First name</label>
                        <input id="first-name" name="first-name" type="text" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition-colors" placeholder="First name">
                    </div>
                    
                    <div>
                        <label for="last-name" class="block text-sm font-medium text-gray-700 mb-2">Last name</label>
                        <input id="last-name" name="last-name" type="text" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition-colors" placeholder="Last name">
                    </div>
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                    <input id="email" name="email" type="email" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition-colors" placeholder="Enter your email">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone number</label>
                    <input id="phone" name="phone" type="tel" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition-colors" placeholder="+1 (555) 123-4567">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <div class="relative">
                        <input id="password" name="password" type="password" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition-colors" placeholder="Create a password">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('password')">
                            <i id="password-icon" class="fas fa-eye text-gray-400"></i>
                        </button>
                    </div>
                    <div class="mt-2">
                        <div class="flex space-x-1">
                            <div id="strength-1" class="h-2 w-full bg-gray-200 rounded"></div>
                            <div id="strength-2" class="h-2 w-full bg-gray-200 rounded"></div>
                            <div id="strength-3" class="h-2 w-full bg-gray-200 rounded"></div>
                            <div id="strength-4" class="h-2 w-full bg-gray-200 rounded"></div>
                        </div>
                        <p id="strength-text" class="text-sm text-gray-600 mt-1">Password strength</p>
                    </div>
                </div>
                
                <div>
                    <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-2">Confirm password</label>
                    <div class="relative">
                        <input id="confirm-password" name="confirm-password" type="password" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none transition-colors" placeholder="Confirm your password">
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="togglePassword('confirm-password')">
                            <i id="confirm-password-icon" class="fas fa-eye text-gray-400"></i>
                        </button>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mt-1">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Terms of Service</a> and <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Privacy Policy</a>
                    </label>
                </div>
                
                <div class="flex items-start">
                    <input id="newsletter" name="newsletter" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded mt-1">
                    <label for="newsletter" class="ml-2 block text-sm text-gray-700">
                        Subscribe to our newsletter for exclusive deals and updates
                    </label>
                </div>
                
                <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white py-3 px-4 rounded-lg hover:from-purple-700 hover:to-blue-700 transition-all transform hover:scale-105 font-semibold shadow-lg">
                    Create Account
                </button>
                
                <div class="text-center">
                    <span class="text-gray-600">Already have an account?</span>
                    <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium ml-1">Sign in</a>
                </div>
            </form>
            
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or sign up with</span>
                    </div>
                </div>
                
                <div class="mt-6 grid grid-cols-2 gap-3">
                    <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fab fa-google text-red-500"></i>
                        <span class="ml-2">Google</span>
                    </button>
                    
                    <button class="w-full inline-flex justify-center py-3 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fab fa-facebook-f text-blue-600"></i>
                        <span class="ml-2">Facebook</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId) {
        const passwordInput = document.getElementById(inputId);
        const passwordIcon = document.getElementById(inputId + '-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    }
    
    function checkPasswordStrength(password) {
        let strength = 0;
        const strengthBars = document.querySelectorAll('[id^="strength-"]');
        const strengthText = document.getElementById('strength-text');
        
        // Reset all bars
        strengthBars.forEach(bar => {
            bar.className = 'h-2 w-full bg-gray-200 rounded';
        });
        
        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        
        const colors = ['bg-red-500', 'bg-yellow-500', 'bg-blue-500', 'bg-green-500'];
        const texts = ['Weak', 'Fair', 'Good', 'Strong'];
        
        for (let i = 0; i < strength; i++) {
            strengthBars[i].className = `h-2 w-full ${colors[strength - 1]} rounded`;
        }
        
        if (password.length > 0) {
            strengthText.textContent = texts[strength - 1] || 'Very Weak';
        } else {
            strengthText.textContent = 'Password strength';
        }
    }
    
    $(document).ready(function() {
        $('#password').on('input', function() {
            checkPasswordStrength($(this).val());
        });
        
        $('form').on('submit', function(e) {
            e.preventDefault();
            const password = $('#password').val();
            const confirmPassword = $('#confirm-password').val();
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }
            
            if (!$('#terms').is(':checked')) {
                alert('Please accept the Terms of Service and Privacy Policy');
                return;
            }
            
            alert('Account created successfully! Welcome to EliteShop.');
            window.location.href = '{{ route("login") }}';
        });
    });
</script>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EliteShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-gray-900 via-blue-900 to-purple-900 min-h-screen font-sans">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <!-- Header -->
            <div class="text-center">
                <div class="mx-auto h-16 w-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h2 class="text-4xl font-bold text-white mb-2">Admin Portal</h2>
                <p class="text-blue-200">EliteShop Management System</p>
            </div>
            
            <!-- Login Form -->
            <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl p-8 border border-white/20">
                @if(session('error'))
                <div class="mb-4 p-4 bg-red-500/20 border border-red-500/50 rounded-lg text-red-200">
                    {{ session('error') }}
                </div>
                @endif
                
                <form action="/admin/login" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">
                            <i class="fas fa-envelope mr-2"></i>Email Address
                        </label>
                        <input id="email" name="email" type="email" required 
                               class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-lg focus:border-blue-400 focus:outline-none text-white placeholder-gray-300 backdrop-blur-sm" 
                               placeholder="Enter admin email">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-white mb-2">
                            <i class="fas fa-lock mr-2"></i>Password
                        </label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required 
                                   class="w-full px-4 py-3 bg-white/10 border border-white/30 rounded-lg focus:border-blue-400 focus:outline-none text-white placeholder-gray-300 backdrop-blur-sm" 
                                   placeholder="Enter password">
                            <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-300 hover:text-white" onclick="togglePassword()">
                                <i id="password-icon" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all transform hover:scale-105 font-semibold shadow-lg">
                        <i class="fas fa-sign-in-alt mr-2"></i>Sign In to Admin Panel
                    </button>
                </form>
                
                <!-- Demo Credentials -->
                <div class="mt-8 p-6 bg-black/20 rounded-xl border border-white/10">
                    <h3 class="text-white font-semibold mb-4 flex items-center">
                        <i class="fas fa-key mr-2 text-yellow-400"></i>Demo Credentials
                    </h3>
                    <div class="space-y-3 text-sm">
                        @foreach($credentials as $cred)
                        <div class="flex items-center justify-between p-3 bg-white/5 rounded-lg border border-white/10 hover:bg-white/10 transition-colors cursor-pointer" onclick="fillCredentials('{{ $cred['email'] }}', '{{ $cred['password'] }}')">
                            <div>
                                <p class="text-white font-medium">{{ $cred['name'] }}</p>
                                <p class="text-blue-200 text-xs">{{ $cred['role'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-300 text-xs">{{ $cred['email'] }}</p>
                                <p class="text-gray-400 text-xs">{{ $cred['password'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-400 mt-4 text-center">Click any credential above to auto-fill</p>
                </div>
                
                <!-- Back to Website -->
                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-blue-300 hover:text-blue-100 text-sm font-medium transition-colors">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Website
                    </a>
                </div>
            </div>
            
            <!-- Security Notice -->
            <div class="text-center">
                <div class="inline-flex items-center space-x-2 text-blue-200">
                    <i class="fas fa-shield-alt"></i>
                    <span class="text-sm">Secure Admin Access</span>
                </div>
                <p class="text-xs text-gray-400 mt-2">This is a protected area. Only authorized personnel allowed.</p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
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
        
        function fillCredentials(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
            
            // Add visual feedback
            const button = event.currentTarget;
            button.classList.add('bg-blue-500/20', 'border-blue-400');
            setTimeout(() => {
                button.classList.remove('bg-blue-500/20', 'border-blue-400');
            }, 1000);
        }
        
        $(document).ready(function() {
            // Add loading state to form submission
            $('form').on('submit', function() {
                const button = $(this).find('button[type="submit"]');
                button.html('<i class="fas fa-spinner fa-spin mr-2"></i>Signing In...').prop('disabled', true);
            });
        });
    </script>
</body>
</html>
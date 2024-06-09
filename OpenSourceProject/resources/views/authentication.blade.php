<x-layout :pageTitle="'Authentication'">
    <div class="relative">

        <x-banner></x-banner>

        <div class="absolute inset-0 container mx-auto p-4 flex justify-center items-center">       
            <!-- Login Form -->
            <div id="login-form" class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm mx-auto">
                <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="login-email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="login-email" id="login-email" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="login-password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="login-password" id="login-password" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Login</button>
                    <p class="mt-4 text-center text-sm text-gray-600">
                        Don't have an account? <a href="#" id="show-signup" class="text-blue-500 hover:underline">Sign up</a>
                    </p>
                </form>
            </div>

    
            <div id="signup-form" class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm mx-auto hidden">
                <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">Sign Up</button>
                    <p class="mt-4 text-center text-sm text-gray-600">
                        Already have an account? <a href="#" id="show-login" class="text-blue-500 hover:underline">Login</a>
                    </p>
                </form>
            </div>
            
        </div>
    </div>
    
</x-layout>
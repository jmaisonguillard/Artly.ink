@extends('layouts.blank')

@section('content')
    <!-- Forgot Password View -->
    <div x-data="{ view: 'request' }"> <!-- 'request' or 'success' -->
        <!-- Header -->
        <header class="bg-white border-b border-gray-100">
            <div class="max-w-8xl mx-auto">
                <div class="flex items-center h-20 px-4 sm:px-6 lg:px-8">
                    <a href="{{ route('home') }}" class="flex items-center text-purple-600 hover:text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        Back to Login
                    </a>
                </div>
            </div>
        </header>

        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12 mb-[10rem] bg-gray-50">
            <div class="max-w-md mx-auto">
                <!-- Request Password Reset View -->
                <div x-show="view === 'request'" class="bg-white rounded-2xl shadow-lg p-8">
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold mb-2">Reset Your Password</h1>
                        <p class="text-gray-600">Enter your email address and we'll send you instructions to reset your
                            password.</p>
                    </div>

                    <form class="space-y-6" @submit.prevent="view = 'success'">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                Email Address
                            </label>
                            <input type="email" id="email"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Enter your email" required>
                        </div>

                        <button type="submit"
                            class="w-full bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-500 transition-colors">
                            Send Reset Instructions
                        </button>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">
                            Remember your password?
                            <a href="#" class="text-purple-600 hover:text-purple-500 font-medium">
                                Log in
                            </a>
                        </p>
                    </div>
                </div>

                <!-- Success View -->
                <div x-show="view === 'success'" class="bg-white rounded-2xl shadow-lg p-8 text-center">
                    <div class="mb-6">
                        <!-- Success Icon -->
                        <div class="mx-auto w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>

                        <h2 class="text-2xl font-bold mb-2">Check Your Email</h2>
                        <p class="text-gray-600 mb-6">
                            We've sent password reset instructions to your email address. Please check your inbox.
                        </p>

                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <p class="text-sm text-gray-600">
                                Didn't receive the email? Check your spam folder or
                                <button class="text-purple-600 hover:text-purple-500 font-medium" @click="view = 'request'">
                                    try again
                                </button>
                            </p>
                        </div>

                        <a href="{{ route('login') }}"
                            class="inline-block bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-500 transition-colors">
                            Return to Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

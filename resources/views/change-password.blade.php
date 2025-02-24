@extends('layouts.blank')

@section('content')
    <div x-data="{
        showPassword: false,
        showConfirmPassword: false,
        form: {
            password: '',
            confirmPassword: ''
        },
        passwordStrength: {
            length: false,
            number: false,
            special: false,
            match: false
        },
        checkPassword() {
            this.passwordStrength.length = this.form.password.length >= 8;
            this.passwordStrength.number = /\d/.test(this.form.password);
            this.passwordStrength.special = /[!@#$%^&*]/.test(this.form.password);
            this.passwordStrength.match = this.form.password === this.form.confirmPassword && this.form.password !== '';
        }
    }" @input="checkPassword">

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

        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gray-50">
            <div class="max-w-md mx-auto">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h1 class="text-3xl font-bold mb-2">Set New Password</h1>
                        <p class="text-gray-600">Please create a strong password for your account</p>
                    </div>

                    <!-- Password Reset Form -->
                    <form class="space-y-6" @submit.prevent="// Handle form submission">
                        <!-- New Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                New Password
                            </label>
                            <div class="relative">
                                <input :type="showPassword ? 'text' : 'password'" id="password" x-model="form.password"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="Enter new password" required>
                                <button type="button" @click="showPassword = !showPassword"
                                    class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600">
                                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password Input -->
                        <div>
                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input :type="showConfirmPassword ? 'text' : 'password'" id="confirmPassword"
                                    x-model="form.confirmPassword"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                    placeholder="Confirm new password" required>
                                <button type="button" @click="showConfirmPassword = !showConfirmPassword"
                                    class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600">
                                    <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <svg x-show="showConfirmPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Password Requirements -->
                        <div class="bg-gray-50 rounded-lg p-4 space-y-2">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Password Requirements:</h3>
                            <div class="flex items-center text-sm">
                                <svg :class="passwordStrength.length ? 'text-green-500' : 'text-gray-300'"
                                    class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                At least 8 characters
                            </div>
                            <div class="flex items-center text-sm">
                                <svg :class="passwordStrength.number ? 'text-green-500' : 'text-gray-300'"
                                    class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Contains at least one number
                            </div>
                            <div class="flex items-center text-sm">
                                <svg :class="passwordStrength.special ? 'text-green-500' : 'text-gray-300'"
                                    class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Contains at least one special character
                            </div>
                            <div class="flex items-center text-sm">
                                <svg :class="passwordStrength.match ? 'text-green-500' : 'text-gray-300'"
                                    class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                                Passwords match
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-500 transition-colors"
                            :disabled="!passwordStrength.length || !passwordStrength.number || !passwordStrength.special || !
                                passwordStrength.match"
                            :class="{ 'opacity-50 cursor-not-allowed': !passwordStrength.length || !passwordStrength.number || !
                                    passwordStrength.special || !passwordStrength.match }">
                            Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

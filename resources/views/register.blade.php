@extends('layouts.blank')

@section('content')
    <header class="bg-white border-b border-gray-100">
        <div class="max-w-8xl mx-auto">
            <div class="flex items-center h-20 px-4 sm:px-6 lg:px-8">
                <a href="{{ route('home') }}" class="flex items-center text-purple-600 hover:text-purple-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>
    </header>

    <div class="min-h-screen pt-[100px] max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-gray-50">
        <div class="max-w-xl mx-auto">
            <!-- Registration Card -->
            <div class="bg-white rounded-2xl shadow-lg p-8" x-data="{
                userType: 'client',
                showPassword: false,
                form: {
                    firstName: '',
                    lastName: '',
                    email: '',
                    password: '',
                    portfolio: '',
                    terms: false
                }
            }">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold mb-2">Create Your Account</h1>
                    <p class="text-gray-600">Join the Artly community and start your creative journey</p>
                </div>

                <!-- User Type Selection -->
                <div class="flex-grow flex rounded-lg bg-gray-100 p-1 mb-8">
                    <button @click="userType = 'client'"
                        :class="userType === 'client' ? 'bg-white text-purple-600 shadow-sm' :
                            'text-gray-600 hover:text-gray-900'"
                        class="flex-1 py-3 px-4 rounded-md font-medium transition-colors">
                        Join as Client
                    </button>
                    <button @click="userType = 'artist'"
                        :class="userType === 'artist' ? 'bg-white text-purple-600 shadow-sm' :
                            'text-gray-600 hover:text-gray-900'"
                        class="flex-1 py-3 px-4 rounded-md font-medium transition-colors">
                        Join as Artist
                    </button>
                </div>

                <!-- Registration Form -->
                <form class="space-y-6" action="{{ route('create.user') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" :value="userType === 'client' ? 'user' : 'artist'">
                    @if ($errors->any())
                        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <ul class="list-disc pl-5 space-y-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">
                                First Name
                            </label>
                            <input type="text" id="firstName" name="first_name" x-model="form.firstName"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Enter first name">
                        </div>
                        <div>
                            <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">
                                Last Name
                            </label>
                            <input type="text" id="lastName" name="last_name" x-model="form.lastName"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Enter last name">
                        </div>
                    </div>

                    <div>
                        <label for="displayName" class="block text-sm font-medium text-gray-700 mb-1">
                            Display Name
                        </label>
                        <input type="text" id="displayName" name="display_name" x-model="form.displayName"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="Choose a display name">
                        <p class="mt-1 text-sm text-gray-500">This is how you'll appear to others on the platform</p>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email Address
                        </label>
                        <input type="email" id="email" name="email" x-model="form.email"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="Enter your email">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" id="password" name="password" x-model="form.password"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Create a password">
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
                        <p class="mt-1 text-sm text-gray-500">Must be at least 6 characters</p>
                    </div>

                    <div x-show="userType === 'artist'" x-transition>
                        <label for="portfolio" class="block text-sm font-medium text-gray-700 mb-1">
                            Website URL (Optional)
                        </label>
                        <input type="url" id="portfolio" name="website_url" x-model="form.portfolio"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="https://your-website.com">
                    </div>

                    <div>
                        <label class="flex items-start">
                            <input type="checkbox" name="terms" x-model="form.terms"
                                class="mt-1 h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                            <span class="ml-2 text-sm text-gray-600">
                                I agree to Artly's
                                <a href="#" class="text-purple-600 hover:text-purple-500">Terms of Service</a>
                                and
                                <a href="#" class="text-purple-600 hover:text-purple-500">Privacy Policy</a>
                            </span>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-500 transition-colors"
                        :disabled="!form.terms" :class="{ 'opacity-50 cursor-not-allowed': !form.terms }">
                        Create Account
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-gray-600">
                        Already have an account?
                        <a href="#" class="text-purple-600 hover:text-purple-500 font-medium">
                            Log in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

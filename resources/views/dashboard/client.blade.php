@extends('layouts.app')

@section('content')
    <!-- Main Dashboard Content -->
    <div class="p-6 bg-gray-50">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ auth()->user()->display_name }}!</h1>
            <p class="text-gray-600">Here's what's happening with your commissions</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Active Commissions</h3>
                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">3 In Progress</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">5</p>
                <p class="text-sm text-gray-600 mt-2">2 Pending Approval</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Total Spent</h3>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">This Month</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">$1,250</p>
                <p class="text-sm text-gray-600 mt-2">+$430 from last month</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Completed Projects</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">All Time</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">12</p>
                <p class="text-sm text-gray-600 mt-2">100% Satisfaction Rate</p>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Saved Artists</h3>
                    <span class="bg-pink-100 text-pink-800 text-xs px-2 py-1 rounded-full">8 New</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">24</p>
                <p class="text-sm text-gray-600 mt-2">From 15 categories</p>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Active Commissions -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Active Commissions</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <!-- Commission Item -->
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <img src="/api/placeholder/48/48" class="w-12 h-12 rounded-full" alt="Artist avatar">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Character Design</h3>
                                        <p class="text-sm text-gray-600">by Sarah Anderson</p>
                                    </div>
                                </div>
                                <span class="bg-yellow-100 text-yellow-800 text-sm px-3 py-1 rounded-full">In Progress</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <p class="text-sm text-gray-500">Due Date</p>
                                        <p class="text-sm font-medium text-gray-900">Mar 15, 2025</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Price</p>
                                        <p class="text-sm font-medium text-gray-900">$350</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Progress</p>
                                        <div class="w-32 h-2 bg-gray-200 rounded-full mt-2">
                                            <div class="w-2/3 h-2 bg-purple-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('commissions.show', 1) }}" class="text-purple-600 hover:text-purple-700 font-medium text-sm">View Details</a>
                            </div>
                        </div>

                        <!-- Another Commission Item -->
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <img src="/api/placeholder/48/48" class="w-12 h-12 rounded-full" alt="Artist avatar">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Logo Animation</h3>
                                        <p class="text-sm text-gray-600">by Mike Thompson</p>
                                    </div>
                                </div>
                                <span class="bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full">Review Needed</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <p class="text-sm text-gray-500">Due Date</p>
                                        <p class="text-sm font-medium text-gray-900">Mar 20, 2025</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Price</p>
                                        <p class="text-sm font-medium text-gray-900">$500</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Progress</p>
                                        <div class="w-32 h-2 bg-gray-200 rounded-full mt-2">
                                            <div class="w-full h-2 bg-purple-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <button class="text-purple-600 hover:text-purple-700 font-medium text-sm">View Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Activity & Messages -->
            <div class="space-y-8">
                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Recent Activity</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">Commission completed: "Digital Portrait"</p>
                                    <p class="text-xs text-gray-500">2 hours ago</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">New message from Sarah Anderson</p>
                                    <p class="text-xs text-gray-500">5 hours ago</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4v16m8-8H4" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">New commission request sent</p>
                                    <p class="text-xs text-gray-500">1 day ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Messages -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Recent Messages</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <img src="/api/placeholder/40/40" class="w-10 h-10 rounded-full" alt="Artist avatar">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Sarah Anderson</p>
                                    <p class="text-sm text-gray-600 truncate">Here's the latest update on your character design...</p>
                                    <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <img src="/api/placeholder/40/40" class="w-10 h-10 rounded-full" alt="Artist avatar">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Mike Thompson</p>
                                    <p class="text-sm text-gray-600 truncate">The logo animation is ready for your review...</p>
                                    <p class="text-xs text-gray-500 mt-1">5 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

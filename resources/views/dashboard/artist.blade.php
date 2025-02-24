@extends('layouts.app')

@section('content')
    <!-- Main Dashboard Content -->
    <div class="p-6 bg-gray-50">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Welcome back, {{ Auth::user()->display_name }}!</h1>
            <p class="text-gray-600">Here's what's happening with your commissions</p>
        </div>

        <!-- Time Period Filter -->
        <div class="mb-6 flex justify-end">
            <div class="relative inline-block">
                <select class="appearance-none bg-white border border-gray-300 rounded-lg py-2 px-4 pr-8 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent cursor-pointer">
                    <option value="7d">Last 7 days</option>
                    <option value="30d" selected>Last 30 days</option>
                    <option value="3m">Last 3 months</option>
                    <option value="6m">Last 6 months</option>
                    <option value="1y">Last year</option>
                    <option value="all">All time</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Active Commissions</h3>
                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded-full">3 In Progress</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">5</p>
                <p class="text-sm text-gray-600 mt-2">2 New Requests</p>
            </div>

            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Earnings</h3>
                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">This Month</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">$2,850</p>
                <p class="text-sm text-gray-600 mt-2">+$650 from last month</p>
            </div>

            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Completion Rate</h3>
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">30 Days</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">98%</p>
                <p class="text-sm text-gray-600 mt-2">25 of 26 on time</p>
            </div>

            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Client Rating</h3>
                    <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded-full">4.9/5.0</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">156</p>
                <p class="text-sm text-gray-600 mt-2">Total Reviews</p>
            </div>

            <!-- Additional Stats -->
            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Response Time</h3>
                    <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full">Avg. 2h</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">95%</p>
                <p class="text-sm text-gray-600 mt-2">Within 24h response</p>
            </div>

            <div class="bg-white p-4 sm:p-6 rounded-xl shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-gray-500 text-sm">Commission Slots</h3>
                    <span class="bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">2 Available</span>
                </div>
                <p class="text-2xl font-bold text-gray-900">5/7</p>
                <p class="text-sm text-gray-600 mt-2">Slots filled</p>
            </div>
        </div>

        <!-- Performance Metrics -->
        <div class="bg-white rounded-xl shadow-sm mb-8">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900">Commission Analytics</h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">1.2k</p>
                        <p class="text-sm text-gray-600">Profile Views</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">85</p>
                        <p class="text-sm text-gray-600">Favorited By</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">24</p>
                        <p class="text-sm text-gray-600">Commission Requests</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-900">4.8</p>
                        <p class="text-sm text-gray-600">Avg. Rating</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Current Commissions - Takes up 2 columns on large screens -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Current Commissions</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <!-- Commission Item -->
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <img src="/api/placeholder/48/48" class="w-12 h-12 rounded-full" alt="Client avatar">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Character Design</h3>
                                        <p class="text-sm text-gray-600">for John Smith</p>
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
                                        <p class="text-sm text-gray-500">Payment</p>
                                        <p class="text-sm font-medium text-gray-900">$350</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Progress</p>
                                        <div class="w-32 h-2 bg-gray-200 rounded-full mt-2">
                                            <div class="w-2/3 h-2 bg-purple-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <button class="text-purple-600 hover:text-purple-700 font-medium text-sm">Update Progress</button>
                            </div>
                        </div>

                        <!-- Another Commission Item -->
                        <div class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-4">
                                    <img src="/api/placeholder/48/48" class="w-12 h-12 rounded-full" alt="Client avatar">
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Custom Illustration</h3>
                                        <p class="text-sm text-gray-600">for Emma Davis</p>
                                    </div>
                                </div>
                                <span class="bg-orange-100 text-orange-800 text-sm px-3 py-1 rounded-full">Needs Review</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-6">
                                    <div>
                                        <p class="text-sm text-gray-500">Due Date</p>
                                        <p class="text-sm font-medium text-gray-900">Mar 20, 2025</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Payment</p>
                                        <p class="text-sm font-medium text-gray-900">$275</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Progress</p>
                                        <div class="w-32 h-2 bg-gray-200 rounded-full mt-2">
                                            <div class="w-full h-2 bg-purple-600 rounded-full"></div>
                                        </div>
                                    </div>
                                </div>
                                <button class="text-purple-600 hover:text-purple-700 font-medium text-sm">Review Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Takes up 1 column -->
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
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">Payment received for "Logo Design"</p>
                                    <p class="text-xs text-gray-500">2 hours ago</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">New commission request from Emma Davis</p>
                                    <p class="text-xs text-gray-500">5 hours ago</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-900">New 5-star review received</p>
                                    <p class="text-xs text-gray-500">1 day ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Messages Section -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Recent Messages</h2>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <img src="/api/placeholder/40/40" class="w-10 h-10 rounded-full" alt="Client avatar">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">Emma Davis</p>
                                    <p class="text-sm text-gray-600 truncate">Thanks for the update on the illustration...</p>
                                    <p class="text-xs text-gray-500 mt-1">30 minutes ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 hover:bg-gray-50">
                            <div class="flex items-center space-x-4">
                                <img src="/api/placeholder/40/40" class="w-10 h-10 rounded-full" alt="Client avatar">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-900">John Smith</p>
                                    <p class="text-sm text-gray-600 truncate">Could we schedule a call to discuss...</p>
                                    <p class="text-xs text-gray-500 mt-1">2 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <a href="#" class="text-purple-600 hover:text-purple-700 font-medium text-sm">View all messages</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

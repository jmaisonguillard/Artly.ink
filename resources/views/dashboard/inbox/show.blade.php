@extends('layouts.app')

@section('content')
    <div class="bg-gray-50" x-data="{ mobileMenuOpen: false, chatListOpen: true }">
        <div class="flex flex-col lg:flex-row">
            <!-- Message Groups (Far Left) -->
            <div class="lg:w-20 bg-white border-r border-gray-200 flex lg:flex-col justify-between lg:justify-start p-3 space-x-4 lg:space-x-0 lg:space-y-4">
                <!-- New Requests -->
                <div class="relative group">
                    <div class="w-12 h-12 bg-yellow-100 rounded-2xl group-hover:rounded-xl flex items-center justify-center transition-all duration-200 cursor-pointer">
                        <svg class="w-6 h-6 text-yellow-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </div>
                    <div class="absolute -left-2 top-1/2 -translate-y-1/2 w-1 h-8 bg-purple-500 rounded-r-full transition-all duration-200 opacity-0 group-hover:opacity-100"></div>
                </div>

                <!-- Active Commissions -->
                <div class="relative group">
                    <div class="w-12 h-12 bg-purple-100 rounded-2xl group-hover:rounded-xl flex items-center justify-center transition-all duration-200 cursor-pointer">
                        <svg class="w-6 h-6 text-purple-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div class="absolute -left-2 top-1/2 -translate-y-1/2 w-1 h-8 bg-purple-500 rounded-r-full"></div>
                </div>

                <!-- Completed -->
                <div class="relative group">
                    <div class="w-12 h-12 bg-green-100 rounded-2xl group-hover:rounded-xl flex items-center justify-center transition-all duration-200 cursor-pointer">
                        <svg class="w-6 h-6 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Chat List (Middle Column) -->
            <div class="w-full lg:w-64 bg-gray-50 border-r border-gray-200 lg:block"
                 :class="{ 'hidden': !chatListOpen && !$screen('lg') }">
                <!-- Group Header -->
                <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Active Commissions</h2>
                    <button class="lg:hidden text-gray-500 hover:text-gray-600" @click="chatListOpen = false">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Search Bar -->
                <div class="p-3">
                    <div class="relative">
                        <input type="text"
                               placeholder="Search messages..."
                               class="w-full px-3 py-1.5 bg-white border border-gray-200 text-gray-900 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Chat List -->
                <div class="overflow-y-auto h-[calc(100vh-20rem)]">
                    <!-- Example Chat Item 1 -->
                    <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer bg-white" @click="chatListOpen = false">
                        <div class="flex items-center space-x-3">
                            <img src="/api/placeholder/40/40" class="w-10 h-10 rounded-full" alt="Client avatar">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900 truncate">Book Cover Illustration</p>
                                    <p class="text-xs text-gray-500">1h</p>
                                </div>
                                <p class="text-sm text-gray-500 truncate">Michael Brown • Sketching phase</p>
                            </div>
                        </div>
                    </div>

                    <!-- Example Chat Item 2 -->
                    <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer" @click="chatListOpen = false">
                        <div class="flex items-center space-x-3">
                            <img src="/api/placeholder/40/40" class="w-10 h-10 rounded-full" alt="Client avatar">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900 truncate">Game Asset Pack</p>
                                    <p class="text-xs text-gray-500">3h</p>
                                </div>
                                <p class="text-sm text-gray-500 truncate">Emily Wilson • Coloring phase</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message View (Right Column) -->
            <div class="flex-1 bg-white flex flex-col">
                <!-- Chat Header -->
                <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <button class="lg:hidden text-gray-500 hover:text-gray-600 mr-2" @click="chatListOpen = true">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <img src="/api/placeholder/40/40" class="w-10 h-10 rounded-full" alt="Client avatar">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Book Cover Illustration</h2>
                            <p class="text-sm text-gray-500">Michael Brown • Sketching phase</p>
                        </div>
                    </div>
                    <button class="px-3 py-1.5 bg-purple-100 text-purple-700 text-sm rounded hover:bg-purple-200 transition-colors">
                        View Commission
                    </button>
                </div>

                <!-- Messages -->
                <div class="flex-1 overflow-y-auto p-4 space-y-4">
                    <!-- Client Message -->
                    <div class="flex items-start space-x-3">
                        <img src="/api/placeholder/32/32" class="w-8 h-8 rounded-full" alt="Avatar">
                        <div>
                            <div class="flex items-baseline space-x-2">
                                <p class="text-gray-900 font-medium">Michael Brown</p>
                                <span class="text-xs text-gray-500">Today at 10:30 AM</span>
                            </div>
                            <div class="mt-1 text-gray-700">
                                Thanks for the update! The initial sketches look great.
                            </div>
                        </div>
                    </div>

                    <!-- Artist Message -->
                    <div class="flex items-start space-x-3">
                        <img src="/api/placeholder/32/32" class="w-8 h-8 rounded-full" alt="Avatar">
                        <div>
                            <div class="flex items-baseline space-x-2">
                                <p class="text-purple-600 font-medium">You</p>
                                <span class="text-xs text-gray-500">Today at 10:35 AM</span>
                            </div>
                            <div class="mt-1 text-gray-700">
                                Glad you like them! I'll start refining the chosen concept.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message Input -->
                <div class="p-4 border-t border-gray-200">
                    <div class="bg-gray-50 rounded-lg p-2">
                        <textarea rows="1"
                                  class="w-full bg-transparent text-gray-900 placeholder-gray-500 border-0 focus:ring-0 resize-none"
                                  placeholder="Type a message..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

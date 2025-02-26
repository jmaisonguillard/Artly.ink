<div>
    <!-- Profile Header -->
    <div class="relative">
        <!-- Cover Photo -->
        <div class="h-64 bg-gradient-to-r from-purple-600 to-indigo-600 relative">
            <!-- Profile Actions -->
            <div class="absolute top-4 right-4 flex space-x-3">
                <button
                    class="bg-white bg-opacity-90 text-gray-700 hover:text-purple-600 rounded-lg p-2 flex items-center">
                    <i class="fas fa-share-alt w-4 h-4 mr-2"></i>
                    <span class="text-sm font-medium">Share</span>
                </button>
                <button
                    class="bg-white bg-opacity-90 text-gray-700 hover:text-purple-600 rounded-lg p-2 flex items-center">
                    <i class="fas fa-bookmark w-4 h-4 mr-2"></i>
                    <span class="text-sm font-medium">Save</span>
                </button>
            </div>
        </div>

        <!-- Profile Summary Container -->
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 relative -mt-16">
            <div class="bg-white rounded-xl shadow-md p-6 md:p-8">
                <div class="flex flex-col md:flex-row">
                    <!-- Profile Image and Basic Info -->
                    <div class="flex flex-col md:flex-row items-center md:items-start mb-6 md:mb-0">
                        <div
                            class="w-32 h-32 rounded-full shadow-lg overflow-hidden border-4 border-white -mt-20 mb-4 md:mb-0 md:mr-8 flex-shrink-0">
                            <img src="/api/placeholder/320/320" alt="Artist profile"
                                class="w-full h-full object-cover" />
                        </div>
                        <div class="text-center md:text-left">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <h1 class="text-2xl font-bold text-gray-900 mb-2 md:mb-0 md:mr-4">Sarah Mitchell</h1>
                                <div class="flex items-center justify-center md:justify-start">
                                    <div class="flex items-center text-yellow-500 mr-2">
                                        <i class="fas fa-star w-5 h-5 fill-current"></i>
                                        <span class="ml-1 font-semibold">4.9</span>
                                    </div>
                                    <span class="text-gray-500 text-sm">(126 reviews)</span>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-3">Digital Illustrator • Character Designer</p>
                            <div
                                class="flex flex-wrap items-center justify-center md:justify-start text-sm text-gray-600 mb-3 gap-3">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt w-4 h-4 mr-1"></i>
                                    <span>Los Angeles, CA</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                    <span>Member since 2022</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check-circle w-4 h-4 mr-1 text-green-500"></i>
                                    <span class="text-green-500">Verified Artist</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons and Availability -->
                    <div class="ml-0 md:ml-auto flex flex-col">
                        <div class="flex flex-col sm:flex-row gap-3 mb-4">
                            <button
                                class="flex-1 bg-purple-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-purple-500 transition-colors flex items-center justify-center">
                                <i class="fas fa-comment w-5 h-5 mr-2"></i>
                                Contact Artist
                            </button>
                            <button
                                class="flex-1 border border-purple-600 text-purple-600 px-6 py-3 rounded-lg font-medium hover:bg-purple-50 transition-colors flex items-center justify-center">
                                <i class="fas fa-bolt w-5 h-5 mr-2"></i>
                                Commission Now
                            </button>
                        </div>

                        <!-- Availability Status -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4 flex items-start">
                            <div class="bg-green-100 p-2 rounded-full mr-3 flex-shrink-0">
                                <i class="fas fa-calendar w-5 h-5 text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-green-700">Currently Available</h3>
                                <p class="text-sm text-green-600">Accepting new commissions with a 2-3 week turnaround
                                    time</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Side - Info & Services -->
            <div class="lg:col-span-1 space-y-6">
                <!-- About -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h2 class="text-lg font-semibold mb-4">About</h2>
                    <p class="text-gray-600 mb-4">
                        I'm a digital artist specializing in character design, illustrations, and concept art. With over
                        8 years of experience, I've worked with indie game developers, book publishers, and private
                        clients worldwide.
                    </p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Digital Art</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Character
                            Design</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Illustration</span>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm">Concept Art</span>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <h3 class="text-sm font-semibold text-gray-600 mb-3">Connect with me</h3>
                        <div class="flex gap-3">
                            <a href="#" class="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors">
                                <i class="fab fa-instagram w-5 h-5 text-gray-700"></i>
                            </a>
                            <a href="#" class="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors">
                                <i class="fab fa-twitter w-5 h-5 text-gray-700"></i>
                            </a>
                            <a href="#" class="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors">
                                <i class="fas fa-globe w-5 h-5 text-gray-700"></i>
                            </a>
                            <a href="#" class="bg-gray-100 hover:bg-gray-200 p-2 rounded-full transition-colors">
                                <i class="fas fa-envelope w-5 h-5 text-gray-700"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Commission Services -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Commission Services</h2>
                        <span class="text-sm text-purple-600 font-medium">4 services</span>
                    </div>

                    <!-- Service Cards -->
                    <div class="space-y-4">
                        <div
                            class="border border-gray-200 rounded-lg p-4 hover:border-purple-300 transition-colors cursor-pointer">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Character Illustration</h3>
                                <span class="text-purple-600 font-semibold">$120+</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Full-color digital illustration of your character with
                                simple background</p>
                            <div class="flex justify-between items-center text-sm">
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                    <span>7-10 days</span>
                                </div>
                                <button class="text-purple-600 hover:text-purple-700 font-medium flex items-center">
                                    <span>Details</span>
                                    <i class="fas fa-chevron-right w-4 h-4 ml-1"></i>
                                </button>
                            </div>
                        </div>

                        <div
                            class="border border-gray-200 rounded-lg p-4 hover:border-purple-300 transition-colors cursor-pointer">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Chibi / Icon</h3>
                                <span class="text-purple-600 font-semibold">$75+</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Cute stylized character or bust portrait, perfect for
                                profile pictures</p>
                            <div class="flex justify-between items-center text-sm">
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                    <span>3-5 days</span>
                                </div>
                                <button class="text-purple-600 hover:text-purple-700 font-medium flex items-center">
                                    <span>Details</span>
                                    <i class="fas fa-chevron-right w-4 h-4 ml-1"></i>
                                </button>
                            </div>
                        </div>

                        <div
                            class="border border-gray-200 rounded-lg p-4 hover:border-purple-300 transition-colors cursor-pointer">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="font-medium">Full Scene Illustration</h3>
                                <span class="text-purple-600 font-semibold">$250+</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-3">Complex illustration with detailed environment and
                                multiple characters</p>
                            <div class="flex justify-between items-center text-sm">
                                <div class="flex items-center text-gray-500">
                                    <i class="fas fa-clock w-4 h-4 mr-1"></i>
                                    <span>14-21 days</span>
                                </div>
                                <button class="text-purple-600 hover:text-purple-700 font-medium flex items-center">
                                    <span>Details</span>
                                    <i class="fas fa-chevron-right w-4 h-4 ml-1"></i>
                                </button>
                            </div>
                        </div>

                        <a href="#"
                            class="block text-center text-purple-600 hover:text-purple-700 font-medium py-2">
                            View all services
                        </a>
                    </div>
                </div>

                <!-- Reviews Summary -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Client Reviews</h2>
                        <div class="flex items-center">
                            <i class="fas fa-star w-5 h-5 text-yellow-400 fill-current"></i>
                            <span class="ml-1 font-semibold">4.9</span>
                            <span class="text-gray-500 text-sm ml-1">(126)</span>
                        </div>
                    </div>

                    <!-- Rating Bars -->
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600 w-16">5 stars</span>
                            <div class="flex-1 bg-gray-200 h-2 rounded-full mx-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 92%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8">92%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600 w-16">4 stars</span>
                            <div class="flex-1 bg-gray-200 h-2 rounded-full mx-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 6%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8">6%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600 w-16">3 stars</span>
                            <div class="flex-1 bg-gray-200 h-2 rounded-full mx-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 2%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8">2%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600 w-16">2 stars</span>
                            <div class="flex-1 bg-gray-200 h-2 rounded-full mx-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8">0%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm text-gray-600 w-16">1 star</span>
                            <div class="flex-1 bg-gray-200 h-2 rounded-full mx-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 0%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-8">0%</span>
                        </div>
                    </div>

                    <!-- Review Categories -->
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <div class="text-sm text-gray-500 mb-1">Communication</div>
                            <div class="flex items-center">
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <span class="ml-1 font-medium">5.0</span>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <div class="text-sm text-gray-500 mb-1">Quality</div>
                            <div class="flex items-center">
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <span class="ml-1 font-medium">4.9</span>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <div class="text-sm text-gray-500 mb-1">Value</div>
                            <div class="flex items-center">
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <span class="ml-1 font-medium">4.8</span>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <div class="text-sm text-gray-500 mb-1">Timeliness</div>
                            <div class="flex items-center">
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <span class="ml-1 font-medium">4.7</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Review -->
                    <div class="border-t border-gray-100 pt-4">
                        <h3 class="font-medium mb-3">Recent Review</h3>
                        <div class="mb-3">
                            <div class="flex items-center mb-2">
                                <div class="w-8 h-8 rounded-full bg-gray-200 mr-2 flex-shrink-0"></div>
                                <div>
                                    <div class="font-medium">Alex T.</div>
                                    <div class="text-xs text-gray-500">February 18, 2025</div>
                                </div>
                            </div>
                            <div class="flex mb-2">
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                                <i class="fas fa-star w-4 h-4 text-yellow-400 fill-current"></i>
                            </div>
                            <p class="text-sm text-gray-600">
                                Sarah is amazing to work with! She captured my character perfectly and was patient with
                                my revision requests. Highly recommend her work!
                            </p>
                        </div>
                        <a href="#"
                            class="block text-center text-purple-600 hover:text-purple-700 font-medium py-2">
                            Read all reviews
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Side - Portfolio & Updates -->
            <div class="lg:col-span-2">
                <!-- Tabs -->
                <div class="bg-white rounded-xl shadow-sm mb-6">
                    <div class="border-b border-gray-100">
                        <nav class="flex">
                            <a href="#"
                                class="px-6 py-4 text-sm font-medium transition-colors text-purple-600 border-b-2 border-purple-600">
                                Portfolio
                            </a>
                            <a href="#"
                                class="px-6 py-4 text-sm font-medium transition-colors text-gray-600 hover:text-gray-900">
                                Work Process
                            </a>
                            <a href="#"
                                class="px-6 py-4 text-sm font-medium transition-colors text-gray-600 hover:text-gray-900">
                                Social Updates
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Portfolio Tab Content -->
                <div class="space-y-6">
                    <!-- Portfolio Filters -->
                    <div class="bg-white rounded-xl shadow-sm p-4">
                        <div class="flex flex-wrap gap-2">
                            <button class="bg-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                                All Works
                            </button>
                            <button
                                class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-purple-300 transition-colors">
                                Character Design
                            </button>
                            <button
                                class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-purple-300 transition-colors">
                                Illustrations
                            </button>
                            <button
                                class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-purple-300 transition-colors">
                                Concept Art
                            </button>
                            <button
                                class="bg-white border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:border-purple-300 transition-colors flex items-center">
                                <i class="fas fa-filter w-4 h-4 mr-1"></i>
                                More Filters
                            </button>
                        </div>
                    </div>

                    <!-- Portfolio Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Portfolio Item 1 -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden group cursor-pointer">
                            <div class="relative aspect-square bg-gray-100">
                                <img src="/api/placeholder/320/320" alt="Portfolio item 1"
                                    class="w-full h-full object-cover" />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="bg-white rounded-full p-2">
                                        <i class="fas fa-external-link-alt w-5 h-5 text-gray-700"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-medium text-sm truncate">Project Title 1</h3>
                                <div class="flex justify-between items-center text-xs text-gray-500">
                                    <span>Character Design</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-heart w-4 h-4 mr-1"></i>
                                        <span>42</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Item 2 -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden group cursor-pointer">
                            <div class="relative aspect-square bg-gray-100">
                                <img src="/api/placeholder/320/320" alt="Portfolio item 2"
                                    class="w-full h-full object-cover" />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="bg-white rounded-full p-2">
                                        <i class="fas fa-external-link-alt w-5 h-5 text-gray-700"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-medium text-sm truncate">Project Title 2</h3>
                                <div class="flex justify-between items-center text-xs text-gray-500">
                                    <span>Illustration</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-heart w-4 h-4 mr-1"></i>
                                        <span>37</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Item 3 -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden group cursor-pointer">
                            <div class="relative aspect-square bg-gray-100">
                                <img src="/api/placeholder/320/320" alt="Portfolio item 3"
                                    class="w-full h-full object-cover" />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="bg-white rounded-full p-2">
                                        <i class="fas fa-external-link-alt w-5 h-5 text-gray-700"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-medium text-sm truncate">Project Title 3</h3>
                                <div class="flex justify-between items-center text-xs text-gray-500">
                                    <span>Concept Art</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-heart w-4 h-4 mr-1"></i>
                                        <span>25</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Item 4 -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden group cursor-pointer">
                            <div class="relative aspect-square bg-gray-100">
                                <img src="/api/placeholder/320/320" alt="Portfolio item 4"
                                    class="w-full h-full object-cover" />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="bg-white rounded-full p-2">
                                        <i class="fas fa-external-link-alt w-5 h-5 text-gray-700"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-medium text-sm truncate">Project Title 4</h3>
                                <div class="flex justify-between items-center text-xs text-gray-500">
                                    <span>Character Design</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-heart w-4 h-4 mr-1"></i>
                                        <span>19</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Item 5 -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden group cursor-pointer">
                            <div class="relative aspect-square bg-gray-100">
                                <img src="/api/placeholder/320/320" alt="Portfolio item 5"
                                    class="w-full h-full object-cover" />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="bg-white rounded-full p-2">
                                        <i class="fas fa-external-link-alt w-5 h-5 text-gray-700"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-medium text-sm truncate">Project Title 5</h3>
                                <div class="flex justify-between items-center text-xs text-gray-500">
                                    <span>Illustration</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-heart w-4 h-4 mr-1"></i>
                                        <span>31</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Portfolio Item 6 -->
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden group cursor-pointer">
                            <div class="relative aspect-square bg-gray-100">
                                <img src="/api/placeholder/320/320" alt="Portfolio item 6"
                                    class="w-full h-full object-cover" />
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all flex items-center justify-center opacity-0 group-hover:opacity-100">
                                    <button class="bg-white rounded-full p-2">
                                        <i class="fas fa-external-link-alt w-5 h-5 text-gray-700"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="p-3">
                                <h3 class="font-medium text-sm truncate">Project Title 6</h3>
                                <div class="flex justify-between items-center text-xs text-gray-500">
                                    <span>Concept Art</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-heart w-4 h-4 mr-1"></i>
                                        <span>28</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center">
                        <button
                            class="border border-purple-600 text-purple-600 px-6 py-3 rounded-lg font-medium hover:bg-purple-50 transition-colors">
                            Load More Works
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

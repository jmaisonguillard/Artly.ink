@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-purple-600 to-indigo-700">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h1 class="text-4xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                        Where Art Meets Opportunity
                    </h1>
                    <p class="text-xl text-purple-100 mb-8 max-w-2xl">
                        Connect with talented artists or showcase your work to clients worldwide. 
                        Commission custom artwork or start earning from your creativity.
                    </p>
                    <div class="flex flex-row gap-4">
                        <a href="#" class="bg-white text-purple-700 px-8 py-4 rounded-lg font-semibold hover:bg-purple-50 transition-colors flex items-center">
                            Find an Artist
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="{{ route('register') }}" class="bg-purple-500 text-white px-8 py-4 rounded-lg font-semibold hover:bg-purple-400 transition-colors">
                            Join as Artist
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-4">
                            <div class="h-64 bg-purple-400 rounded-lg transform translate-y-8"></div>
                            <div class="h-48 bg-purple-300 rounded-lg"></div>
                        </div>
                        <div class="space-y-4">
                            <div class="h-48 bg-purple-300 rounded-lg"></div>
                            <div class="h-64 bg-purple-400 rounded-lg transform -translate-y-8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <div class="flex items-start p-6 hover:bg-purple-50 rounded-xl transition-colors">
                <div class="bg-purple-100 p-4 rounded-full w-16 h-16 flex items-center justify-center mr-6">
                    <i class="fas fa-search fa-xl w-8 h-8 text-purple-600 flex items-center justify-center mt-7 ml-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-2">Easy Discovery</h3>
                    <p class="text-gray-600">Find the perfect artist for your project with advanced search and filtering options for style, medium, and budget.</p>
                </div>
            </div>
            <div class="flex items-start p-6 hover:bg-purple-50 rounded-xl transition-colors">
                <div class="bg-purple-100 p-4 rounded-full w-16 h-16 flex items-center justify-center mr-6">
                    <i class="fas fa-palette fa-xl w-8 h-8 text-purple-600 flex items-center justify-center mt-7 ml-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-2">Diverse Styles</h3>
                    <p class="text-gray-600">Browse artists specializing in digital art, traditional media, animations, and various artistic styles.</p>
                </div>
            </div>
            <div class="flex items-start p-6 hover:bg-purple-50 rounded-xl transition-colors">
                <div class="bg-purple-100 p-4 rounded-full w-16 h-16 flex items-center justify-center mr-6">
                    <i class="fas fa-users fa-xl w-8 h-8 text-purple-600 flex items-center justify-center mt-7 ml-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-2">Secure Platform</h3>
                    <p class="text-gray-600">Enjoy protected payments, verified artists, and comprehensive dispute resolution support.</p>
                </div>
            </div>
            <div class="flex items-start p-6 hover:bg-purple-50 rounded-xl transition-colors">
                <div class="bg-purple-100 p-4 rounded-full w-16 h-16 flex items-center justify-center mr-6">
                    <i class="fas fa-star fa-xl w-8 h-8 text-purple-600 flex items-center justify-center mt-7 ml-1"></i>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-2">Quality Work</h3>
                    <p class="text-gray-600">Access vetted artists and a transparent review system ensuring high-quality results.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Artists Preview -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Featured Artists</h2>
                    <p class="text-gray-600">Discover top creators from around the world</p>
                </div>
                <a href="#" class="text-purple-600 hover:text-purple-700 font-semibold flex items-center">
                    View All Artists
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <div class="grid lg:grid-cols-4 gap-8">
                @foreach(range(1, 4) as $item)
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-2">Artist Name</h3>
                        <p class="text-gray-600 mb-4">Digital Illustration • Character Design</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="ml-2 text-gray-600">4.9</span>
                            </div>
                            <span class="text-gray-500 text-sm">From $150</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <h2 class="text-3xl font-bold text-center mb-16">How It Works</h2>
        <div class="grid lg:grid-cols-3 gap-16 relative px-10">
            <div class="relative">
                <div class="text-6xl font-bold text-purple-100 absolute -top-8 -left-8">1</div>
                <h3 class="text-2xl font-semibold mb-4">Browse & Connect</h3>
                <p class="text-gray-600 text-lg">Find your perfect artist match by exploring portfolios, reading reviews, and discussing your project details directly.</p>
            </div>
            <div class="relative">
                <div class="text-6xl font-bold text-purple-100 absolute -top-8 -left-8">2</div>
                <h3 class="text-2xl font-semibold mb-4">Commission & Track</h3>
                <p class="text-gray-600 text-lg">Place your commission with confidence using our secure payment system and track progress through clear milestones.</p>
            </div>
            <div class="relative">
                <div class="text-6xl font-bold text-purple-100 absolute -top-8 -left-8">3</div>
                <h3 class="text-2xl font-semibold mb-4">Review & Share</h3>
                <p class="text-gray-600 text-lg">Receive your finished artwork, provide feedback, and share your experience to help other clients find great artists.</p>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-gradient-to-r from-purple-600 to-indigo-700 py-20">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl lg:text-6xl font-bold text-white mb-2">10K+</div>
                    <p class="text-xl text-purple-100">Artists Registered</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl lg:text-6xl font-bold text-white mb-2">50K+</div>
                    <p class="text-xl text-purple-100">Completed Commissions</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl lg:text-6xl font-bold text-white mb-2">98%</div>
                    <p class="text-xl text-purple-100">Satisfaction Rate</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl lg:text-6xl font-bold text-white mb-2">$2M+</div>
                    <p class="text-xl text-purple-100">Paid to Artists</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

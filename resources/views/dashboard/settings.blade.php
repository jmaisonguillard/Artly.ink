@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Account Settings</h1>
            <p class="text-gray-600">Manage your account preferences and profile settings</p>
        </div>

        <!-- Settings Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Settings Column -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Profile Settings -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Profile Information</h2>
                    </div>
                    <div class="p-6">
                        <form class="space-y-6">
                            <div class="flex items-center space-x-6">
                                <div class="flex-shrink-0">
                                    <img src="{{ Auth::user()->avatar ?? '/api/placeholder/96/96' }}" class="h-24 w-24 rounded-full" alt="Profile photo">
                                </div>
                                <div>
                                    <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                        Change Photo
                                    </button>
                                    <p class="mt-1 text-xs text-gray-500">JPG, GIF or PNG. 1MB max.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Display Name</label>
                                    <input placeholder="John Doe" value="{{ Auth::user()->display_name }}" name="display_name" type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Email</label>
                                    <input placeholder="john.doe@example.com" value="{{ Auth::user()->email }}" name="email" type="email" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                </div>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Bio</label>
                                <textarea rows="3" placeholder="I'm a digital artist specializing in portraits and illustrations." name="bio" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">{{ Auth::user()->bio }}</textarea>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Artist Settings (shown only for artists) -->
                @if(Auth::user()->is_artist)
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Commission Settings</h2>
                    </div>
                    <div class="p-6">
                        <form class="space-y-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Commission Status</label>
                                <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                    <option>Open for Commissions</option>
                                    <option>Closed (Busy)</option>
                                    <option>Closed (On Break)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Maximum Active Commissions</label>
                                <input placeholder="4" type="number" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block w-40">
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">Default Response Time</label>
                                <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                    <option>Within 24 hours</option>
                                    <option>Within 48 hours</option>
                                    <option>Within 1 week</option>
                                </select>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                <!-- Notification Settings -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Notification Preferences</h2>
                    </div>
                    <div class="p-6">
                        <form class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Email Notifications</h3>
                                    <p class="text-sm text-gray-500">Receive email updates about your account</p>
                                </div>
                                <button type="button" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2" role="switch" aria-checked="true">
                                    <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                </button>
                            </div>

                            @if(Auth::user()->is_artist)
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Commission Requests</h3>
                                    <p class="text-sm text-gray-500">Get notified about new commission requests</p>
                                </div>
                                <button type="button" class="bg-purple-600 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2" role="switch" aria-checked="true">
                                    <span class="translate-x-5 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                                </button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-8">
                <!-- Account Security -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Security</h2>
                    </div>
                    <div class="p-6 space-y-6">
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Password</h3>
                            <button class="mt-2 text-sm text-purple-600 hover:text-purple-700">Change password</button>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Two-Factor Authentication</h3>
                            <button class="mt-2 text-sm text-purple-600 hover:text-purple-700">Enable 2FA</button>
                        </div>
                    </div>
                </div>

                <!-- Connected Accounts -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Connected Accounts</h2>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <svg class="w-6 h-6 text-gray-700" fill="currentColor" role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm5.82 7.821c.393.391.394 1.024.004 1.414l-4.416 4.416 4.416 4.416c.39.39.39 1.024 0 1.414-.391.39-1.024.39-1.414 0L12 15.065l-4.416 4.416c-.39.39-1.024.39-1.414 0-.39-.39-.39-1.024 0-1.414l4.416-4.416-4.416-4.416c-.39-.39-.39-1.023 0-1.414.39-.39 1.023-.39 1.414 0L12 12.177l4.416-4.416c.39-.39 1.023-.39 1.414 0z"/></svg>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">PayPal</p>
                                    <p class="text-xs text-gray-500">Connect your PayPal account</p>
                                </div>
                            </div>
                            <button class="text-sm text-purple-600 hover:text-purple-700">Connect</button>
                        </div>
                    </div>
                </div>

                <!-- Danger Zone -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-red-600">Danger Zone</h2>
                    </div>
                    <div class="p-6">
                        <button class="w-full px-4 py-2 border border-red-300 text-red-700 rounded-md hover:bg-red-50">
                            Delete Account
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="p-6 bg-gray-50 min-h-screen">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Account Settings</h1>
        <p class="text-gray-600">Manage your account preferences and profile settings</p>
    </div>


    <!-- Success notification for profile updates -->
    <div x-data="{ show: false }" x-on:profile-updated.window="show = true; setTimeout(() => show = false, 3000)"
        x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-green-50 text-green-800 px-4 py-3 rounded-lg shadow-lg flex items-center space-x-2 z-50"
        style="display: none;">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
        </svg>
        <p>Profile updated successfully!</p>
    </div>

    <div x-data="{ show: false }" x-on:artist-settings-updated.window="show = true; setTimeout(() => show = false, 3000)"
        x-show="show" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-green-50 text-green-800 px-4 py-3 rounded-lg shadow-lg flex items-center space-x-2 z-50"
        style="display: none;">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
        </svg>
        <p>Artist settings updated successfully!</p>
    </div>

    <div x-data="{ show: false }"
        x-on:notification-settings-updated.window="show = true; setTimeout(() => show = false, 3000)" x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed bottom-4 left-1/2 transform -translate-x-1/2 bg-green-50 text-green-800 px-4 py-3 rounded-lg shadow-lg flex items-center space-x-2 z-50"
        style="display: none;">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
        </svg>
        <p>Notification preferences updated successfully!</p>
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
                    <form wire:submit="updateProfile" class="space-y-6">
                        <div class="flex items-center space-x-6">
                            <div class="flex-shrink-0">
                                <img wire:model="avatar"
                                    src="{{ Auth::user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->first_name . ' ' . Auth::user()->last_name) . '&color=7F9CF5&background=EBF4FF' }}"
                                    class="h-24 w-24 rounded-full" alt="Profile photo">
                            </div>
                            <div>
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                    Change Photo
                                </button>
                                <p class="mt-1 text-xs text-gray-500">JPG, GIF or PNG. 1MB max.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Display Name</label>
                                <input wire:model="display_name" type="text"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Email</label>
                                <input wire:model="email" placeholder="john.doe@example.com" type="email"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                            </div>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Bio</label>
                            <textarea wire:model="bio" rows="3"
                                placeholder="I'm a digital artist specializing in portraits and illustrations." name="bio"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">{{ Auth::user()->bio }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Artist Settings (shown only for artists) -->
            @if (Auth::user()->is_artist)
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Artist Settings</h2>
                    </div>
                    <div class="p-6">
                        <form class="space-y-6">
                            <!-- Username & Professional Title -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Username</label>
                                    <div class="mt-1 flex rounded-lg shadow-sm">
                                        <span
                                            class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-200 bg-gray-50 text-gray-500 text-sm">
                                            @
                                        </span>
                                        <input wire:model="username" type="text" placeholder="artbyalex"
                                            class="flex-1 px-4 py-2 border border-gray-200 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    </div>
                                    @error('username')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500">This is your unique username on the platform
                                    </p>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Professional Title</label>
                                    <input wire:model="professional_title" type="text"
                                        placeholder="Digital Illustrator"
                                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                    @error('professional_title')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                    <p class="mt-1 text-xs text-gray-500">Example: Digital Artist, Character Designer
                                    </p>
                                </div>
                            </div>

                            <!-- Specialization -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Specialization</label>
                                <input wire:model="specialization" type="text" placeholder="Character Design"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                @error('specialization')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Your primary area of expertise</p>
                            </div>

                            <!-- Commission Status & Availability -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Commission Status</label>
                                    <select wire:model="commission_status"
                                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                        <option>Open for Commissions</option>
                                        <option>Closed (Busy)</option>
                                        <option>Closed (On Break)</option>
                                        <option>By Request Only</option>
                                    </select>
                                    @error('commission_status')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Turnaround Time</label>
                                    <select wire:model="turnaround_time"
                                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                        <option value="" selected>Select turnaround time</option>
                                        <option value="1-week">Within 1 week</option>
                                        <option value="2-3-weeks">2-3 weeks</option>
                                        <option value="3-4-weeks">3-4 weeks</option>
                                        <option value="4-plus-weeks">4+ weeks</option>
                                    </select>
                                    @error('turnaround_time')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Commission Limits -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Maximum Active
                                        Commissions</label>
                                    <input wire:model="max_active_commissions" type="number" placeholder="4"
                                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                    @error('max_active_commissions')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">Default Response
                                        Time</label>
                                    <select wire:model="default_response_time"
                                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block">
                                        <option value="" selected>Select response time</option>
                                        <option value="24-hours">Within 24 hours</option>
                                        <option value="48-hours">Within 48 hours</option>
                                        <option value="1-week">Within 1 week</option>
                                    </select>
                                    @error('default_response_time')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Skills/Tags -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700">Skills & Specialties</label>
                                <input wire:model="skills" type="text"
                                    placeholder="Digital Art, Character Design, Illustration, Concept Art"
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent mt-1 block"
                                    value="{{ is_array($skills) ? implode(',', $skills) : '' }}">
                                @error('skills')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Separate tags with commas</p>
                            </div>

                            <!-- Social Links -->
                            <div class="space-y-4">
                                <label class="block font-medium text-sm text-gray-700">Social Media Links</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="bg-gray-100 p-2 rounded-lg">
                                            <i class="fab fa-instagram w-5 h-5 text-gray-700"></i>
                                        </div>
                                        <input wire:model="instagram_username" type="text"
                                            placeholder="Instagram username"
                                            class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    </div>
                                    @error('instagram_username')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <div class="flex items-center space-x-2">
                                        <div class="bg-gray-100 p-2 rounded-lg">
                                            <i class="fab fa-twitter w-5 h-5 text-gray-700"></i>
                                        </div>
                                        <input wire:model="twitter_username" type="text"
                                            placeholder="Twitter username"
                                            class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    </div>
                                    @error('twitter_username')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <div class="flex items-center space-x-2">
                                        <div class="bg-gray-100 p-2 rounded-lg">
                                            <i class="fas fa-globe w-5 h-5 text-gray-700"></i>
                                        </div>
                                        <input wire:model="portfolio_url" type="text" placeholder="Website URL"
                                            class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    </div>
                                    @error('portfolio_url')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <div class="flex items-center space-x-2">
                                        <div class="bg-gray-100 p-2 rounded-lg">
                                            <i class="fab fa-artstation w-5 h-5 text-gray-700"></i>
                                        </div>
                                        <input wire:model="artstation_username" type="text"
                                            placeholder="ArtStation profile"
                                            class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                    </div>
                                    @error('artstation_username')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-6">
                                <button wire:click.prevent="updateArtistSettings"
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
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
                            <button type="button" wire:click="toggleEmailNotifications"
                                class="{{ $email_notifications ? 'bg-purple-600' : 'bg-gray-200' }} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                                role="switch" aria-checked="{{ $email_notifications ? 'true' : 'false' }}">
                                <span
                                    class="{{ $email_notifications ? 'translate-x-5' : 'translate-x-0' }} pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                            </button>
                        </div>

                        @if (Auth::user()->is_artist)
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Commission Requests</h3>
                                    <p class="text-sm text-gray-500">Get notified about new commission requests</p>
                                </div>
                                <button type="button" wire:click="toggleCommissionNotifications"
                                    class="{{ $commission_notifications ? 'bg-purple-600' : 'bg-gray-200' }} relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"
                                    role="switch" aria-checked="{{ $commission_notifications ? 'true' : 'false' }}">
                                    <span
                                        class="{{ $commission_notifications ? 'translate-x-5' : 'translate-x-0' }} pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
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
                        <h3 class="text-sm font-medium text-gray-900">Change Password</h3>
                        <form wire:submit="updatePassword" class="mt-4 space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Current Password</label>
                                <input wire:model="current_password" type="password"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">New Password</label>
                                <input wire:model="new_password" type="password"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                                <input wire:model="new_password_confirmation" type="password"
                                    class="mt-1 w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500">
                            </div>

                            <button wire:click="updatePassword"
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Update Password
                            </button>
                        </form>
                    </div>
                    {{-- <div>
                        <h3 class="text-sm font-medium text-gray-900">Two-Factor Authentication</h3>
                        <button class="mt-2 text-sm text-purple-600 hover:text-purple-700">Enable 2FA</button>
                    </div> --}}
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
                            <svg class="w-6 h-6 text-gray-700" fill="currentColor" role="img"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm5.82 7.821c.393.391.394 1.024.004 1.414l-4.416 4.416 4.416 4.416c.39.39.39 1.024 0 1.414-.391.39-1.024.39-1.414 0L12 15.065l-4.416 4.416c-.39.39-1.024.39-1.414 0-.39-.39-.39-1.024 0-1.414l4.416-4.416-4.416-4.416c-.39-.39-.39-1.023 0-1.414.39-.39 1.023-.39 1.414 0L12 12.177l4.416-4.416c.39-.39 1.023-.39 1.414 0z" />
                            </svg>
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

    <input wire:model="avatar" type="file" class="hidden" id="avatar">
</div>

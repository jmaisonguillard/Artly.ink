@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    {{ isset($service) ? __('Edit Commission Service') : __('Create Commission Service') }}
                </h1>
                <p class="text-gray-600">
                    {{ isset($service) ? 'Update your existing commission service' : 'Add a new commission service to your offerings' }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <!-- Form -->
            <div class="col-span-2">
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Service Details</h2>
                    </div>

                    <div class="p-6">
                        <form method="POST"
                            action="{{ isset($service) ? route('services.update', $service) : route('services.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            @if(isset($service))
                                @method('PUT')
                            @endif

                            <div class="grid grid-cols-1 gap-6">
                                <!-- Basic Information -->
                                <div class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700">Service Name</label>
                                        <input type="text" name="name" id="name"
                                            value="{{ old('name', $service->name ?? '') }}"
                                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                            required>
                                        @error('name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                            placeholder="Describe your service, including what clients can expect...">{{ old('description', $service->description ?? '') }}</textarea>
                                        @error('description')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Pricing Section -->
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="flex-1">
                                            <label for="base_price" class="block text-sm font-medium text-gray-700">Base Price</label>
                                            <div class="mt-1 flex">
                                                <select name="currency" id="currency"
                                                    class="rounded-l-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                                    @foreach(['USD', 'EUR', 'GBP', 'CAD', 'AUD', 'JPY'] as $currencyOption)
                                                        <option value="{{ $currencyOption }}"
                                                            {{ (old('currency', $service->currency ?? '') == $currencyOption) ? 'selected' : '' }}>
                                                            {{ $currencyOption }} {{ in_array($currencyOption, ['USD', 'CAD', 'AUD']) ? '$' :
                                                                ($currencyOption === 'EUR' ? '€' :
                                                                ($currencyOption === 'GBP' ? '£' :
                                                                ($currencyOption === 'JPY' ? '¥' : ''))) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <input type="number"
                                                    name="base_price"
                                                    id="base_price"
                                                    value="{{ old('base_price', $service->base_price ?? '') }}"
                                                    class="w-full px-4 py-2 rounded-r-lg border border-gray-200 border-l-0 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                                    step="0.01"
                                                    required>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="turnaround_time" class="block text-sm font-medium text-gray-700">Estimated Turnaround (Days)</label>
                                            <input type="number"
                                                name="turnaround_time"
                                                id="turnaround_time"
                                                value="{{ old('turnaround_time', $service->turnaround_time ?? '') }}"
                                                class="mt-1 w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div>
                                        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                                        <input type="text" name="tags" id="tags"
                                            value="{{ old('tags', isset($service) ? implode(', ', $service->tags) : '') }}"
                                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                            placeholder="character-design, illustration, concept-art">
                                    </div>

                                    <!-- Categories -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Categories</label>
                                        <div class="mt-2 grid grid-cols-2 gap-4">
                                            @foreach(['illustration', 'character_design', 'reference_sheet', 'concept_art', 'animation', 'emotes', 'pixel_art', 'chibi', 'vtuber', 'other'] as $category)
                                                <div class="flex items-center">
                                                    <input type="checkbox"
                                                        name="categories[]"
                                                        value="{{ $category }}"
                                                        class="h-4 w-4 text-purple-600"
                                                        {{ in_array($category, old('categories', $service->categories ?? [])) ? 'checked' : '' }}>
                                                    <label class="ml-2 text-sm text-gray-700">{{ ucfirst(str_replace('_', ' ', $category)) }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Example Images -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Example Images</label>
                                        <div class="mt-2 grid grid-cols-3 gap-4" id="existing-images">
                                            @if(isset($service) && $service->example_images)
                                                @foreach($service->example_images as $example)
                                                    <div class="relative">
                                                        <img src="{{ Storage::url($example) }}" class="rounded-lg object-cover w-full h-48">
                                                        <input type="hidden" name="existing_examples[]" value="{{ $example }}">
                                                        <button type="button" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1"
                                                            onclick="removeImage(this)">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="mt-2 grid grid-cols-3 gap-4" id="image-preview"></div>
                                        <div class="mt-2">
                                            <input type="file" name="examples[]" id="example-images" multiple
                                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                                accept="image/*"
                                                onchange="handleFileSelect(this)">
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Upload up to 5 example images of your work</p>
                                    </div>

                                    <script>
                                        let selectedFiles = new DataTransfer();

                                        function handleFileSelect(input) {
                                            const preview = document.getElementById('image-preview');
                                            preview.innerHTML = '';
                                            selectedFiles = new DataTransfer();

                                            if (input.files) {
                                                Array.from(input.files).forEach((file, index) => {
                                                    selectedFiles.items.add(file);
                                                    const reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        const div = document.createElement('div');
                                                        div.className = 'relative';
                                                        div.setAttribute('data-index', index);
                                                        div.innerHTML = `
                                                            <img src="${e.target.result}" class="rounded-lg object-cover w-full h-48">
                                                            <button type="button" class="absolute top-2 right-2 bg-red-500 text-white rounded-full p-1"
                                                                onclick="removeNewImage(this, ${index})">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </button>
                                                        `;
                                                        preview.appendChild(div);
                                                    }

                                                    reader.readAsDataURL(file);
                                                });

                                                input.files = selectedFiles.files;
                                            }
                                        }

                                        function removeNewImage(button, index) {
                                            const div = button.closest('div');
                                            div.remove();

                                            // Create new DataTransfer without the removed file
                                            const newSelectedFiles = new DataTransfer();
                                            Array.from(selectedFiles.files)
                                                .filter((_, i) => i !== index)
                                                .forEach(file => newSelectedFiles.items.add(file));

                                            selectedFiles = newSelectedFiles;
                                            document.getElementById('example-images').files = selectedFiles.files;

                                            // Reset if no files remain
                                            if (selectedFiles.files.length === 0) {
                                                document.getElementById('example-images').value = '';
                                            }
                                        }

                                        function removeImage(button) {
                                            button.closest('div').remove();
                                        }
                                    </script>

                                    <!-- Additional Options -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Additional Options</label>
                                        <div class="space-y-3">
                                            @foreach(['revisions' => 'Includes 2 Revisions', 'commercial_use' => 'Commercial Use Rights', 'source_files' => 'Source Files Included'] as $option => $label)
                                                <div class="flex items-center">
                                                    <input type="checkbox"
                                                        name="options[]"
                                                        value="{{ $option }}"
                                                        class="h-4 w-4 text-purple-600"
                                                        {{ in_array($option, old('options', $service->options ?? [])) ? 'checked' : '' }}>
                                                    <label class="ml-2 text-sm text-gray-700">{{ $label }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label for="is_active" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="is_active" id="is_active"
                                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                            <option value="1" {{ old('is_active', $service->is_active ?? '1') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('is_active', $service->is_active ?? '1') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-end space-x-3">
                                    <a href="{{ route('services.index') }}"
                                        class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        {{ isset($service) ? 'Update Service' : 'Create Service' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Side Panel -->
            <div class="col-span-1 space-y-6">
                <!-- Tips Card -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Tips for Success</h3>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Be specific about what's included in your base price</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Add example images to showcase your style</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Use relevant tags to help clients find your service</span>
                        </li>
                    </ul>
                </div>

                <!-- Preview Card -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Service Preview</h3>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-600">
                            This is how your service will appear in search results and listings.
                            Make sure your description is clear and engaging.
                        </p>
                    </div>
                </div>

                <!-- Requirements Card -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Requirements</h3>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            At least one example image
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Clear pricing structure
                        </li>
                        <li class="flex items-center">
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Estimated completion time
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

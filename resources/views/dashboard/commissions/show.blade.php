@extends('layouts.app')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $commission->title }}</h1>
                <p class="text-gray-600">Commission details and progress tracking</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('boards.index') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition">
                    Back to Board
                </a>
            </div>
        </div>

        <!-- Main Grid Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content - Takes up 2 columns -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Commission Details Card -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Commission Details</h2>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Client</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $commission->client->display_name }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Due Date</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $commission->due_date->format('M d, Y') }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Priority</label>
                                <p class="mt-1 text-sm text-gray-900">{{ ucfirst($commission->priority) }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <p class="mt-1 text-sm text-gray-900">{{ ucwords(str_replace('_', ' ', $commission->status)) }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Price</label>
                                <p class="mt-1 text-sm text-gray-900">{{ $commission->currency }} {{ number_format($commission->price, 2) }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Progress</label>
                                <div class="w-32 h-2 bg-gray-200 rounded-full mt-2">
                                    @php
                                        $progress = match($commission->status) {
                                            'pending' => '0',
                                            'sketching' => '25',
                                            'inking' => '50',
                                            'coloring' => '75',
                                            'final_review' => '90',
                                            'completed' => '100',
                                            default => '0'
                                        };
                                    @endphp
                                    <div class="h-2 bg-purple-600 rounded-full" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $commission->description ?? 'No description provided' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Progress Updates -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-semibold text-gray-900">Progress Updates</h2>
                            <button type="button"
                                    onclick="document.getElementById('update-form').classList.toggle('hidden')"
                                    class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:ring ring-purple-300 disabled:opacity-25 transition">
                                Add Update
                            </button>
                        </div>
                    </div>

                    <!-- Progress Update Form -->
                    <div id="update-form" class="hidden p-6 border-b border-gray-200 bg-gray-50">
                        <form action="{{ route('commissions.add-progress', $commission) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="status" class="block text-sm font-medium text-gray-700">Update Status</label>
                                    <select id="status" name="status"
                                            class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                                        <option value="">Select a status...</option>
                                        <option value="sketching" {{ $commission->status === 'sketching' ? 'selected' : '' }}>Sketching</option>
                                        <option value="inking" {{ $commission->status === 'inking' ? 'selected' : '' }}>Inking</option>
                                        <option value="coloring" {{ $commission->status === 'coloring' ? 'selected' : '' }}>Coloring</option>
                                        <option value="final_review" {{ $commission->status === 'final_review' ? 'selected' : '' }}>Final Review</option>
                                        <option value="completed" {{ $commission->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="update-message" class="block text-sm font-medium text-gray-700">Update Message</label>
                                    <textarea id="update-message"
                                             name="message"
                                             rows="3"
                                             class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                                             placeholder="Describe your progress or ask for feedback..."></textarea>
                                </div>

                                <div>
                                    <label for="images" class="block text-sm font-medium text-gray-700">Attach Images</label>
                                    <input type="file"
                                           id="images"
                                           name="images[]"
                                           multiple
                                           accept="image/*"
                                           class="mt-1 block w-full px-4 py-2 text-sm text-gray-500 border border-gray-300 rounded-md
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-md file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-purple-50 file:text-purple-700
                                                  hover:file:bg-purple-100">
                                    <p class="mt-1 text-xs text-gray-500">You can select multiple images</p>
                                </div>

                                <div class="flex justify-end space-x-3">
                                    <button type="button"
                                            onclick="document.getElementById('update-form').classList.add('hidden')"
                                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:opacity-25 transition">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:ring ring-purple-300 disabled:opacity-25 transition">
                                        Post Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Progress Updates List -->
                    <div class="divide-y divide-gray-200">
                        @if($commission->progress_updates)
                            @foreach($commission->progress_updates as $update)
                                <div class="p-4 hover:bg-gray-50">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm font-medium text-gray-900">
                                                    Status updated to: {{ ucwords(str_replace('_', ' ', $update['status'])) }}
                                                </span>
                                                <span class="text-xs text-gray-500">
                                                    {{ \Carbon\Carbon::parse($update['timestamp'])->format('M d, Y h:i A') }}
                                                </span>
                                            </div>
                                            <p class="text-sm text-gray-700">{{ $update['message'] }}</p>
                                            @if(isset($update['images']) && count($update['images']) > 0)
                                                <div class="mt-3 grid grid-cols-2 gap-2">
                                                    @foreach($update['images'] as $image)
                                                        <a href="{{ $image }}" target="_blank" class="block">
                                                            <img src="{{ $image }}" alt="Progress Image"
                                                                 class="h-24 w-full object-cover rounded-lg hover:opacity-75 transition-opacity">
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-6 text-center text-gray-500">No progress updates yet.</div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Sidebar - Takes up 1 column -->
            <div class="space-y-8">
                <!-- Images Section -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Images</h2>
                    </div>
                    <div class="p-6">
                        @if($commission->images && count($commission->images) > 0)
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($commission->images as $image)
                                    <div class="relative group">
                                        <a href="{{ $image }}" target="_blank" class="block">
                                            <img src="{{ $image }}" alt="Commission Image"
                                                 class="h-32 w-full object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity">
                                            <div class="absolute inset-0 flex items-center justify-center opacity-0
                                                        group-hover:opacity-100 transition-opacity">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-sm text-gray-500">No images available</p>
                        @endif
                    </div>
                </div>

                <!-- Notes Section -->
                <div class="bg-white rounded-xl shadow-sm">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">Notes</h2>
                    </div>
                    <div class="p-6">
                        <form id="note-form" class="mb-6">
                            <div class="space-y-4">
                                <div>
                                    <label for="note-content" class="block text-sm font-medium text-gray-700">Add Note</label>
                                    <textarea id="note-content"
                                            rows="3"
                                            class="mt-1 block w-full px-4 py-2 rounded-md border border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm"
                                            placeholder="Add a note..."></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Add Note
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div id="notes-container" class="space-y-4">
                            @if($commission->notes)
                                @foreach(json_decode($commission->notes) as $note)
                                    <div class="flex items-start space-x-2 p-2 bg-gray-50 rounded">
                                        <div class="flex-1">
                                            <p class="text-sm text-gray-700">{{ $note->content }}</p>
                                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($note->created_at)->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addNote() {
            const content = prompt('Enter note content:');
            if (!content) return;

            fetch(`/commissions/{{ $commission->id }}/notes`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ content })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const noteElement = document.createElement('div');
                    noteElement.className = 'flex items-start space-x-2 p-2 bg-gray-50 rounded';
                    noteElement.innerHTML = `
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">${content}</p>
                            <p class="text-xs text-gray-500">${new Date().toLocaleDateString()}</p>
                        </div>
                    `;
                    document.getElementById('notes-container').appendChild(noteElement);
                }
            });
        }

        // Chat functionality
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const messageInput = document.getElementById('message');
            const content = messageInput.value.trim();

            if (!content) return;

            fetch(`/commissions/{{ $commission->id }}/messages`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ content })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const messageElement = document.createElement('div');
                    messageElement.className = 'flex items-start space-x-3 flex-row-reverse space-x-reverse';
                    messageElement.innerHTML = `
                        <div class="flex-shrink-0">
                            <img src="{{ auth()->user()->avatar_url ?? '/api/placeholder/32/32' }}"
                                 alt="User avatar"
                                 class="h-8 w-8 rounded-full">
                        </div>
                        <div class="bg-purple-50 rounded-lg p-4 max-w-lg">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm font-medium text-gray-900">
                                    {{ auth()->user()->display_name }}
                                </span>
                                <span class="text-xs text-gray-500">
                                    ${new Date().toLocaleString('en-US', {
                                        month: 'short',
                                        day: 'numeric',
                                        hour: 'numeric',
                                        minute: 'numeric',
                                        hour12: true
                                    })}
                                </span>
                            </div>
                            <p class="text-sm text-gray-700">${content}</p>
                        </div>
                    `;

                    const chatMessages = document.getElementById('chat-messages');
                    chatMessages.appendChild(messageElement);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                    messageInput.value = '';
                }
            });
        });

        // Auto-scroll chat to bottom on load
        const chatMessages = document.getElementById('chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;

        document.getElementById('note-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const contentInput = document.getElementById('note-content');
            const content = contentInput.value.trim();

            if (!content) return;

            fetch(`/commissions/{{ $commission->id }}/notes`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ content })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const noteElement = document.createElement('div');
                    noteElement.className = 'flex items-start space-x-2 p-2 bg-gray-50 rounded';
                    noteElement.innerHTML = `
                        <div class="flex-1">
                            <p class="text-sm text-gray-700">${content}</p>
                            <p class="text-xs text-gray-500">${new Date().toLocaleDateString()}</p>
                        </div>
                    `;
                    document.getElementById('notes-container').insertBefore(noteElement, document.getElementById('notes-container').firstChild);
                    contentInput.value = '';
                }
            });
        });
    </script>
@endsection

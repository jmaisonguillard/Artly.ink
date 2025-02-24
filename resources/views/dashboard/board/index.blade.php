@extends('layouts.app')

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const columns = document.querySelectorAll('.commission-column');
            let selectedCard = null;

            columns.forEach(column => {
                new Sortable(column, {
                    group: 'commissions', // shared group name for all columns
                    animation: 150,
                    ghostClass: 'bg-purple-50',
                    dragClass: 'shadow-2xl',
                    draggable: '.commission-card',
                    onEnd: function(evt) {
                        const newStatus = evt.to.dataset.status;
                        const oldStatus = evt.from.dataset.status;
                        const commissionId = evt.item.dataset.id;

                        // Get all commission IDs in the new column in order
                        const newOrder = Array.from(evt.to.children)
                            .filter(el => el.classList.contains('commission-card'))
                            .map((el, index) => ({
                                id: el.dataset.id,
                                position: index
                            }));

                        // Make AJAX call to update status and/or position
                        fetch(`/board/${commissionId}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                status: newStatus,
                                position: evt.newIndex,
                                order: newOrder
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                updateColumnCounts();
                                updateEmptyStates();
                            }
                        })
                        .catch(error => {
                            console.error('Error updating commission status:', error);
                            // Optionally revert the drag if there's an error
                            evt.from.appendChild(evt.item);
                            updateColumnCounts();
                            updateEmptyStates();
                        });
                    }
                });
            });

            function updateColumnCounts() {
                columns.forEach(column => {
                    const cardCount = column.querySelectorAll('.commission-card').length;
                    const countElement = column.parentElement.querySelector('.column-count');
                    if (countElement) {
                        countElement.textContent = `(${cardCount})`;
                    }
                });
            }

            function updateEmptyStates() {
                columns.forEach(column => {
                    const cards = column.querySelectorAll('.commission-card');
                    const emptyState = column.querySelector('.empty-state');

                    if (cards.length === 0) {
                        emptyState?.classList.remove('hidden');
                    } else {
                        emptyState?.classList.add('hidden');
                    }
                });
            }

            // Initial empty state setup
            updateEmptyStates();

            // Add click handler for commission cards
            document.querySelectorAll('.commission-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    // Don't trigger click when dragging
                    if (e.target.closest('.sortable-drag')) return;

                    selectedCard = card;

                    const commissionId = card.dataset.id;
                    fetch(`/commissions/${commissionId}/data`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('commission-modal').classList.remove('hidden');
                            // Populate modal fields
                            document.getElementById('modal-commission-title').value = data.title;
                            document.getElementById('modal-client-name').value = data.client.display_name;
                            document.getElementById('modal-due-date').value = data.due_date.split('T')[0];
                            document.getElementById('modal-priority').value = data.priority;
                            document.getElementById('modal-description').value = data.description || '';

                            // Update images container
                            const imagesContainer = document.getElementById('modal-images');
                            imagesContainer.innerHTML = '';
                            if (data.images && data.images.length > 0) {
                                data.images.forEach(image => {
                                    const imageWrapper = document.createElement('div');
                                    imageWrapper.className = 'relative group';
                                    imageWrapper.innerHTML = `
                                        <a href="${image}" target="_blank" class="block">
                                            <img src="${image}" alt="Commission Image"
                                                 class="h-24 w-24 object-cover rounded-lg cursor-pointer
                                                        hover:opacity-75 transition-opacity">
                                            <div class="absolute inset-0 flex items-center justify-center opacity-0
                                                        group-hover:opacity-100 transition-opacity">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </div>
                                        </a>
                                    `;
                                    imagesContainer.appendChild(imageWrapper);
                                });
                            } else {
                                imagesContainer.innerHTML = '<p class="text-sm text-gray-500">No images available</p>';
                            }

                            // Clear and populate notes
                            const notesContainer = document.getElementById('notes-container');
                            notesContainer.innerHTML = '';
                            if (data.notes && data.notes.length > 0) {
                                JSON.parse(data.notes).forEach(note => {
                                    const noteElement = createNoteElement(note);
                                    notesContainer.appendChild(noteElement);
                                });
                            }
                        });
                });
            });

            // Handle modal close buttons (both in header and footer)
            document.querySelectorAll('#modal-close').forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('commission-modal').classList.add('hidden');
                });
            });

            // Add note button handler
            document.getElementById('add-note-btn').addEventListener('click', function() {
                const input = document.getElementById('new-note-input');
                const note = input.value.trim();
                if (note) {
                    const noteElement = createNoteElement({ content: note, created_at: new Date() });
                    document.getElementById('notes-container').appendChild(noteElement);
                    input.value = '';
                }
            });

            function createNoteElement(note) {
                const div = document.createElement('div');
                div.className = 'flex items-start space-x-2 p-2 bg-gray-50 rounded';

                console.log(note);

                // If note is a string, convert it to an object format
                const noteContent = typeof note === 'string' ? note : note.content;
                const noteDate = typeof note === 'string' ? new Date() : new Date(note.created_at);

                div.innerHTML = `
                    <div class="flex-1">
                        <p class="text-sm text-gray-700">${noteContent}</p>
                        <p class="text-xs text-gray-500">${noteDate.toLocaleDateString()}</p>
                    </div>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="this.closest('div').remove()">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                `;
                return div;
            }

            // Update form submission to include error handling
            document.getElementById('modal-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const commissionId = selectedCard.dataset.id;

                // Clear any existing error messages
                clearErrorMessages();

                // Fix note content extraction
                const notes = Array.from(document.getElementById('notes-container').children).map(noteEl =>
                    noteEl.querySelector('.text-gray-700').textContent
                );

                fetch(`/commissions/${commissionId}/from-modal`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        title: document.getElementById('modal-commission-title').value,
                        client_name: document.getElementById('modal-client-name').value,
                        due_date: document.getElementById('modal-due-date').value,
                        priority: document.getElementById('modal-priority').value,
                        description: document.getElementById('modal-description').value,
                        notes: notes
                    })
                })
                .then(response => {
                    if (response.status === 422) {
                        return response.json().then(data => {
                            throw data;
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        document.getElementById('commission-modal').classList.add('hidden');
                        window.location.reload();
                    }
                })
                .catch(errors => {
                    if (errors.errors) {
                        displayErrors(errors.errors);
                    } else {
                        console.error('Error updating commission:', errors);
                    }
                });
            });

            function clearErrorMessages() {
                document.querySelectorAll('.error-message').forEach(el => el.remove());
                document.querySelectorAll('.error-border').forEach(el => {
                    el.classList.remove('error-border', 'border-red-500');
                });
            }

            function displayErrors(errors) {
                Object.keys(errors).forEach(field => {
                    const input = document.getElementById(`modal-${field}`);
                    if (input) {
                        input.classList.add('error-border', 'border-red-500');

                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'error-message text-red-500 text-sm mt-1';
                        errorDiv.textContent = errors[field][0]; // Display first error message

                        input.parentNode.appendChild(errorDiv);
                    }
                });
            }
        });
    </script>
@endpush

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Commission Board</h1>
                <p class="text-gray-600">Manage your active commissions through each stage</p>
            </div>
        </div>

        <!-- Wrapper for horizontal scroll -->
        <div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-gray-200">
            <!-- Main container with minimum widths -->
            <div class="flex flex-row min-h-[calc(100vh-12rem)] min-w-[1200px]">
                @php
                    $columns = [
                        'pending' => ['name' => 'Pending', 'color' => 'gray'],
                        'sketching' => ['name' => 'Sketching', 'color' => 'blue'],
                        'inking' => ['name' => 'Inking', 'color' => 'indigo'],
                        'coloring' => ['name' => 'Coloring', 'color' => 'yellow'],
                        'final_review' => ['name' => 'Final Review', 'color' => 'green']
                    ];
                @endphp

                @foreach($columns as $status => $column)
                    <div class="flex-1 {{ !$loop->last ? 'border-r' : '' }} border-gray-200 min-w-[240px] flex flex-col">
                        <div class="p-4 border-b border-gray-200 bg-white z-20">
                            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                                <span class="w-2 h-2 bg-{{ $column['color'] }}-400 rounded-full mr-2"></span>
                                {{ $column['name'] }}
                                <span class="ml-2 text-sm text-gray-500 column-count">({{ $commissions->where('status', $status)->count() }})</span>
                            </h2>
                        </div>
                        <div class="commission-column divide-y divide-gray-200 overflow-y-auto flex-1" data-status="{{ $status }}">
                            @forelse($commissions->where('status', $status)->sortBy('position') as $commission)
                                <div class="commission-card p-4 hover:bg-gray-50 transition-colors cursor-move" data-id="{{ $commission->id }}">
                                    <div class="flex flex-col space-y-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="h-10 w-10 rounded bg-gray-200">
                                                @if($commission->thumbnail)
                                                    <img src="{{ $commission->thumbnail }}" alt="Thumbnail" class="h-10 w-10 rounded object-cover">
                                                @endif
                                            </div>
                                            <div class="min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">{{ $commission->title }}</p>
                                                <p class="text-sm text-gray-500 truncate">{{ $commission->client_name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            @php
                                                $daysInProgress = max(0, round($commission->created_at->diffInDays(now())));
                                                $daysOverdue = $commission->due_date < now() ? round($commission->due_date->diffInDays(now())) : 0;
                                            @endphp
                                            <span class="text-sm {{ $daysOverdue > 0 ? 'text-red-600' : 'text-gray-600' }}">
                                                {{ $daysInProgress }} days in progress
                                                @if($daysOverdue > 0)
                                                    • {{ $daysOverdue }} days overdue
                                                @endif
                                            </span>
                                            <div class="flex items-center space-x-2">
                                                @if($commission->priority)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if($commission->priority === 'high') bg-red-100 text-red-800
                                                    @elseif($commission->priority === 'medium') bg-yellow-100 text-yellow-800
                                                    @else bg-green-100 text-green-800
                                                    @endif">
                                                    {{ ucfirst($commission->priority) }}
                                                </span>
                                                @endif
                                                <span class="text-sm text-gray-500">{{ $commission->due_date->format('M d') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-state p-4 text-center text-gray-400">
                                    Drop items here
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions Menu -->
        <div class="fixed bottom-6 right-6">
            <button class="bg-purple-600 text-white p-4 rounded-full shadow-lg hover:bg-purple-700 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Commission Modal -->
    <div id="commission-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border max-w-2xl shadow-lg rounded-md bg-white">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Edit Commission</h3>
                <button id="modal-close" class="text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="modal-form" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="modal-commission-title" class="block text-sm font-medium text-gray-700 mb-1">
                            Title
                        </label>
                        <input type="text"
                            id="modal-commission-title"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            placeholder="Enter commission title"
                            required>
                    </div>

                    <div>
                        <label for="modal-client-name" class="block text-sm font-medium text-gray-700 mb-1">
                            Client Name
                        </label>
                        <input type="text"
                            id="modal-client-name"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent bg-gray-50"
                            disabled>
                    </div>

                    <div>
                        <label for="modal-due-date" class="block text-sm font-medium text-gray-700 mb-1">
                            Due Date
                        </label>
                        <input type="date"
                            id="modal-due-date"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                            required>
                    </div>

                    <div>
                        <label for="modal-priority" class="block text-sm font-medium text-gray-700 mb-1">
                            Priority
                        </label>
                        <select id="modal-priority"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="modal-description" class="block text-sm font-medium text-gray-700 mb-1">
                        Description
                    </label>
                    <textarea
                        id="modal-description"
                        rows="4"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                        placeholder="Enter commission details"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Images
                    </label>
                    <div id="modal-images" class="grid grid-cols-4 gap-4">
                        <!-- Images will be dynamically inserted here -->
                    </div>
                </div>

                <div>
                    <label for="modal-notes" class="block text-sm font-medium text-gray-700 mb-1">
                        Notes
                    </label>
                    <div class="space-y-2">
                        <div id="notes-container" class="space-y-2 max-h-40 overflow-y-auto">
                            <!-- Notes will be dynamically inserted here -->
                        </div>
                        <div class="flex gap-2">
                            <input type="text"
                                id="new-note-input"
                                class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Add a note">
                            <button type="button"
                                id="add-note-btn"
                                class="px-4 py-2 text-sm font-medium text-white bg-gray-600 hover:bg-gray-500 rounded-md">
                                Add Note
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button"
                        id="modal-close"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-500 transition-colors rounded-md">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

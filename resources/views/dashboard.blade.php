<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="eventModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white z-50">
                    <div class="mt-3">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Create New Event</h3>
                        <form id="eventForm" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" id="eventTitle" name="title" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="eventDescription" name="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="datetime-local" id="eventStartDate" name="start_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="datetime-local" id="eventEndDate" name="end_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div class="flex justify-end space-x-3">
                                <button type="button" id="closeModal"
                                    class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                    Create Event
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="editEventModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white z-50">
                    <div class="mt-3">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit Event</h3>
                        <form id="editEventForm" class="space-y-4">
                            <input type="hidden" id="editEventId">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" id="editEventTitle" name="title" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="editEventDescription" name="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="datetime-local" id="editEventStartDate" name="start_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="datetime-local" id="editEventEndDate" name="end_date" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>

                            <div class="flex justify-between space-x-3">
                                <button type="button" id="deleteEvent"
                                    class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                    Delete
                                </button>
                                <div class="flex space-x-3">
                                    <button type="button" id="closeEditModal"
                                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                                        Update Event
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-4 flex justify-between items-center">
                        <div>
                            <button id="prevBtn" class="px-4 py-2 bg-gray-200 rounded-lg mr-2">Previous</button>
                            <button id="nextBtn" class="px-4 py-2 bg-gray-200 rounded-lg">Next</button>
                        </div>
                        <div>
                            <button id="addEventBtn" class="px-4 py-2 bg-green-500 text-white rounded-lg">Add Event</button>
                            <button id="exportPDF" class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                                Export Current Month to PDF
                            </button>
                        </div>
                    </div>

                    <div id="calendar" style="height: 800px;"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.min.js"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Calendar = tui.Calendar;
            const container = document.getElementById('calendar');
            const modal = document.getElementById('eventModal');
            const editModal = document.getElementById('editEventModal');
            const closeModal = document.getElementById('closeModal');
            const closeEditModal = document.getElementById('closeEditModal');
            const addEventBtn = document.getElementById('addEventBtn');
            const eventForm = document.getElementById('eventForm');
            const editEventForm = document.getElementById('editEventForm');
            const deleteEventBtn = document.getElementById('deleteEvent');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            
            const calendar = new Calendar(container, {
                defaultView: 'month',
                isReadOnly: false,
                month: {
                    dayNames: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    isAlways6Weeks: false,
                },
                useDetailPopup: true,
                useCreationPopup: false,
                draggable: true,
                disableDblClick: true,
                disableClick: false,
                gridSelection: true,
                timezone: {
                    zones: [
                        {
                            timezoneName: 'Europe/Istanbul',
                        }
                    ]
                }
            });
            addEventBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
                eventForm.reset();
            });

            closeEditModal.addEventListener('click', () => {
                editModal.classList.add('hidden');
                editEventForm.reset();
            });

            calendar.on('beforeUpdateEvent', function(eventObj) {
                const event = eventObj.event;
                const changes = eventObj.changes;

                const formatDate = (date) => {
                    if (!date) return null;
                    if (date instanceof Date) {
                        return date.toISOString();
                    }
                    return new Date(date.time || date).toISOString();
                };

                const updatedData = {
                    title: event.title,
                    description: event.body || '',
                    start_date: formatDate(changes.start || event.start),
                    end_date: formatDate(changes.end || event.end)
                };

                fetch(`/events/${event.id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(updatedData)
                })
                .then(response => response.json())
                .then(updatedEvent => {
                    calendar.clear();
                    loadEvents();
                })
                .catch(error => {
                    console.error('Error:', error);
                    calendar.clear();
                    loadEvents();
                });
            });

            document.getElementById('exportPDF').addEventListener('click', () => {
                const month = calendar.getDate().getMonth() + 1;
                const year = calendar.getDate().getFullYear();
                
                window.open(`/export-pdf?month=${month}&year=${year}`, '_blank');
            });

            eventForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = {
                    title: document.getElementById('eventTitle').value,
                    description: document.getElementById('eventDescription').value,
                    start_date: document.getElementById('eventStartDate').value,
                    end_date: document.getElementById('eventEndDate').value
                };

                fetch('/events', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(event => {
                    calendar.createEvents([{
                        id: String(event.id),
                        title: event.title,
                        start: new Date(event.start_date),
                        end: new Date(event.end_date),
                        body: event.description
                    }]);

                    modal.classList.add('hidden');
                    eventForm.reset();
                })
                .catch(error => console.error('Error:', error));
            });

            calendar.on('clickEvent', function(event) {
                const eventData = event.event;

                document.getElementById('editEventId').value = eventData.id;
                document.getElementById('editEventTitle').value = eventData.title;
                document.getElementById('editEventDescription').value = eventData.body || '';
                document.getElementById('editEventStartDate').value = new Date(eventData.start).toISOString().slice(0, 16);
                document.getElementById('editEventEndDate').value = new Date(eventData.end).toISOString().slice(0, 16);

                editModal.classList.remove('hidden');
            });

            editEventForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const eventId = document.getElementById('editEventId').value;
                const formData = {
                    title: document.getElementById('editEventTitle').value,
                    description: document.getElementById('editEventDescription').value,
                    start_date: document.getElementById('editEventStartDate').value,
                    end_date: document.getElementById('editEventEndDate').value
                };

                fetch(`/events/${eventId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(updatedEvent => {
                    calendar.clear();
                    loadEvents();

                    editModal.classList.add('hidden');
                    editEventForm.reset();
                })
                .catch(error => console.error('Error:', error));
            });

            deleteEventBtn.addEventListener('click', function() {
                const eventId = document.getElementById('editEventId').value;

                fetch(`/events/${eventId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(() => {
                    calendar.clear();
                    loadEvents();

                    editModal.classList.add('hidden');
                    editEventForm.reset();
                })
                .catch(error => console.error('Error:', error));
            });

            prevBtn.addEventListener('click', () => {
                calendar.prev();
            });

            nextBtn.addEventListener('click', () => {
                calendar.next();
            });

            function loadEvents() {
                fetch('/events')
                    .then(response => response.json())
                    .then(events => {
                        const formattedEvents = events.map(event => ({
                            id: String(event.id),
                            title: event.title,
                            start: new Date(event.start_date),
                            end: new Date(event.end_date),
                            body: event.description
                        }));
                        calendar.createEvents(formattedEvents);
                    })
                    .catch(error => console.error('Error:', error));
            }

            loadEvents();
        });
    </script>
</x-app-layout>
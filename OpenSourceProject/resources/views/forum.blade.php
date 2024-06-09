<x-layout :pageTitle="'Forum'">
    <div>
        <div class="relative overflow-hidden h-[500px] bg-fixed bg-center bg-cover" style="background-image: url('https://images.unsplash.com/photo-1519354754184-e1d9c46182c0?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Optional overlay for better text contrast -->
            <div class="relative flex items-center justify-center h-full">
                <h1 class="text-white text-8xl font-bold text-center">Travel Forum</h1>
            </div>
        </div>
        <div class="container mx-auto p-4">
            @auth
                <div class="mb-4">
                    <button id="openPopup" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create New Topic</button>
                </div>
            @endauth
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                @foreach ($topics as $topic)
                    <div class="mb-4 border-b pb-4">
                        <h2 class="text-xl font-semibold">
                            <a href="{{ route('forum.show', $topic->id) }}" class="text-blue-500 hover:underline">{{ $topic->title }}</a>
                        </h2>
                        <p class="text-gray-700">{{ $topic->description }}</p>
                        <p class="text-gray-500 text-sm">Posted by {{ $topic->user->name }} on {{ $topic->created_at->format('F j, Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Popup Form for Creating a New Topic -->
        <div id="popup" class="hidden fixed inset-0 bg-black bg-opacity-50 items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-md w-1/2 ">
                <h2 class="text-2xl font-bold mb-4">Create New Topic</h2>
                <form action="{{ route('forum.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" id="title" name="title" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" rows="6" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button id="closePopup" type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md mr-2">Cancel</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Topic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openPopup = document.getElementById('openPopup');
            const closePopup = document.getElementById('closePopup');
            const popup = document.getElementById('popup');

            openPopup.addEventListener('click', function() {
                popup.classList.remove('hidden');
                popup.classList.add('flex');
            });

            closePopup.addEventListener('click', function() {
                popup.classList.add('hidden');
                popup.classList.remove('flex');
            });

            window.addEventListener('click', function(event) {
                if (event.target == popup) {
                    popup.classList.add('hidden');
                }
            });
        });
    </script>
</x-layout>



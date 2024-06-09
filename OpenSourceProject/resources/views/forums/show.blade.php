<x-layout :pageTitle="'Forum'">
    <div class="xl:mx-[15%] mt-8 p-4">
        <h1 class="text-3xl font-bold mb-6">{{ $topic->title }}</h1>
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <p class="text-gray-700 mb-4">{{ $topic->description }}</p>
            <p class="text-gray-500 text-sm">Posted by {{ $topic->user->name }} on {{ $topic->created_at->format('F j, Y') }}</p>
        </div>
        <div class="flex flex-col bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4">Comments</h2>
            @foreach ($topic->comments as $comment)
                <div class="mb-4 border-b pb-4">
                    <p class="text-gray-700">{{ $comment->body }}</p>
                    <p class="text-gray-500 text-sm">Commented by {{ $comment->user->name }} on {{ $comment->created_at->format('F j, Y') }}</p>
                    @if (auth()->id() == $comment->user->id)
                    <div class="flex gap-8 justify-end my-4">
                        <a href="{{route('comment.update', $comment->id)}}"><img src="/pen.png" alt="Edit"></a>
                        <button onclick="showDeleteModal({{ $comment->id }})"><img src="/bin.png" alt="Delete"></button>              
                    </div>
                    @endif
                </div>
            @endforeach
            @auth
            <form action="{{ route('comments.store', $topic->id) }}" method="POST" class="mt-6">
                @csrf
                <textarea name="body" rows="4" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Add a comment" required></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Post Comment</button>
            </form>
        @endauth
        </div>
    </div>

    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                <p class="mb-4">Are you sure you want to delete this comment?</p>
                <div class="flex justify-end">
                    <button onclick="hideDeleteModal()" class="btn bg-gray-500 mr-3 p-2 text-white">Cancel</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-red-500 p-2 text-white">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDeleteModal(enquiryId) {
            document.getElementById('deleteForm').action = `/comment/${enquiryId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-layout>

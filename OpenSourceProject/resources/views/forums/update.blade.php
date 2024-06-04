<x-layout>
    <div class="xl:mx-[15%] mt-8 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">Edit Comment</h2>
        <form id="editCommentForm" action="{{ route('comment.edit', $comment->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <textarea id="editCommentBody" name="body" rows="4" class="w-full p-2 border border-gray-300 rounded-md" required>{{ $comment->body }}</textarea>
            <input type="hidden" id="editCommentId" name="comment_id" value="{{ $comment->id }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Save Changes</button>
            <a href="{{route('forum.show', $comment->forum_id)}}" class="bg-red-500 text-white px-4 py-2 rounded-md mt-2">Cancel</a>
        </form>
    </div>
    </div>
   
</x-layout>

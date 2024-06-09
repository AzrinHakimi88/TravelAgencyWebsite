<x-layout :pageTitle="'Enquiry'">
    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-3xl font-bold mb-6">Your Enquiries</h1>

        @if ($enquiries->isEmpty())
            <p class="text-gray-500">You have no enquiries.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($enquiries as $enquiry)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-2">{{ $enquiry->packageName }}</h2>
                        <p class="text-gray-700"><strong>Name:</strong> {{ $enquiry->name }}</p>
                        <p class="text-gray-700"><strong>Email:</strong> {{ $enquiry->email }}</p>
                        <p class="text-gray-700"><strong>Mobile Number:</strong> {{ $enquiry->mobileNumber }}</p>
                        <p class="text-gray-700"><strong>Departure Date:</strong> {{ \Carbon\Carbon::parse($enquiry->departureDate)->format('F j, Y') }}</p>
                        <p class="text-gray-700"><strong>Additional Request:</strong> {{ $enquiry->additional ?? 'None' }}</p>
                        <div class="flex gap-8 justify-end my-4">
                            <a href="{{ route('enquiries.edit', $enquiry->id) }}"><img src="pen.png" alt="Edit"></a>
                            <button onclick="showDeleteModal({{ $enquiry->id }})"><img src="bin.png" alt="Delete"></button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


    <div id="deleteModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
                <h2 class="text-xl font-semibold mb-4">Confirm Deletion</h2>
                <p class="mb-4">Are you sure you want to delete this enquiry?</p>
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
            document.getElementById('deleteForm').action = `/enquiries/${enquiryId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-layout>


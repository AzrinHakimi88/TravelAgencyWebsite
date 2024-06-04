<x-layout>
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
                            <form method="POST" action="{{ route('enquiries.destroy', $enquiry->id) }}" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><img src="bin.png" alt="Delete"></button>
                            </form>                 
                        </div>
                    </div>
                    
                @endforeach
            </div>
        @endif
    </div>
</x-layout>

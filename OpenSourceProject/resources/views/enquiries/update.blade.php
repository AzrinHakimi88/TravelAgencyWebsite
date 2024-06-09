<x-layout :pageTitle="'Edit Enquiry'">
    <div class="container mx-auto mt-8 p-4">
        <h1 class="text-3xl font-bold mb-6">Update Enquiry</h1>

        <form method="POST" action="{{ route('enquiries.update', $enquiry->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $enquiry->name }}" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $enquiry->email }}" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="mobileNumber" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input type="text" name="mobileNumber" id="mobileNumber" value="{{ $enquiry->mobileNumber }}" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="departureDate" class="block text-sm font-medium text-gray-700">Departure Date</label>
                <input type="date" name="departureDate" id="departureDate" value="{{ $enquiry->departureDate }}" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="additional" class="block text-sm font-medium text-gray-700">Additional Request</label>
                <textarea name="additional" id="additional" class="mt-1 p-2 w-full border border-gray-300 rounded-md">{{ $enquiry->additional }}</textarea>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('enquiryHistory') }}" class="bg-gray-500 text-white p-2 rounded-md mr-2">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update</button>
            </div>
        </form>
    </div>
</x-layout>


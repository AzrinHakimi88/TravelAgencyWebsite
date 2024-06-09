<x-layout :pageTitle="$package->name">
    <div class="">
        @php
            $images = json_decode($package->image_gallery, true);
            $itinerary = json_decode($package->itinerary, true);
            $inclusions = json_decode($package->inclusions, true);
            $exclusions = json_decode($package->exclusions, true);
        @endphp

        <!-- Parallax Section -->
        <div class="relative overflow-hidden h-96 bg-fixed bg-center bg-cover" style="background-image: url('{{ $images[0]}}');">
            <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Optional overlay for better text contrast -->
            <div class="relative z-10 flex items-center justify-center h-full">
                <h1 class="text-white text-4xl md:text-6xl font-bold">{{ $package->name }}</h1>
            </div>
        </div>

        <div class="container mx-auto p-6">
            <!-- Package Information -->
            <div class="mt-8">
                <h2 class="text-3xl font-semibold mb-4">Trip Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-medium mb-2">Duration</h3>
                        <p class="text-lg text-gray-700">{{ $package->duration }} days</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-medium mb-2">Price</h3>
                        <p class="text-lg text-gray-700">RM{{ $package->price }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <h3 class="text-xl font-medium mb-2">Description</h3>
                        <p class="text-lg text-gray-700">{{ $package->description }}</p>
                    </div>
                </div>

             
                <div class="mt-8">
                    <h2 class="text-3xl font-semibold mb-4">Itinerary</h2>
                    <div class="space-y-4">
                        <ol class="relative mx-12 border-s border-gray-200 dark:border-gray-700 mt-8">   
                        @foreach($itinerary as $day)
                            <li class="mb-10 ms-6">
                                <span class="absolute flex items-center justify-center w-6 h-6  rounded-full -start-3 ring-8 ring-gray-900 bg-blue-900">
                                    <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </span>
                                <h3 class="mb-1 text-lg font-semibold text-gray-900 ">Day {{ $day['day'] }}</h3>
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ $day['activity'] }}</p>
                            </li>
                            
                        @endforeach
                        </ol>
                    </div>
                </div>

                
            <div class="mt-8">
                <h2 class="text-3xl font-semibold mb-4">Additional Information</h2>
                <div class="space-y-4">
                    <div class="p-4 border rounded-lg shadow-md bg-white">
                        <h3 class="text-xl font-medium mb-2">What's Included</h3>
                        <ul class="list-disc list-inside text-lg text-gray-700">
                            @foreach($inclusions as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="p-4 border rounded-lg shadow-md bg-white">
                        <h3 class="text-xl font-medium mb-2">What's Not Included</h3>
                        <ul class="list-disc list-inside text-lg text-gray-700">
                            @foreach($exclusions as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

                
                @if(count($images) > 0)
                    <h2 class="text-3xl font-semibold mt-8 mb-4">Gallery</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($images as $image)
                            <div class="overflow-hidden rounded-lg shadow-md">
                                <img src="{{ $image }}" alt="{{ $package->name }} image" class="w-full h-64 object-cover">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            @auth
                <form class="flex flex-col gap-4 mt-8 p-4 bg-slate-100 shadow-md max-w-[800px]" action="{{route('sendEnquiry')}}" method="POST">
                    @csrf
                    <h1 class="text-3xl my-6">Package Enquiry Form</h1>

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="flex flex-col">
                        <label for="name">Your name</label>
                        <input class="focus:outline-none border  p-2 rounded-xl" name="name" type="text">
                    </div>
                    
                    <div class="flex flex-col">
                        <label  for="email">Your email</label>
                        <input class="focus:outline-none border  p-2 rounded-xl" name="email" type="text">
                    </div>
        
                    <div class="flex flex-col">
                        <label  for="mobileNumber">Mobile number</label>
                        <input class="focus:outline-none border  p-2 rounded-xl" name="mobileNumber" type="number">
                    </div>
        
                    <div class="flex flex-col">
                        <label  for="departureDate">Departure date</label>
                        <input class="focus:outline-none border  p-2 rounded-xl" name="departureDate" type="date">
                    </div>

                    <div class="flex flex-col">
                        <label  for="packageName">Package</label>
                        <input class="focus:outline-none border text-gray-600  p-2 rounded-xl" type="text" name="packageName" value="{{$package->name}}" readonly>
                    </div>

                    <div class="flex flex-col">
                        <label  for="additional">Additional Request / Remark</label>
                        <textarea name="additional" id="" cols="30" rows="10"></textarea>
                    </div>
                    
                    <div class="flex justify-center w-full">
                        <input class="my-6 w-[250px] py-3 px-6 bg-blue-600 text-white rounded-md"  type="submit" >
                    </div>
                    
        
                </form>
           
            @else
                <div class="p-3 bg-blue-500 rounded-md my-8 w-max">
                    <h1 class="text-xl text-white font-bold">LOGIN FIRST TO SEND AN ENQUIRY</h1>
                </div>
            
            @endauth
            
        </div>
    </div>
</x-layout>

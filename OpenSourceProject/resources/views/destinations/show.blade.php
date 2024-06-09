<x-layout :pageTitle="$destination->destination">
    <div class="relative xl:px-12 py-8 ">
        <div class="md:flex m-4">
            <div class="md:w-1/2 rounded-xl overflow-hidden">
                <img class="w-full" src="{{$destination->imageUrl}}" alt="">
            </div>
            <div class="md:w-1/2 rounded-xl overflow-hidden px-8">
                <h1 class="text-4xl md:text-6xl font-bold">{{$destination->destination}}</h1>
                <p class="py-8 xl:text-xl text-wrap mr-4">{{$destination->description}}</p>
            </div>
        </div>
        <div class="w-full">
            <h1 class="py-8 text-4xl">Available Packages To {{$destination->destination}}</h1>
            <div class="w-screen flex gap-8 overflow-x-scroll p-2">
                @foreach ($packages as $package)
                    @php
                        $images = json_decode($package->image_gallery, true);
                    @endphp
                    @if (isset($images[0]))
                        <x-package-card 
                            :link="route('package.show', $package)" 
                            :image="$images[0]"
                            :name="$package->name"
                            :days="$package->duration"
                            :price="$package->price"
                        />
                    @else
            
                        <x-package-card 
                            :link="'#'" 
                            :image="'default-image-url.jpg'" <!-- Placeholder image -->
                            :name="$package->name"
                            :days="$package->duration"
                            :price="$package->price"
                        />
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    
</x-layout>
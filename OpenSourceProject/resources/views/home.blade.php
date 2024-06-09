<x-layout :pageTitle="'Home'">
    <x-banner>
        Discover New Worlds
        <p class="text-2xl">Adventure Awaits on the Horizon</p>
    </x-banner>


    <h1 class="text-4xl text-center my-8">Top Destinations</h1>
    {{-- read and rendernder top destination from database --}}
    <div class="flex justify-center flex-wrap gap-8">
        
        if(isset($destination) )
        @foreach ($destinations as $dest)
            <x-destination-card 
            :link="route('dest.show' , $dest)" 
            :image="$dest->imageUrl"
            :name="$dest->destination"
        />
        @endforeach
        
    </div>

    <div class="parallax my-8"></div>

    <h1 class="text-4xl text-center my-8">Top Packages</h1>

    <div class="flex justify-center flex-wrap gap-8 my-8">

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
</x-layout>

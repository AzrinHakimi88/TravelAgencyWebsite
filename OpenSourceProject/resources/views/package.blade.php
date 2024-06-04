<x-layout>
    <div class="xl:mx-[10%] flex justify-center">
        <div class="flex flex-wrap gap-8 justify-center xl:justify-start my-8">
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
                        <!-- Handle the case where image_gallery might be empty or not properly formatted -->
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
</x-layout>

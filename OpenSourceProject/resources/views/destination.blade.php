<x-layout> 
    <div class="bg-slate-200">
        <div class="relative h-[40vh] overflow-hidden">
            <div class="w-full h-full">
                <img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1505228395891-9a51e7e86bf6?q=80&w=1933&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
            <div class="absolute top-0 w-full h-full flex justify-center items-center bg-black bg-opacity-20 z-10">
                <h1 class="text-6xl text-center text-white font-extrabold">Find the adventure of a lifetime</h1>
            </div>       
        </div>
    
        <div>
            
            {{-- read and render destination from database --}}
            <div class="flex flex-col gap-8 my-8 items-center">
               <ul class="relative list-none flex flex-col gap-8 my-8 items-center xl:w-[70%] md:w-[90%] w-full">
                @forelse ($destinations as $dest)
                    <x-destination-list
                    :route="route('dest.show', $dest)"
                    :image="$dest->imageUrl"
                    :name="$dest->destination"
                    :description="$dest->description"
                    />
                @empty
                    <li>No destinations found.</li>
                @endforelse
                </ul> 
            </div>
        </div>
    </div>    
</x-layout>

<a href="{{ $link }}">
    <div class="relative w-[350px] overflow-hidden dest-card bg-slate-100 p-2">
        <div class="w-[350px] h-[250px]">
           <img class="w-full h-full object-cover rounded-xl" src="{{ $image }}" alt="{{ $name }}"> 
        </div> 
        <div class="w-full bottom-0 text-white p-4 ">
            <p class="text-black text-xl font-bold">{{ $name }}</p>
            <div class="my-2">
                <div class="flex items-center gap-4">
                    <img src="/schedule.png" alt="">
                    <span class="text-gray-400">{{$days}} days</span>
                </div>
            </div>
            <p><span class="font-bold text-black">RM {{$price}} /</span><span class="text-gray-400 text-sm"> Person</span></p>
        </div>
    </div>
</a>
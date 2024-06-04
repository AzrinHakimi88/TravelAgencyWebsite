<a class="w-full cursor-pointer bg-slate-100 shadow-md" href="{{ $route }}">
    <li class="w-full">
        <div class="flex gap-4">
            <img class="min-w-[200px] w-[200px] h-[200px] object-fill" src={{$image}} alt="">
            <div>         
                <h1 class="text-xl font-semibold">{{$name}}</h1>   
                <p class="line-clamp-5">{{$description}}</p>
            </div>
        </div>    
    </li>
</a>
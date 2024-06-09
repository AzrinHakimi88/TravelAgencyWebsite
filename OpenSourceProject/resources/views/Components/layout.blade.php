<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Travel Agency - {{$pageTitle ?? ''}}</title>
    <link rel="icon" href="/compass.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body class="min-h-screen flex flex-col box-border overflow-x-hidden">
    <div class="grid grid-rows-[auto_1fr_auto] min-h-screen">
        <nav class="h-[80px] sticky top-0 left-0 z-20 flex justify-between items-center gap-8 bg-slate-100 shadow-md">
            <div class="h-full">
                <img class="h-full" src="/logo.png"  alt="">
            </div>
            
            <div class="flex gap-8 justify-center items-center mr-8">
                <div class="hidden xl:flex gap-8 justify-center items-center">
                    <x-nav-link href="/" class="{{request()->is('/') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Home</x-nav-link>
                    <x-nav-link href="{{route('dest')}}" class="{{request()->is('destinations') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Destination</x-nav-link>
                    <x-nav-link href="{{route('package')}}" class="{{request()->is('packages') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Package</x-nav-link>
                    <x-nav-link href="{{route('forum')}}" class="{{request()->is('forum') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Forum</x-nav-link>
                </div>
               

                <div class="flex gap-8 justify-center items-center">
                    @auth
                    <a href="{{route('enquiryHistory')}}"><img src="/question.png" alt=""></a>
                    <div class="flex justify-center items-center gap-8 border border-slate-400 p-2 rounded-md">
                        
                        <div class="flex flex-col justify-center items-center">
                            <h1>Welcome,</h1>
                            <p class="text-xl"><strong>{{ auth()->user()->name }}</strong></p>
                        </div>
                    
                        <x-nav-link href="/logout" class=" px-2 py-2">
                            <img src="/logout.png" alt="">
                        </x-nav-link>
                    </div>
                    @else
                        <x-nav-link href="/auth" class="bg-blue-400 text-white px-4 py-2">Login</x-nav-link>
                    @endauth 
                </div>
                
            </div>
            
        </nav>

        <nav class="h-max xl:hidden py-2 border-b border-gray-700">
            <div class="flex gap-8 justify-center items-center mr-8">
                <x-nav-link href="/" class="{{request()->is('/') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Home</x-nav-link>
                 <x-nav-link href="{{route('dest')}}" class="{{request()->is('destinations') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Destination</x-nav-link>
                 <x-nav-link href="{{route('package')}}" class="{{request()->is('packages') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Package</x-nav-link>
                 <x-nav-link href="{{route('forum')}}" class="{{request()->is('forum') ? 'bg-gray-500 text-white' : ''}} px-4 py-2">Forum</x-nav-link>
             </div>
        </nav>

        {{$slot}}

        <footer class="h-[80px] flex justify-center items-center gap-8 bg-slate-100 shadow-inner">
            WIE2002-Assignment 2024
        </footer>
    </div>
    
    <script src="/js/auth.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<!-- or -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
</body>
</html>
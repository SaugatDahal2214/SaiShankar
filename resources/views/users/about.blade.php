@extends('users.master')

@section('content')
<section id="AboutUs" class="services pb-12 ">
    <h1 class="text-center text-5xl text-red-700 font-extrabold uppercase pt-12 tracking-wider">
        About Us
    </h1>

    <p class="text-center mt-4 text-gray-700 max-w-2xl mx-auto text-lg">
        Meet the passionate individuals who drive our mission forward. Our team combines expertise, creativity, and dedication.
    </p>

    <div class="flex flex-wrap mt-12 mx-auto max-w-[80%] gap-12">
        @foreach ($teams as $team)
            <div class="flex flex-col lg:flex-row items-center w-full bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-500 hover:shadow-2xl hover:scale-105">
                <!-- Text Section -->
                <div class="w-full lg:w-2/3 p-8 flex flex-col justify-center">
                    <h2 class="text-2xl text-red-700 font-bold mb-4">About {{ $team->name ?? 'Team Member' }}</h2>
                    <p class="text-gray-700 text-base leading-relaxed">
                        {!! nl2br(e($team->Team_Description)) !!}
                    </p>
                </div>
                <!-- Image Section -->
                <div class="w-full lg:w-1/3 p-4 flex justify-center">
                    <img src="{{ asset($team->Team_Image) }}" alt="Team Member" 
                         class="w-64 h-64 object-cover rounded-full border-4 border-red-600 shadow-md transition-transform duration-500 hover:rotate-6 hover:scale-110">
                </div>
            </div>

            <div class="flex flex-col lg:flex-row items-center w-full bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-500 hover:shadow-2xl hover:scale-105">
                <!-- Image Section -->
                <div class="w-full lg:w-1/3 p-4 flex justify-center">
                    <img src="{{ asset($team->Md_Image) }}" alt="Team Member" 
                         class="w-64 h-64 object-cover rounded-full border-4 border-red-600 shadow-md transition-transform duration-500 hover:rotate-6 hover:scale-110">
                </div>
                <!-- Text Section -->
                <div class="w-full lg:w-2/3 p-8 flex flex-col justify-center">
                    <h2 class="text-2xl text-red-700 font-bold mb-4">Message from Managing Director</h2>
                    <p class="text-gray-700 text-base leading-relaxed">
                        {!! nl2br(e($team->ManagingDirector_Message)) !!}
                    </p>
                </div>
            </div>
            
        @endforeach
    </div>
</section>
@endsection
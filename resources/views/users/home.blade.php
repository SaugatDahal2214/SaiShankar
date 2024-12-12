@extends('users.master')

@section('content')
    {{-- HERO SECTION --}}
    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-red-700">
                    {{ $sliders->Page_Title }}
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
                    {{ $sliders->Sub_Description }}
                </p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-blue-700 border border-blue-900 rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-gray-100">
                    Know Us
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset($sliders->Hero_Image) }}" alt="mockup">
            </div>
        </div>
    </section>
    {{-- HERO SECTION END --}}
  
    
    {{-- SERVICES SECTION --}}
    <section id="Services" class="services pb-12">
        <h1 class="text-center text-5xl text-red-700 font-extrabold uppercase pt-12 tracking-wider">
            Our Services
        </h1>
        
        <div class="flex flex-wrap mt-8 mx-auto max-w-[80%] relative z-3"> <!-- Added relative positioning and z-index here -->
            @foreach ($services->slice(0, 3) as $service)
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 p-6 glass-navbar shadow-lg rounded-lg flex flex-col items-center transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                        <div class="mb-4 text-blue-600 text-5xl">
                            <img src="{{ asset($service->Service_Image) }}" alt="pharmacy" height="80" width="80">
                        </div>
                        <div>
                            <h3 class="text-red-700 font-bold text-2xl block mb-3 text-center uppercase">
                                {{ $service->Service_Title }}
                            </h3>
                            <p class="text-gray-600 text-center">
                                {!! nl2br(e( $service->Service_Description)) !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- SERVICES SECTION END --}}


    {{-- About Us Section --}}
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
                        <!-- Learn More Button -->
                        <a href="/about" class="inline-flex items-center justify-center mt-8 py-3 text-base font-medium text-center text-blue-700 border border-blue-900 rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-gray-100">
                            Learn More
                        </a>
                    </div>
                    <!-- Image Section -->
                    <div class="w-full lg:w-1/3 p-4 flex justify-center">
                        <img src="{{ asset($team->Team_Image) }}" alt="Team Member" 
                             class="w-64 h-64 object-cover rounded-full border-4 border-red-600 shadow-md transition-transform duration-500 hover:rotate-6 hover:scale-110">
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
    
    
    
    {{-- About Us Section End --}}
@endsection

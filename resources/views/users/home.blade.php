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
    <section id="Services" class="services pb-12">
        <h1 class="text-center text-4xl text-red-700 font-bold pt-12">
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
                                {{ $service->Service_Description }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    
    {{-- SERVICES SECTION --}}

    {{-- SERVICES SECTION END --}}
@endsection

@extends('users.master')

@section('content')
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            @if ($sliders)
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-red-700">
                    {{ $sliders->Page_Title }}
                </h1>
            @else
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-gray-500">
                    No Slider Found
                </h1>
            @endif
        </div>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
                From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their payment stack.
            </p>
            <a href="#" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center  text-blue-700 border border-blue-700 rounded-lg hover:bg-blue-100 focus:ring-4 focus:ring-gray-100">
                Our Services
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="images/heroFinal.png" alt="mockup">
        </div>                
    </div>
</section>

@endsection
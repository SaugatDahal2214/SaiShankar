@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
<div class="flex items-center justify-between px-10 py-4 bg-white border-b border-neutral-200">
    <div class="text-sm font-semibold">Welcome, {{ Auth::user()->name }}</div>
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>
@endsection

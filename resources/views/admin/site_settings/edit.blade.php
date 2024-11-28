@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-red-600 uppercase">
            Edit Site Settings
        </h1>

        <!-- Success/Error Messages -->
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form 
            action="{{ $setting ?? false ? route('siteSettings.update', $setting->id) : route('siteSettings.store') }}" 
            method="POST" 
            enctype="multipart/form-data" 
            class="space-y-6 bg-white shadow rounded px-6 py-4"
        >
            @csrf
            @if ($setting ?? false)
                @method('PUT')
            @endif

            <!-- Logo -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="logo">Upload Logo</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    name="logo" id="logo" type="file">
                <p class="mt-1 text-sm text-gray-500">Accepted formats: SVG, PNG, JPG</p>

                @if ($setting->logo ?? false)
                    <div class="mt-2">
                        <p class="text-sm text-gray-700">Current Logo:</p>
                        <img src="{{ asset($setting->logo) }}" alt="Logo" class="h-16 border rounded">
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <div>
                <label for="footer" class="block text-sm font-medium text-gray-700">Footer</label>
                <textarea 
                    name="footer" 
                    id="footer" 
                    rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                >{{ old('footer', $setting->footer ?? '') }}</textarea>
            </div>

            <!-- Social Links and Icons -->
            @php
                $socialFields = [
                    [
                        'name' => 'social_link_one',
                        'label' => 'Social Link 1',
                        'icon_name' => 'social_icon_one',
                        'icon_label' => 'Social Icon 1'
                    ],
                    [
                        'name' => 'social_link_two',
                        'label' => 'Social Link 2',
                        'icon_name' => 'social_icon_two',
                        'icon_label' => 'Social Icon 2'
                    ],
                    [
                        'name' => 'social_link_three',
                        'label' => 'Social Link 3',
                        'icon_name' => 'social_icon_three',
                        'icon_label' => 'Social Icon 3'
                    ],
                ];
            @endphp

            @foreach ($socialFields as $field)
                <!-- Social Link -->
                <div>
                    <label for="{{ $field['name'] }}" class="block text-sm font-medium text-gray-700">{{ $field['label'] }}</label>
                    <input 
                        type="url" 
                        name="{{ $field['name'] }}" 
                        id="{{ $field['name'] }}" 
                        value="{{ old($field['name'], $setting->{$field['name']} ?? '') }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >
                </div>

                <!-- Social Icon -->
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="{{ $field['icon_name'] }}">{{ $field['icon_label'] }}</label>
                    <input
                        type="file"
                        name="{{ $field['icon_name'] }}"
                        id="{{ $field['icon_name'] }}"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    <p class="mt-1 text-sm text-gray-500">Accepted formats: PNG, JPG, SVG</p>

                    @if ($setting->{$field['icon_name']} ?? false)
                        <div class="mt-2">
                            <p class="text-sm text-gray-700">Current Icon:</p>
                            <img src="{{ asset($setting->{$field['icon_name']}) }}" alt="{{ $field['label'] }}" class="h-8 w-8 border rounded">
                        </div>
                    @endif
                </div>
            @endforeach

            <!-- Submit Button -->
            <div class="flex justify-start">
                <button 
                    type="submit" 
                    class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600"
                >
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection

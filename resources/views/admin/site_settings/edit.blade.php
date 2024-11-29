@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-red-600 uppercase">Edit Site Settings</h1>

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
        <form action="{{ route('siteSettings.update', $settings->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white shadow rounded px-6 py-4">
            @csrf
            @method('PUT')

            <!-- Logo -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="logo">Upload Logo</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" name="logo" id="logo" type="file">
                <p class="mt-1 text-sm text-gray-500">Accepted formats: SVG, PNG, JPG</p>

                @if ($settings->logo)
                    <div class="mt-2">
                        <p class="text-sm text-gray-700">Current Logo:</p>
                        <img src="{{ asset($settings->logo) }}" alt="Logo" class="h-16 border rounded">
                    </div>
                @endif
            </div>

            <!-- Footer -->
            <div>
                <label for="footer" class="block text-sm font-medium text-gray-700">Footer</label>
                <textarea name="footer" id="footer" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('footer', $settings->footer) }}</textarea>
            </div>

            <!-- Social Links -->
            <div>
                <label for="Social_link_one" class="block text-sm font-medium text-gray-700">Social Link 1</label>
                <input type="url" name="Social_link_one" id="Social_link_one" value="{{ old('Social_link_one', $settings->Social_link_one) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="Social_link_two" class="block text-sm font-medium text-gray-700">Social Link 2</label>
                <input type="url" name="Social_link_two" id="Social_link_two" value="{{ old('Social_link_two', $settings->Social_link_two) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="Social_link_three" class="block text-sm font-medium text-gray-700">Social Link 3</label>
                <input type="url" name="Social_link_three" id="Social_link_three" value="{{ old('Social_link_three', $settings->Social_link_three) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Social Icons -->
            @foreach (['social_icon_one', 'social_icon_two', 'social_icon_three'] as $icon)
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="{{ $icon }}">Upload {{ ucwords(str_replace('_', ' ', $icon)) }}</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" name="{{ $icon }}" id="{{ $icon }}" type="file">
                    @if ($settings->{$icon})
                        <div class="mt-2">
                            <p class="text-sm text-gray-700">Current Icon:</p>
                            <img src="{{ asset($settings->{$icon}) }}" alt="{{ ucwords(str_replace('_', ' ', $icon)) }}" class="h-16 border rounded">
                        </div>
                    @endif
                </div>
            @endforeach

            <!-- Submit Button -->
            <div class="flex justify-start">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">Update</button>
            </div>
        </form>
    </div>
@endsection

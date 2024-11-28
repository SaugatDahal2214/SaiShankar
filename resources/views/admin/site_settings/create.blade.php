@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-red-600 uppercase">Add Site Settings</h1>

        <!-- Success/Error Messages -->
        <div>
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
        </div>

        <!-- Form -->
        <form action="{{ isset($setting) ? route('siteSettings.update', $setting->id) : route('siteSettings.store') }}"
            method="POST" enctype="multipart/form-data" class="space-y-6 bg-white shadow rounded px-6 py-4">
            @csrf
            @if (isset($setting))
                @method('PUT')
            @endif

            <!-- Logo -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="logo">Upload Logo</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                    name="logo" id="logo" type="file">
                <p class="mt-1 text-sm text-gray-500">SVG, PNG, or JPG</p>

                @if (isset($setting) && $setting->logo)
                    <img src="{{ asset($setting->logo) }}" alt="Logo" class="h-16 mt-2">
                @endif
            </div>

            <!-- Footer -->
            <div>
                <label for="footer" class="block text-sm font-medium text-gray-700">Footer</label>
                <textarea name="footer" id="footer" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('footer', $setting->footer ?? '') }}</textarea>
            </div>

            <!-- Social Links -->
            <div>
                <label for="Social_link_one" class="block text-sm font-medium text-gray-700">Social Link 1</label>
                <input type="url" name="Social_link_one" id="Social_link_one"
                    value="{{ old('Social_link_one', $setting->Social_link_one ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="Social_link_two" class="block text-sm font-medium text-gray-700">Social Link 2</label>
                <input type="url" name="Social_link_two" id="Social_link_two"
                    value="{{ old('Social_link_two', $setting->Social_link_two ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="Social_link_three" class="block text-sm font-medium text-gray-700">Social Link 3</label>
                <input type="url" name="Social_link_three" id="Social_link_three"
                    value="{{ old('Social_link_three', $setting->Social_link_three ?? '') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Social Icons -->
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="social_icon_one">Social Icon 1</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                    name="social_icon_one" id="social_icon_one" type="file">
                @if (isset($setting) && $setting->social_icon_one)
                    <img src="{{ asset($setting->social_icon_one) }}" alt="Social Icon 1" class="h-16 mt-2">
                @endif
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="social_icon_two">Social Icon 2</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                    name="social_icon_two" id="social_icon_two" type="file">
                @if (isset($setting) && $setting->social_icon_two)
                    <img src="{{ asset($setting->social_icon_two) }}" alt="Social Icon 2" class="h-16 mt-2">
                @endif
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900" for="social_icon_three">Social Icon 3</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                    name="social_icon_three" id="social_icon_three" type="file">
                @if (isset($setting) && $setting->social_icon_three)
                    <img src="{{ asset($setting->social_icon_three) }}" alt="Social Icon 3" class="h-16 mt-2">
                @endif
            </div>

            <!-- Submit Button -->
            <div class="flex justify-start">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">
                    {{ isset($setting) ? 'Update' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
@endsection

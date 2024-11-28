@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-red-600 uppercase">Site Settings</h1>

    <!-- Success Message -->
    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Settings Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-sm font-medium">
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">Logo</th>
                    <th class="border border-gray-300 px-4 py-2">Footer</th>
                    <th class="border border-gray-300 px-4 py-2">Social Link 1</th>
                    <th class="border border-gray-300 px-4 py-2">Social Link 2</th>
                    <th class="border border-gray-300 px-4 py-2">Social Link 3</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($settings as $setting)
                <tr class="bg-white hover:bg-gray-100 text-sm">
                    <!-- ID -->
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $setting->id }}</td>

                    <!-- Logo -->
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <img src="{{ asset($setting->logo) }}" alt="Logo" class="h-12 w-12 mx-auto object-cover">
                    </td>

                    <!-- Footer -->
                    <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $setting->footer }}">
                        {{ Str::limit($setting->footer, 30) }}
                    </td>

                    <!-- Social Links -->
                    @foreach(['Social_link_one', 'Social_link_two', 'Social_link_three'] as $link)
                        <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $setting->$link }}">
                            <a href="{{ $setting->$link }}" target="_blank" 
                               class="text-blue-500 hover:underline">
                                {{ $setting->$link }}
                            </a>
                        </td>
                    @endforeach

                    <!-- Action -->
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex space-x-4 justify-center">
                            <!-- Edit -->
                            <a href="{{ route('siteSettings.edit', $setting->id) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form method="post" action="{{ route('siteSettings.destroy', $setting->id) }}" 
                                  onsubmit="return confirm('Are you sure you want to delete this setting? This action cannot be undone.');">
                                @csrf
                                @method('delete')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- New Entry Button -->
    <div class="mt-6 flex justify-start">
        <a href="{{ route('siteSettings.create') }}" 
           class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">
            New Entry
        </a>
    </div>
</div>
@endsection

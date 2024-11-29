@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-blue-600 uppercase">Slider Management</h1>

    <!-- Success Message -->
    @if(session()->has('Success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center">
            {{ session('Success') }}
        </div>
    @endif

    <!-- Slider Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-sm font-medium">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Page Title</th>
                    <th class="border border-gray-300 px-4 py-2">Sub Description</th>
                    <th class="border border-gray-300 px-4 py-2">Hero Image</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sliders as $slider)
                <tr class="bg-white hover:bg-gray-100 text-sm">
                    <!-- ID -->
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>

                    <!-- Page Title -->
                    <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $slider->Page_Title }}">
                        {{ Str::limit($slider->Page_Title, 30) }}
                    </td>

                    <!-- Sub Description -->
                    <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $slider->Sub_Description }}">
                        {{ Str::limit($slider->Sub_Description, 40) }}
                    </td>

                    <!-- Hero Image -->
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <img src="{{ asset($slider->Hero_Image) }}" alt="{{ $slider->Page_Title }}" 
                             class="h-12 w-auto mx-auto object-cover rounded">
                    </td>

                    <!-- Actions -->
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex space-x-4 justify-center">
                            <!-- Edit -->
                            <a href="{{ route('sliders.edit', $slider->id) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form method="post" action="{{ route('sliders.destroy', $slider->id) }}" 
                                  onsubmit="return confirm('Are you sure you want to delete this slider?');">
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
                @empty
                <tr>
                    <td colspan="5" class="text-center border border-gray-300 px-4 py-2">
                        No sliders found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add New Slider Button -->
    <div class="mt-6 flex justify-start">
        <a href="{{ route('sliders.create') }}" 
           class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">
            Add New Slider
        </a>
    </div>
</div>
@endsection

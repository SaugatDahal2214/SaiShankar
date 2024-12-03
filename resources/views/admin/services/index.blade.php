@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-blue-600 uppercase">Services Management</h1>

    <!-- Success Message -->
    @if(session()->has('success')) <!-- Changed 'Success' to 'success' -->
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Services Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-sm font-medium">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Service Title</th>
                    <th class="border border-gray-300 px-4 py-2">Service Description</th>
                    <th class="border border-gray-300 px-4 py-2">Service Image</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                <tr class="bg-white hover:bg-gray-100 text-sm">
                    <!-- ID -->
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>

                    <!-- Service Title -->
                    <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $service->Service_Title }}">
                        {{ Str::limit($service->Service_Title, 30) }}
                    </td>

                    <!-- Service Description -->
                    <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $service->Service_Description }}">
                        {{ Str::limit($service->Service_Description, 40) }}
                    </td>

                    <!-- Service Image -->
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($service->Service_Image)
                            <img src="{{ asset($service->Service_Image) }}" alt="{{ $service->Service_Title }}" 
                                 class="h-12 w-auto mx-auto object-cover rounded">
                        @else
                            <span class="text-gray-500">No image</span>
                        @endif
                    </td>

                    <!-- Actions -->
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex space-x-4 justify-center">
                            <!-- Edit -->
                            <a href="{{ route('services.edit', $service->id) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form method="post" action="{{ route('services.destroy', $service->id) }}" 
                                  onsubmit="return confirm('Are you sure you want to delete this service?');">
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
                        No services found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add New Service Button -->
    <div class="mt-6 flex justify-start">
        <a href="{{ route('services.create') }}" 
           class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">
            Add New Service
        </a>
    </div>
</div>
@endsection

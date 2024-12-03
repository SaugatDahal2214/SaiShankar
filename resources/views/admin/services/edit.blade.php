@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-red-600 uppercase">Edit Service</h1>

    <!-- Success/Error Messages -->
    <div>
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!-- Form -->
    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white shadow rounded px-6 py-4">
        @csrf
        @method('PUT')

        <!-- Service Title -->
        <div>
            <label for="Service_Title" class="block text-sm font-medium text-gray-700">Service Title</label>
            <input type="text" name="Service_Title" id="Service_Title" 
                   value="{{ old('Service_Title', $service->Service_Title) }}" 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                   required>
        </div>

        <!-- Service Description -->
        <div>
            <label for="Service_Description" class="block text-sm font-medium text-gray-700">Service Description</label>
            <textarea name="Service_Description" id="Service_Description" rows="3" 
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                      required>{{ old('Service_Description', $service->Service_Description) }}</textarea>
        </div>

        <!-- Service Image -->
        <div>
            <label for="Service_Image" class="block text-sm font-medium text-gray-700">Upload Service Image</label>
            <input type="file" name="Service_Image" id="Service_Image" 
                   class="mt-1 block w-full text-gray-900 border-gray-300 rounded-md shadow-sm">
            <p class="mt-1 text-sm text-gray-500">PNG, JPG, or JPEG. Max size: 2MB.</p>

            @if ($service->Service_Image)
                <img src="{{ asset($service->Service_Image) }}" alt="Service Image" class="h-32 mt-2 object-cover rounded">
            @endif
        </div>

        <!-- Submit Button -->
        <div class="flex justify-start">
            <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">
                Update Service
            </button>
        </div>
    </form>
</div>
@endsection

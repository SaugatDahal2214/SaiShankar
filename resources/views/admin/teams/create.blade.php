@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6 text-blue-600 uppercase">Add Team</h1>

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
        <form action="{{ isset($team) ? route('teams.update', $team->id) : route('teams.store') }}" 
              method="POST" enctype="multipart/form-data" class="space-y-6 bg-white shadow rounded px-6 py-4">
            @csrf
            @if (isset($team))
                @method('PUT')
            @endif

            <div>
                <label for="Team_Description" class="block text-sm font-medium text-gray-700">Team Description</label>
                <textarea name="Team_Description" id="Team_Description" rows="3" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('Team_Description', $team->Team_Description ?? '') }}</textarea>
            </div>

            <div>
                <label for="Team_Image" class="block text-sm font-medium text-gray-700">Upload Team Image</label>
                <input type="file" name="Team_Image" id="Team_Image" 
                       class="mt-1 block w-full text-gray-900 border-gray-300 rounded-md shadow-sm">
                <p class="mt-1 text-sm text-gray-500">PNG, JPG, or JPEG</p>

                @if (isset($team) && $team->Team_Image)
                    <img src="{{ asset($team->Team_Image) }}" alt="Team Image" class="h-32 mt-2">
                @endif
            </div>

            <div>
                <label for="ManagingDirector_Message" class="block text-sm font-medium text-gray-700">Managing Director Description</label>
                <textarea name="ManagingDirector_Message" id="ManagingDirector_Message" rows="3" 
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('ManagingDirector_Message', $team->ManagingDirector_Message ?? '') }}</textarea>
            </div>
            

            <div>
                <label for="Md_Image" class="block text-sm font-medium text-gray-700">Upload Managing Director Image</label>
                <input type="file" name="Md_Image" id="Md_Image" 
                       class="mt-1 block w-full text-gray-900 border-gray-300 rounded-md shadow-sm">
                <p class="mt-1 text-sm text-gray-500">PNG, JPG, or JPEG</p>

                @if (isset($team) && $team->Md_Image)
                    <img src="{{ asset($team->Md_Image) }}" alt="Managing Director Image" class="h-32 mt-2">
                @endif
            </div>

            <!-- Submit Button -->
            <div class="flex justify-start">
                <button type="submit" class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">
                    {{ isset($team) ? 'Update' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
@endsection

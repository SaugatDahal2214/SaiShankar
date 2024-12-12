@extends('layouts.navigation') <!-- Update path to your actual layout -->

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-blue-600 uppercase">Team Management</h1>

    <!-- Success Message -->
    @if(session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Team Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-sm font-medium">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Team Description</th>
                    <th class="border border-gray-300 px-4 py-2">Team Image</th>
                    <th class="border border-gray-300 px-4 py-2">Managing Director Description</th>
                    <th class="border border-gray-300 px-4 py-2">Managing Director Image</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($teams as $team)
                <tr class="bg-white hover:bg-gray-100 text-sm">
                    <!-- ID -->
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>

                    <!-- Team Description -->
                    <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $team->Team_Description }}">
                        {{ Str::limit($team->Team_Description, 40) }}
                    </td>

                    <!-- Team Image -->
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($team->Team_Image)
                            <img src="{{ asset($team->Team_Image) }}" alt="Team Image" 
                                 class="h-12 w-auto mx-auto object-cover rounded">
                        @else
                            <span class="text-gray-500">No image</span>
                        @endif
                    </td>

                    <!-- Managing Director Description -->
                    <td class="border border-gray-300 px-4 py-2 truncate" title="{{ $team->ManagingDirector_Message }}">
                        {{ Str::limit($team->ManagingDirector_Message, 40) }}
                    </td>

                    <!-- Managing Director Image -->
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($team->Md_Image)
                            <img src="{{ asset($team->Md_Image) }}" alt="Managing Director Image" 
                                 class="h-12 w-auto mx-auto object-cover rounded">
                        @else
                            <span class="text-gray-500">No image</span>
                        @endif
                    </td>

                    <!-- Actions -->
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex space-x-4 justify-center">
                            <!-- Edit -->
                            <a href="{{ route('teams.edit', $team->id) }}" 
                               class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <!-- Delete -->
                            <form method="post" action="{{ route('teams.destroy', $team->id) }}" 
                                  onsubmit="return confirm('Are you sure you want to delete this team?');">
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
                    <td colspan="6" class="text-center border border-gray-300 px-4 py-2">
                        No teams found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add New Team Button -->
    <div class="mt-6 flex justify-start">
        <a href="{{ route('teams.create') }}" 
           class="bg-gray-800 text-white px-6 py-2 rounded hover:bg-gray-600">
            Add New Team
        </a>
    </div>
</div>
@endsection

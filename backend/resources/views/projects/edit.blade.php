<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('แก้ไขโปรเจกต์') }}
        </h2>
    </x-slot>
    <div class="py-12">
<div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Project</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Current Image</label><br>
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" class="w-32 mb-2">
            @else
                <p>No image uploaded</p>
            @endif
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
</div>
</x-app-layout>

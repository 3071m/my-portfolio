<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายการโปรเจกต์') }}
        </h2>
    </x-slot>
<div class="py-12">
<div class="max-w-xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Create New Project</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul>
                @foreach($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-medium">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Image (optional)</label>
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
</div>
</x-app-layout>
<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายละเอียดโปรเจกต์') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>

                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="mb-6 max-w-full rounded">
                @endif

                <p class="mb-6">{{ $project->description }}</p>

                <p class="text-sm text-gray-500 mb-4">
                    สร้างเมื่อ: {{ $project->created_at->format('d M Y') }}
                </p>

                <a href="{{ route('projects.public') }}" 
                   class="mt-6 inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                   กลับไปหน้าผลงาน
                </a>
            </div>
        </div>
    </div>
    
</x-app-layout>

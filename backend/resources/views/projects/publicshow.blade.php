<x-guest-layout>
    <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>

    @if($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="mb-4 max-w-full h-auto rounded">
    @endif

    <p class="mb-4">{{ $project->description }}</p>

    <div class="mb-4">
        <strong>วันที่ทำโปรเจกต์:</strong>
        {{ $project->date ? \Carbon\Carbon::parse($project->date)->format('d/m/Y') : '-' }}
    </div>

    <div class="mb-4">
        <strong>เทคโนโลยีที่ใช้:</strong>
        {{ $project->technologies ?? '-' }}
    </div>

    <div class="mb-6">
        <strong>ลิงก์ผลงาน:</strong>
        @if ($project->link)
            <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:underline">{{ $project->link }}</a>
        @else
            -
        @endif
    </div>

    <a href="{{ route('projects.public') }}" 
       class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
       กลับไปหน้าผลงาน
    </a>
</x-guest-layout>

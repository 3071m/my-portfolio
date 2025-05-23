<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายการโปรเจกต์') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                
                <div class="flex justify-between mb-4">
                    <a href="{{ route('projects.create') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                       + สร้างโปรเจกต์ใหม่
                    </a>

                    <form action="{{ route('projects.index') }}" method="GET" class="flex">
                        <input type="text" name="search" placeholder="ค้นหาโปรเจกต์..." 
                               value="{{ request('search') }}" 
                               class="border border-gray-300 rounded-l px-3 py-2">
                        <button type="submit" 
                                class="bg-gray-500 hover:bg-gray-600 text-white px-4 rounded-r">
                            ค้นหา
                        </button>
                    </form>
                </div>

               <table class="table-auto w-full border border-gray-300">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-4 py-2">ชื่อโปรเจกต์</th>
            <th class="border px-4 py-2">คำอธิบาย</th>
            <th class="border px-4 py-2">เทคโนโลยี</th>
            <th class="border px-4 py-2">วันที่ทำโปรเจกต์</th>
            <th class="border px-4 py-2">ลิงก์ผลงาน</th>
            <th class="border px-4 py-2">การจัดการ</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $project)
            <tr>
                <td class="border px-4 py-2">{{ $project->title }}</td>
                <td class="border px-4 py-2">{{ Str::limit($project->description, 50) }}</td>
                <td class="border px-4 py-2">{{ $project->technologies ?? '-' }}</td>
                <td class="border px-4 py-2">
                    {{ $project->date ? \Carbon\Carbon::parse($project->date)->format('d/m/Y') : '-' }}
                </td>
                <td class="border px-4 py-2">
                    @if ($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:underline">ลิงก์ผลงาน</a>
                    @else
                        -
                    @endif
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500 hover:underline">ดู</a> |
                    <a href="{{ route('projects.edit', $project->id) }}" class="text-yellow-500 hover:underline">แก้ไข</a> |
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-500 hover:underline" 
                                onclick="return confirm('ลบโปรเจกต์นี้?')">ลบ</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="border px-4 py-2 text-center">ไม่พบโปรเจกต์</td>
            </tr>
        @endforelse
    </tbody>
</table>


                <div class="mt-4">
                    {{ $projects->withQueryString()->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายการโปรเจกต์') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <a href="{{ route('projects.create') }}" 
                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                   + สร้างโปรเจกต์ใหม่
                </a>

                <table class="table-auto w-full mt-4 border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">ชื่อโปรเจกต์</th>
                            <th class="border px-4 py-2">คำอธิบาย</th>
                            <th class="border px-4 py-2">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td class="border px-4 py-2">{{ $project->title }}</td>
                                <td class="border px-4 py-2">{{ $project->description }}</td>
                                <td class="border px-4 py-2">
                                    {{-- ลบ c ที่ไม่ต้องการออก --}}
                                    <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500 hover:underline">ดู</a>
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
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>

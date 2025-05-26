<x-guest-layout>
    <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">ผลงานทั้งหมด</h1>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 text-left bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-100 text-gray-800 text-lg">
                <tr>
                    <th class="border px-6 py-4">ชื่อโปรเจกต์</th>
                    <th class="border px-6 py-4">คำอธิบาย</th>
                    <th class="border px-6 py-4">วันที่ทำโปรเจกต์</th>
                    <th class="border px-6 py-4">ลิงก์ผลงาน</th>
                    <th class="border px-6 py-4">ดูเพิ่มเติม</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-base">
                @forelse ($projects as $project)
                    <tr class="hover:bg-blue-50 transition duration-200">
                        <td class="border px-6 py-4 font-semibold">{{ $project->title }}</td>
                        <td class="border px-6 py-4">{{ Str::limit($project->description, 70) }}</td>
                        <td class="border px-6 py-4">
                            {{ $project->date ? \Carbon\Carbon::parse($project->date)->format('d/m/Y') : '-' }}
                        </td>
                        <td class="border px-6 py-4">
                            @if ($project->link)
                                <a href="{{ $project->link }}" target="_blank" class="text-blue-600 hover:underline">คลิกที่นี่</a>
                            @else
                                <span class="text-gray-400">ไม่มี</span>
                            @endif
                        </td>
                        <td class="border px-6 py-4">
                            <a href="{{ route('projects.publicshow', $project->id) }}"
                               class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded shadow">
                                ดูรายละเอียด
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-6 py-6 text-center text-gray-500">
                            ยังไม่มีโปรเจกต์
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-guest-layout>

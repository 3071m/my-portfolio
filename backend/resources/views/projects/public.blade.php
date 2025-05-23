<x-guest-layout>
    <h1 class="text-2xl font-bold mb-6">ผลงานทั้งหมด</h1>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border border-gray-300 text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">ชื่อโปรเจกต์</th>
                    <th class="border px-4 py-2">คำอธิบาย</th>
                    <th class="border px-4 py-2">วันที่ทำโปรเจกต์</th>
                    <th class="border px-4 py-2">ลิงก์ผลงาน</th>
                    <th class="border px-4 py-2">ดูเพิ่มเติม</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td class="border px-4 py-2">{{ $project->title }}</td>
                        <td class="border px-4 py-2">{{ Str::limit($project->description, 70) }}</td>
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
                            <a href="{{ route('projects.publicshow', $project->id) }}"
                               class="inline-block bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-1 rounded">
                                ดูรายละเอียด
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-2 text-center text-gray-500">
                            ยังไม่มีโปรเจกต์
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-guest-layout>

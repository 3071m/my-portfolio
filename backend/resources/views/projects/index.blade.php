@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">รายการโปรเจกต์</h1>
    <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ สร้างโปรเจกต์ใหม่</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
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
                        <a href="{{ route('projects.show', $project->id) }}" class="text-blue-500">ดู</a> |
                        <a href="{{ route('projects.edit', $project->id) }}" class="text-yellow-500">แก้ไข</a> |
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('ลบโปรเจกต์นี้?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('รายละเอียดโปรเจกต์') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>
                <p class="mb-6">{{ $project->description }}</p>

                <!-- ตัวอย่างเพิ่มข้อมูลอื่นๆ เช่น วันที่สร้าง -->

                <a href="{{ route('projects.index') }}" 
                   class="mt-6 inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                   กลับไปหน้ารายการโปรเจกต์
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

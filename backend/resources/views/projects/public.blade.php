@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">ผลงานทั้งหมด</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach ($projects as $project)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-xl font-semibold">{{ $project->title }}</h2>
                <p>{{ $project->description }}</p>
            </div>
        @endforeach
    </div>
@endsection

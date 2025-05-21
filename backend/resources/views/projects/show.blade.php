@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>

    @if($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" class="w-64 mb-4 rounded">
    @endif

    <p class="mb-4">{{ $project->description }}</p>

    <a href="{{ route('projects.index') }}" class="text-blue-600 underline">← Back to list</a>
</div>
@endsection

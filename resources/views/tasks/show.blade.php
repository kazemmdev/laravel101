@extends('layouts.app')

@section('title', $task->title)

@section('content')
   <h1 class="text-xl font-bold mb-2">{{ $task->title }}</h1>
   <div class="text-slate-600 text-sm pb-4">
      <span>Due To: </span><em>{{ $task->expired_at }}</em>
   </div>
   <p class="text-gray-800">{{ $task->description }}</p>

@endsection

@extends('layouts.app')

@section('title', $task->title)

@section('content')
   <h1 class="text-xl font-bold mb-2">{{ $task->title }}</h1>
   @if($task->expired_at)
      <div class="text-slate-600 text-sm pb-4">
         <span>Due To: </span><em>{{ $task->expired_at }}</em>
      </div>
   @endif
   <p class="text-gray-800 mb-4">{{ $task->description }}</p>
   <div class="flex space-x-1" id="tags-select-list">
      @foreach($task->tags as $tag)
          <div class="tag-select-item"><span>#</span>{{ $tag->name }}</div>
      @endforeach
  </div>
@endsection

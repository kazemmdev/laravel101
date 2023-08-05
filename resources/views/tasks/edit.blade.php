@extends('layouts.app')

@section('title', 'Update the Task')

@section('content')
   <h1 class="text-xl font-bold mb-4">Update the Task</h1>
   <form method="POST" action={{ route('tasks.update', $task->id) }} class="p-4 bg-white rounded-xl transition border border-solid border-gray-200 shadow">
      @csrf
      @method('PATCH')
      <input type="text" id="title" name="title" value="{{ old("title") ?? $task->title }}" placeholder="Title"  class="w-full p-2 outline-none bg-transparent border-b mb-1" />
      <textarea row=2 id="description" name="description" placeholder="Note"  class="w-full p-2 outline-none bg-transparent mb-6">{{ old('description') ?? $task->description }}</textarea>
      <input type="datetime-local" id="expired_at" name="expired_at" value="{{ old("expired_at") ?? $task->expired_at }}" placeholder="expired_at" class="w-full p-2 outline-none bg-transparent mb-1" />
      <div class="flex items-start justify-between">
         <ul class="text-sm text-red-500 pt-2 font-medium">
            @foreach ($errors->all() as $key => $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
         <div class="flex items-center space-x-2 justify-end"> 
            <a href={{ route('tasks.index') }} class="w-20 py-2 p-2  bg-gray-50 hover:bg-gray-100 transition-all text-black text-center rounded-xl">Return</a>
            <button type="submit" class="w-20  p-2 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 transition-all text-white rounded-xl">Save</button>
         </div>
      </div>
   </form>
@endsection

@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
   <div class="flex flex-center justify-between mb-4">
      <h1 class="text-xl font-bold ">My Tasks</h1>
      <a href="{{ route('tasks.create') }}" class="w-30 p-2 text-sm bg-green-600 hover:bg-green-700 active:bg-green-800 transition-all text-white rounded-xl">Add New</a>
   </div>
   <ul class="flex flex-col gap-2">
      @foreach(auth()->user()->tasks as $task)
         <li class="border py-4 px-5 rounded-xl flex items-center justify-between hover:bg-slate-100 hover:border-gray-200 transition-all">
            <p class="cursor-pointer">{{ $task->title }}</p>
            <div class="flex space-x-4">
               <a href={{ route('tasks.edit', $task->id) }}><x-untitledui-edit-05 class="w-6 h-6 text-gray-500 cursor-pointer hover:text-green-500"/></a>
               <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit">
                     <x-untitledui-trash class="w-6 h-6 text-gray-500 cursor-pointer hover:text-red-500"/>
                  </button>
               </form>
            </div>
         </li>
      @endforeach
   </ul>
@endsection
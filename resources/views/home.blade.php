@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
   <h1 class="text-xl font-bold mb-4">My Tasks</h1>

   <ul class="flex flex-col gap-2">
      @foreach($tasks as $task)
         <li class="border py-4 px-5 rounded-xl flex items-center justify-between hover:bg-slate-100 hover:border-gray-200 transition-all">
            <p class="cursor-pointer">{{ $task->title }}</p>
            <div class="flex space-x-4">
               <x-untitledui-edit-05 class="w-6 h-6 text-gray-500 cursor-pointer hover:text-green-500"/>
               <x-untitledui-trash class="w-6 h-6 text-gray-500 hover:text-red-500"/>
            </div>
         </li>
      @endforeach
   </ul>
@endsection
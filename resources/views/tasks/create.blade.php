@extends('layouts.app')

@section('title', 'Add a new Task')

@section('content')
   <h1 class="text-xl font-bold mb-4">Add a new Task</h1>
   <form method="POST" action="tasks" class="p-4 bg-white rounded-xl transition border border-solid border-gray-200 shadow">
      @csrf
      <input type="text" id="title" name="title" placeholder="Add title..." class="w-full p-2 outline-none bg-transparent mb-6" />
      <div class="flex items-center space-x-2 justify-end"> 
         <a href={{ route('tasks.all') }} class="w-20 py-2 p-2  bg-gray-50 hover:bg-gray-100 transition-all text-black text-center rounded-xl">Return</a>
         <button type="submit" class="w-20  p-2 bg-blue-500 hover:bg-blue-600 active:bg-blue-700 transition-all text-white rounded-xl">Save</button>
      </div>
   </form>
@endsection
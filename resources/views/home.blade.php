@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
   <div class="flex flex-col flex-center justify-between mb-4">
      @if(auth()->check())
         <h1 class="text-lg font-medium">{{ __('hello', ['user' => auth()->user()->name ]) }}</h1>
      @endif
      <h1 class="text-xl font-bold mt-2">{{ __('welcome') }}</h1>
  </div>
@endsection
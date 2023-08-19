@extends('layouts.auth')

@section('title', __('register'))

@section('content')
   <h1 class="text-xl font-bold mb-4">{{__('register.intro')}}</h1>

   <form method="POST" action={{ route('register.store') }} class="form">
      @csrf
      <input type="name" id="name" name="name" value="{{ old("name") }}" 
        placeholder={{__('name')}} class="form-input" />
      <input type="email" id="email" name="email" value="{{ old("email") }}" 
        placeholder={{__('email')}} class="form-input" />
      <input type="password" id="password" name="password" value="{{ old("password") }}" 
        placeholder={{__('password')}} class="form-input" />
      
      <div class="flex items-start justify-center space-x-2 pt-2">
        <a href={{ route('login') }} class="btn-secondary flex-1">{{__('login')}}</a>
        <button type="submit" class="btn-primary flex-1">{{__('register')}}</button>
      </div>
    
      {{-- errors --}}
      @if($errors->any())
        <div class="bg-red-50 px-4 py-2 mt-2 rounded-xl">
            <ul class="text-sm text-red-500 pt-2 font-medium">
                @foreach ($errors->all() as $key => $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
   </form>
@endsection
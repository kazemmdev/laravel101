@extends('layouts.auth')

@section('title', __('login'))

@section('content')
   <h1 class="text-xl font-bold mb-4">{{__('login.intro')}}</h1>

   <form method="POST" action={{ route('login.store') }} class="form">
      @csrf
      <input type="email" id="email" name="email" value="{{ old("email") }}" 
        placeholder={{__('email')}} class="form-input" />
      <input type="password" id="password" name="password"
        placeholder={{__('password')}} class="form-input" />
      
      <div class="flex items-start justify-center space-x-2 pt-2">
        <button type="submit" class="btn-primary flex-1">{{__('login')}}</button>
        <a href={{ route('register') }} class="btn-secondary flex-1">{{__('register')}}</a>
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
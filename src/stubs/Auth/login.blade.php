@extends('layouts.auth')

@section('content')
    <div class="pt-12 font-semibold text-gray-600 text-3xl text-center">
        <span class="text-gray-500">coding</span>foundry
    </div>
    <form method="POST" action="{{ route('login') }}" class="bg-white shadow-xl rounded-lg p-6 mt-12 border-t-8 border-gray-600">
        @csrf

        <div class="w-full">
            <label for="email" class="">{{ __('E-Mail Address') }}</label>

            <div class="pt-2">
                <input id="email" type="email" class="w-full p-2 rounded border bg-gray-200 focus:outline-none focus:border-gray-500 @error('email') bg-red-100 border-red-500 @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                @error('email')
                    <span class="text-red-500 text-sm font-normal" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="pt-6 w-full">
            <label for="password" class="">{{ __('Password') }}</label>

            <div class="pt-2">
                <input id="password" type="password" class="w-full p-2 rounded border bg-gray-200 focus:outline-none focus:border-gray-500 @error('email') bg-red-100 border-red-500 @enderror" name="password" autocomplete="current-password">

                @error('password')
                    <span class="text-red-500 text-sm font-normal" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="pt-6">
            <div class="">
                <div class="">
                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-gray-600 hover:bg-gray-700 rounded text-white py-2 focus:outline-none focus:border-gray-500 border-2">
                {{ __('Login') }}
            </button>
        </div>

        <div class="pt-6 text-center text-gray-700 hover:text-gray-900">
            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
@endsection

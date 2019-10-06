@extends('layouts.auth')

@section('content')
    <div class="pt-12 font-semibold text-gray-600 text-3xl text-center">
        <span class="text-gray-500">coding</span>foundry
    </div>
    <form method="POST" action="{{ route('register') }}" class="bg-white shadow-xl rounded-lg p-6 mt-12 border-t-8 border-gray-600">
        @csrf

        <div class="w-full">
            <label for="name" class="">{{ __('Name') }}</label>

            <div class="pt-2">
                <input id="name" type="text" class="w-full p-2 rounded border bg-gray-200 focus:outline-none focus:border-gray-500 @error('name') bg-red-100 border-red-500 @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                @error('name')
                <span class="text-red-500 text-sm font-normal" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="pt-6 w-full">
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
                <input id="password" type="password" class="w-full p-2 rounded border bg-gray-200 focus:outline-none focus:border-gray-500 @error('email') bg-red-100 border-red-500 @enderror" name="password" autocomplete="new-password">

                @error('password')
                <span class="text-red-500 text-sm font-normal" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="pt-6 w-full">
            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

            <div class="pt-2">
                <input id="password-confirm" type="password" class="w-full p-2 rounded border bg-gray-200 focus:outline-none focus:border-gray-500 @error('email') bg-red-100 border-red-500 @enderror" name="password_confirmation" autocomplete="new-password">

                @error('password')
                <span class="text-red-500 text-sm font-normal" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-gray-600 hover:bg-gray-700 rounded text-white py-2 focus:outline-none focus:border-gray-500 border-2">
                {{ __('Register') }}
            </button>
        </div>
    </form>
@endsection

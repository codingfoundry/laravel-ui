@extends('layouts.auth')

@section('content')
<div class="bg-white shadow-xl rounded-lg p-6 mt-12 border-t-8 border-gray-600">
    <div class="font-semibold text-xl">{{ __('Verify Your Email Address') }}</div>

    <div class="pt-4">
        @if (session('resent'))
            <div class="" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="">{{ __('click here to request another') }}</button>.
        </form>
    </div>
</div>
@endsection

@extends('layouts.guest')

@section('title', 'Forgot Password')

@section('auth-page-content')
    <h3 class="card-title text-center mb-4">Forgot Password</h3>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        @if (session('status'))
            <p class="small text-success">{{ session('status') }}</p>
        @else
            <p class="card-description text-center">We will send you a verification email.</p>
        @endif
        <div class="form-group">
            <label>Email <span class="text-danger" title="Required">*</span></label>
            <input type="text" name="email" class="form-control p_input" placeholder="Enter your email"
                value="{{ old('email') }}" required autofocus />
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group d-flex align-items-center justify-content-between">
            <a href="{{ route('login') }}" class="forgot-pass">Back to login</a>
        </div>
        <div class="text-center">
            <button type="submit"
                class="btn btn-primary btn-block enter-btn">{{ __('Email Password Reset Link') }}</button>
        </div>
    </form>
@endsection


{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

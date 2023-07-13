@extends('layouts.guest')

@section('title', 'Reset Password')

@section('auth-page-content')
    <h3 class="card-title text-center mb-4">Create New Password</h3>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <!-- Email -->
        <input type="hidden" name="email" value="{{ $request->email }}" />

        <div class="form-group">
            <label>{{ __('Password') }}</label>
            <input type="password" name="password" class="form-control p_input" placeholder="Enter new password" required
                autocomplete="new-password" />
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label>{{ __('Confirm Password') }}</label>
            <input type="password" name="password_confirmation" class="form-control p_input"
                placeholder="Confirm new password" required autocomplete="new-password" />
            @error('password_confirmation')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Reset Password') }}</button>
        </div>
    </form>
@endsection

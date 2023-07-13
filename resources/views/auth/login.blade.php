@extends('layouts.guest')

@section('title', 'Corona Admin')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
@endsection

@section('auth-page-content')
    <h3 class="card-title text-center mb-4">Login</h3>
    <form method="POST" action="{{ route('authenticate') }}">
        @csrf

        @if (session('status'))
            <p class="small text-success">{{ session('status') }}</p>
        @endif

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control p_input" placeholder="Email" value="{{ old('email') }}"
                required autofocus autocomplete="username" />
            @error('email')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control p_input" placeholder="Password" required
                autocomplete="current-password" />
            @error('password')
                <span class="text-danger small">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="remember" /> Remember me </label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-pass">Forgot password</a>
            @endif
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn">{{ __('Login') }}</button>
        </div>
    </form>
@endsection

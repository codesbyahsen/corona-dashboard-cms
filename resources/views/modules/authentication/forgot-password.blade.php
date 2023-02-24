@extends('layout.auth-layout')

@section('title', 'Forgot Password')

@section('auth-page-content')
    <h3 class="card-title text-center mb-4">Forgot Password</h3>
    <form>
        <p class="card-description text-center">We will send you a verification email.</p>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control p_input" placeholder="Enter your email" />
        </div>
        <div class="form-group d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.login') }}" class="forgot-pass">Back to login</a>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn">Forgot Password</button>
        </div>
    </form>
@endsection

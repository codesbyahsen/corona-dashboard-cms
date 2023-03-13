@extends('admin.layout.auth')

@section('title', 'Corona Admin')

@section('extra-links')
<link rel="stylesheet" href="{{ asset('assets') }}/vendors/mdi/css/materialdesignicons.min.css">
@endsection

@section('auth-page-content')
    <h3 class="card-title text-center mb-4">Login</h3>
    <form>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control p_input" placeholder="Email" />
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control p_input" placeholder="Password" />
        </div>
        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Remember me </label>
            </div>
            <a href="{{ route('admin.forgot_password') }}" class="forgot-pass">Forgot password</a>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
        </div>
    </form>
@endsection

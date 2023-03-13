@extends('admin.layout.auth')

@section('title', 'Reset Password')

@section('auth-page-content')
    <h3 class="card-title text-center mb-4">Create New Password</h3>
    <form>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="password" class="form-control p_input" placeholder="Enter new password" />
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control p_input" placeholder="Confirm new password" />
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block enter-btn">Reset Password</button>
        </div>
    </form>
@endsection

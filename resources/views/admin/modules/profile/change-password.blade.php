@extends('admin.layout.app')

@section('title', 'Change Password')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Change Password </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav mb-3 ml-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-link btn-icon-text"><i
                                class="mdi mdi-account-edit btn-icon-prepend"></i>Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.change_password') }}" class="btn btn-secondary btn-icon-text"><i
                                class="mdi mdi-lock btn-icon-prepend"></i>Change Password</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="currentPassword">Current Password</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="currentPassword" placeholder="Enter current password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter new password" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="passwordConfirmation">Retype New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="passwordConfirmation" placeholder="Confirm you new password" />
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3">
                                <div class="col-12">
                                    <p>Password requirements:</p>

                                    <ul class="pl-1 ml-3">
                                        <li>
                                            <small>Minimum 8 characters long - the more, the better</small>
                                        </li>
                                        <li>
                                            <small>At least one lowercase character</small>
                                        </li>
                                        <li>
                                            <small>At least one number, symbol, or whitespace character</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <div class="row pt-3 pr-3">
                                <button type="button" class="btn btn-primary btn-fw">Change Password</button>
                                <button type="button" class="btn btn-outline-secondary btn-md ml-2">Discard</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

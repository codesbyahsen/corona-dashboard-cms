@extends('layout.layout')

@section('title', 'Edit Profile')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/intl-tel-input-master/build/css/intlTelInput.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit Profile </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <ul class="nav mb-3 ml-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-secondary btn-icon-text"><i
                                class="mdi mdi-account-edit btn-icon-prepend"></i>Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.change_password') }}" class="btn btn-link btn-icon-text"><i
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
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="firstName"
                                            placeholder="First name">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" id="middleName"
                                            placeholder="Middle name">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="lastName"
                                            placeholder="Last name">
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="Phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select name="" class="form-control" id="gender">
                                            <option>Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="button" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/vendors/intl-tel-input-master/build/js/intlTelInput-jquery.js') }}"></script>
    <script>
        $("#phone").intlTelInput({
            preferredCountries: ["pk","us"],
        });
    </script>
@endpush

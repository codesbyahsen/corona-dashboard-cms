@extends('admin.layout.app')

@section('title', 'Edit Profile')

@section('inject-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/intl-tel-input-master/build/css/intlTelInput.min.css') }}">
@endsection

@section('content')
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
                <ul class="nav nav-pills mb-3 ml-3" role="tablist">
                    <li class="nav-item">
                        <a href="#edit-profile" id="edit-profile-tab" class="btn-icon-text nav-link active"
                            data-toggle="pill" role="tab" aria-controls="edit-profile" aria-selected="true"><i
                                class="mdi mdi-account-edit btn-icon-prepend"></i>Edit Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="#change-password" id="change-password-tab" class="btn-icon-text nav-link"
                            data-toggle="pill" role="tab" aria-controls="change-password" aria-selected="false"><i
                                class="mdi mdi-lock btn-icon-prepend"></i>Change Password</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            @include('admin.modules.profile.profile')
                            @include('admin.modules.profile.password')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('inject-scripts')
    <script src="{{ asset('assets/vendors/intl-tel-input-master/build/js/intlTelInput-jquery.js') }}"></script>
    <script>
        $("#phone").intlTelInput({
            preferredCountries: ["pk", "us"],
        });
    </script>
@endpush

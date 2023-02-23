@extends('layout.layout')

@section('title', 'General Settings')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> General Settings </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                </ol>
            </nav>
        </div>


        <form class="forms-sample" action="#">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <span class="timestamp text-muted">Updated: 1 minute ago</span>
                            {{-- <h4 class="card-title">Default form</h4> --}}
                            {{-- <p class="card-description"> Basic form layout </p> --}}
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="companyLogo">Company Logo</label>
                                        <input type="file" name="img" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" name="company_logo" class="form-control file-upload-info"
                                                id="companyLogo" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="companyFavicon">Company Favicon</label>
                                        <input type="file" name="img" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" name="company_favicon"
                                                class="form-control file-upload-info" id="companyFavicon" disabled
                                                placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="companyName">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" id="companyName"
                                            placeholder="e.g., Microsoft" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="companyTagline">Company Tagline</label>
                                        <input type="text" class="form-control" name="company_tagline"
                                            id="companyTagline" placeholder="e.g., Be What's Next" />
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="currency">Currency</label>
                                        <input type="text" class="form-control" name="currency" id="currency"
                                            placeholder="e.g., USD" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="primaryColor">Primary Color</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <span
                                                        style="height: 18px; width: 18px; background-color: #000; border-radius: 50%;"></span>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="primary_color"
                                                id="primaryColor" placeholder="e.g., #ffffff" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="secondaryColor">Secondary Color</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <span
                                                        style="height: 18px; width: 18px; background-color: #000; border-radius: 50%;"></span>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="secondary_color"
                                                id="secondaryColor" placeholder="e.g., #ffffff" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="button" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets') }}/js/file-upload.js"></script>
@endpush

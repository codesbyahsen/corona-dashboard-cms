@extends('admin.layout.app')

@section('title', 'General Settings')
@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endsection

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

        <span class="timestamp text-muted" title="12 April 2023">Updated: 1 minute ago</span>
        <form class="forms-sample" action="#">
            <div class="row">
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label for="companyLogo" class="card-title">
                                <i class="mdi mdi-image-outline"></i> Logo
                            </label>
                            {{-- <p class="card-description"> Basic form layout </p> --}}
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="logo" width="150">
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        {{-- <label for="companyLogo">Company Logo</label> --}}
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label for="companyFavicon" class="card-title">
                                <i class="mdi mdi-image-outline"></i> Favicon
                            </label>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="favicon" width="150">
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group">
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
                            <h4 class="card-title">
                                <i class="mdi mdi-domain"></i> Company Information
                            </h4>
                            <div class="row mt-5">
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

                            <hr class="bg-dark d-none d-xl-block d-lg-block d-md-block">
                            <div class="row pt-2">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Phone" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email" />
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="street-address">Street Address</label>
                                        <input type="text" class="form-control" name="street_address"
                                            id="street-address" placeholder="Street Address" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" id="city"
                                            placeholder="City" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" name="state" id="state"
                                            placeholder="State" />
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="countries" name="country" style="width:100%">
                                            <option value="">Select</option>
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="AM">America</option>
                                            <option value="CA">Canada</option>
                                            <option value="RU">Russia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="latitude"
                                            placeholder="Latitude" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" class="form-control" name="longitude" id="longitude"
                                            placeholder="Longitude" />
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="timezone">Timezone</label>
                                        <select class="countries" name="timezone" style="width:100%">
                                            <option value="">Select</option>
                                            <option value="">(GMT-08:00) Pacific Time (US & Canada)</option>
                                            <option value="">UTC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <i class="mdi mdi-palette"></i> Color Scheme
                            </h4>
                            <div class="row mt-5">
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
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-3 pr-3">
                        <button type="button" class="btn btn-primary btn-icon-text ml-auto">
                            <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('injected-scripts')
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush

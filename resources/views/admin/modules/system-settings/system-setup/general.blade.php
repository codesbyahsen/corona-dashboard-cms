@extends('admin.layout.app')

@section('title', 'General Settings')
@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> System Setup </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">General</li>
                </ol>
            </nav>
        </div>

        <x-system-setup-navigation />

        @isset($generalSetting?->created_at)
            <span class="timestamp text-muted"
                title="Created: {{ $generalSetting?->created_at->format('d-M-Y') ?? '' }}">Updated:
                {{ $generalSetting?->updated_at->diffForHumans() ?? '' }}</span>
        @endisset
        <form class="forms-sample" action="{{ route('admin.general_settings.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <label for="companyLogo" class="card-title">
                                <i class="mdi mdi-image-outline"></i> Logo <span class="text-danger"
                                    title="Required">*</span>
                            </label>
                            {{-- <p class="card-description"> Basic form layout </p> --}}
                            <div class="row">
                                @isset($generalSetting?->logo)
                                    <div class="col-12 text-center">
                                        <img src="{{ $generalSetting?->logo }}" alt="logo" width="150">
                                    </div>
                                @endisset
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        {{-- <label for="companyLogo">Company Logo</label> --}}
                                        <input type="file" name="logo" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" name="logo" class="form-control file-upload-info"
                                                id="companyLogo" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                        @error('logo')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
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
                                <i class="mdi mdi-image-outline"></i> Favicon <span class="text-danger"
                                    title="Required">*</span>
                            </label>
                            <div class="row">
                                @isset($generalSetting?->favicon)
                                    <div class="col-12 text-center">
                                        <img src="{{ $generalSetting?->favicon }}" alt="favicon" width="150">
                                    </div>
                                @endisset
                                <div class="col-12 mt-4">
                                    <div class="form-group">
                                        <input type="file" name="favicon" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" name="favicon" class="form-control file-upload-info"
                                                id="companyFavicon" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                            </span>
                                        </div>
                                        @error('favicon')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
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
                                        <label for="companyName">Company Name <span class="text-danger"
                                                title="Required">*</span></label>
                                        <input type="text" class="form-control" name="name" id="companyName"
                                            value="{{ old('name', $generalSetting?->name) }}"
                                            placeholder="e.g., Microsoft" />
                                        @error('name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="companyTagline">Company Tagline</label>
                                        <input type="text" class="form-control" name="tagline" id="companyTagline"
                                            value="{{ old('tagline', $generalSetting?->tagline) }}"
                                            placeholder="e.g., Be What's Next" />
                                        @error('tagline')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="bg-dark d-none d-xl-block d-lg-block d-md-block">
                            <div class="row pt-2">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Phone <span class="text-danger"
                                                title="Required">*</span></label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="{{ old('phone', $generalSetting?->phone) }}" placeholder="Phone" />
                                        @error('phone')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" name="mobile" id="mobile"
                                            value="{{ old('mobile', $generalSetting?->mobile) }}" placeholder="Mobile" />
                                        @error('mobile')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ old('email', $generalSetting?->email) }}" placeholder="Email" />
                                        @error('email')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="street-address">Street Address</label>
                                        <input type="text" class="form-control" name="street_address"
                                            value="{{ old('street_address', $generalSetting?->street_address) }}"
                                            id="street-address" placeholder="Street Address" />
                                        @error('street_address')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" id="city"
                                            value="{{ old('city', $generalSetting?->city) }}" placeholder="City" />
                                        @error('city')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" name="state" id="state"
                                            value="{{ old('state', $generalSetting?->state) }}" placeholder="State" />
                                        @error('state')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
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
                                        @error('country')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" id="latitude"
                                            value="{{ old('latitude', $generalSetting?->latitude) }}"
                                            placeholder="Latitude" />
                                        @error('latitude')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="longitude">Longitude</label>
                                        <input type="text" class="form-control" name="longitude" id="longitude"
                                            value="{{ old('longitude', $generalSetting?->longitude) }}"
                                            placeholder="Longitude" />
                                        @error('longitude')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="timezone">Timezone</label>
                                        <select class="countries" name="timezone" style="width:100%">
                                            <option value="">Select</option>
                                            @foreach ($timezones as $timezone)
                                                <option value="{{ $timezone ?? '' }}" @selected(old('timezone', $generalSetting?->timezone) === $timezone)>
                                                    {{ $timezone ?? '' }}</option>
                                            @endforeach
                                        </select>
                                        @error('timezone')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
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
                                                value="{{ old('primary_color', $generalSetting?->primary_color) }}"
                                                id="primaryColor" placeholder="e.g., #ffffff" />
                                        </div>
                                        @error('primary_color')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
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
                                                value="{{ old('secondary_color', $generalSetting?->secondary_color) }}"
                                                id="secondaryColor" placeholder="e.g., #ffffff" />
                                        </div>
                                        @error('secondary_color')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row pt-3 pr-3">
                        <button type="submit" class="btn btn-primary btn-icon-text ml-auto">
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
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <x-toastr-notification />
@endpush

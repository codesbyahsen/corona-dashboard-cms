@extends('admin.layout.app')

@section('title', 'Edit SMTP')

@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit SMTP </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.smtp') }}">Mail Configuration</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit SMTP</li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample"
                            action="{{ route('admin.smtp.update', $mailConfiguration?->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailTransport">Mail Transport <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="transport" id="mailTransport"
                                            value="{{ old('transport', $mailConfiguration?->transport) }}"
                                            placeholder="e.g., smtp">
                                        @error('transport')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailHost">Mail Host <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="host" id="mailHost"
                                            value="{{ old('host', $mailConfiguration?->host) }}"
                                            placeholder="e.g., mailhog">
                                        @error('host')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailPort">Mail Port <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="port" id="mailPort"
                                            value="{{ old('port', $mailConfiguration?->port) }}" placeholder="e.g., 1025">
                                        @error('port')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailEncryption">Mail Encryption <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="encryption" id="mailEncryption"
                                            value="{{ old('encryption', $mailConfiguration?->encryption) }}"
                                            placeholder="e.g., tls">
                                        @error('encryption')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailUsername">Mail Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="username" id="mailUsername"
                                            value="{{ old('username', $mailConfiguration?->username) }}"
                                            placeholder="e.g., abcd_123">
                                        @error('username')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailPassword">Mail Password <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="password" id="mailPassword"
                                            value="{{ old('password', $mailConfiguration?->password) }}"
                                            placeholder="e.g., ********">
                                        @error('password')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailFrom">Mail From</label>
                                        <input type="text" class="form-control" name="from_address" id="mailFrom"
                                            value="{{ old('from_address', $mailConfiguration?->from_address) }}"
                                            placeholder="e.g., name@example.com">
                                        @error('from_address')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailFromName">Mail From Name</label>
                                        <input type="text" class="form-control" name="from_name" id="mailFromName"
                                            value="{{ old('from_name', $mailConfiguration?->from_name) }}"
                                            placeholder="e.g., Name">
                                        @error('from_name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="submit" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('injected-scripts')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <x-toastr-notification />
@endpush

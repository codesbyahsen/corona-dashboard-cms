@extends('admin.layout.app')

@section('title', 'Edit SMTP')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit SMTP </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('smtp') }}">Mail Configuration</a></li>
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
                        <form class="forms-sample" action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailTransport">Mail Transport <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="mailTransport" value=""
                                            placeholder="e.g., smtp">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailHost">Mail Host <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="mailHost" value=""
                                            placeholder="e.g., mailhog">
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailPort">Mail Port <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="mailPort" value=""
                                            placeholder="e.g., 1025">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailEncryption">Mail Encryption <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="mailEncryption" value=""
                                            placeholder="e.g., tls">
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailUsername">Mail Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="mailUsername" value=""
                                            placeholder="e.g., abcd_123">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailPassword">Mail Password <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="mailPassword" value=""
                                            placeholder="e.g., ********">
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailFrom">Mail From</label>
                                        <input type="text" class="form-control" id="mailFrom" value=""
                                            placeholder="e.g., name@example.com">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="mailFromName">Mail From Name</label>
                                        <input type="text" class="form-control" id="mailFromName" value=""
                                            placeholder="e.g., Name">
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

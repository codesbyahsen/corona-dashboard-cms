@extends('admin.layout.app')

@section('title', 'Show Mail Configuration')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Show Mail Configuration </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.smtp') }}">Mail Configurations</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show Mail Configuration</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.smtp') }}" title="Back" class="mb-3">
                                <i class="mdi mdi-arrow-left"></i>
                            </a>
                            <span class="timestamp text-muted">Created:
                                {{ $mailConfiguration?->created_at->diffForHumans() ?? '' }}</span>
                        </div>
                        <div class="py-3 d-flex justify-content-between">
                            <a href="{{ route('admin.smtp.edit', encrypt($mailConfiguration?->id)) }}" class="btn btn-dark btn-icon-text"
                                title="Edit">
                                <i class="mdi mdi-square-edit-outline btn-icon-append"></i>
                            </a>

                            <form action="{{ route('admin.smtp.update.status', $mailConfiguration?->id) }}" method="POST" title="{{ $mailConfiguration?->is_active == config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') ? 'Click to disable' : 'Click to active' }}">
                                @csrf @method('PATCH')
                                <input type="text" name="status" value="{{ $mailConfiguration?->is_active == config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') ? config('constants.MAIL_CONFIGURATION_STATUS_INACTIVE') : config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') }}" hidden />
                                <button type="submit" style="border: none; background: none;">
                                    <span class="badge rounded-pill {{ $mailConfiguration?->is_active == true ? 'btn-inverse-success' : 'btn-inverse-danger' }}">
                                        {{ $mailConfiguration?->is_active == true ? 'Active' : 'Disabled' }}
                                    </span>
                                </button>
                            </form>
                        </div>

                        <div class="row pt-4">
                            <div class="col-md-4">
                                <label for="mailTransport" class="font-weight-light d-block">Mail Transport:</label>
                                <p id="mailTransport">{{ $mailConfiguration?->transport ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="mailHost" class="font-weight-light d-block">Mail Host:</label>
                                <p id="mailHost">{{ $mailConfiguration?->host ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="mailPort" class="font-weight-light d-block">Mail Port:</label>
                                <p id="mailPort">{{ $mailConfiguration?->port ?? '' }}</p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-4">
                                <label for="mailEncryption" class="font-weight-light d-block">Mail Encryption:</label>
                                <p id="mailEncryption">{{ $mailConfiguration?->encryption ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="mailUsername" class="font-weight-light d-block">Mail Username:</label>
                                <p id="mailUsername">{{ $mailConfiguration?->username ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="mailPassword" class="font-weight-light d-block">Mail Password:</label>
                                <p id="mailPassword">{{ $mailConfiguration?->password ?? '' }}</p>
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-md-4">
                                <label for="mailFrom" class="font-weight-light d-block">Mail From:</label>
                                <p id="mailFrom">{{ $mailConfiguration?->from_address ?? '' }}</p>
                            </div>
                            <div class="col-md-4">
                                <label for="mailFromName" class="font-weight-light d-block">Mail From Name:</label>
                                <p id="mailFromName">{{ $mailConfiguration?->from_name ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

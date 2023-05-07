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
                            <a href="{{ url()->previous() }}" title="Back" class="mb-3">
                                <i class="mdi mdi-arrow-left"></i>
                              </a>
                            <span class="timestamp text-muted" title="Created: {{ $mailConfiguration?->created_at->format('d-M-Y') }}">Updated: {{ $mailConfiguration?->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="row pt-3">
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

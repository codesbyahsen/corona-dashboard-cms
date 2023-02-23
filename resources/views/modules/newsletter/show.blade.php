@extends('layout.layout')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Show Mail </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                    <li class="breadcrumb-item"><a href="{{ route('newsletter.mails') }}">Mails</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show Mail</li>
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
                            <span class="timestamp text-muted">Sent: 1 minute ago</span>
                        </div>
                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="subject" class="font-weight-light d-block">Subject:</label>
                                <p id="subject">This is the mail subject.</p>
                            </div>
                            <div class="col-12 pt-2">
                                <label for="message" class="font-weight-light d-block">Message:</label>
                                <p id="message">Here is the mail detailed message.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

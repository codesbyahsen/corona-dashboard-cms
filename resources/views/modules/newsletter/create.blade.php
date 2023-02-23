@extends('layout.layout')

@section('title', 'Create Mail')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Create Mail </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                    <li class="breadcrumb-item"><a href="{{ route('newsletter.mails') }}">Mails</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Mail</li>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="subject">Subject <span class="text-danger">*</span></label>
                                        <input type="text" name="subject" class="form-control" id="subject"
                                            placeholder="Subject">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">Message <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="message" rows="4" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="button" title="Send" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-send btn-icon-prepend"></i> Send </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

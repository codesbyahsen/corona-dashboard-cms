@extends('admin.layout.app')

@section('title', 'Show Contact Query')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Show Contact Query </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contact_queries') }}">Contact Queries</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show Contact Query</li>
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
                            <span class="timestamp text-muted">Created: 1 minute ago</span>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-4">
                                <label for="name" class="font-weight-light d-block">Name:</label>
                                <p id="name">Ahsan Ali Rehmani</p>
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="font-weight-light d-block">Email:</label>
                                <p id="email">headoffice@gmail.com</p>
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="font-weight-light d-block">Phone:</label>
                                <p id="phone">0334 4090444</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 pt-2">
                                <label for="subject" class="font-weight-light d-block">Subject:</label>
                                <p id="subject">Abc defgh ijkl mnop qrst uvwxyz</p>
                            </div>
                            <div class="col-12 pt-2">
                                <label for="message" class="font-weight-light d-block">Message:</label>
                                <p id="message">16-C, Block Z, Scheme No. 3, Gulshan Iqbal, Rahim Yar Khan, Punjab, Pakistan, 64200.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

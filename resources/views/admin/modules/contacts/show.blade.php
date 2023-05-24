@extends('admin.layout.app')

@section('title', 'Contact Details')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Contact Details </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.contacts') }}">Contacts</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Details</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <a href="javascript:void(0)" onclick="history.back()" title="Back" class="mb-3">
                                <i class="mdi mdi-arrow-left"></i>
                              </a>
                            <span class="timestamp text-muted" title="Created: {{ $contact?->created_at->format('d-M-Y') ?? '' }}">Updated: {{ $contact?->updated_at->diffForHumans() ?? '' }}</span>
                        </div>
                        <div class="py-2">
                            <a href="{{ route('admin.contacts.edit', encrypt($contact?->id)) }}" class="btn btn-dark btn-icon-text" title="Edit">
                                <i class="mdi mdi-square-edit-outline btn-icon-append"></i>
                            </a>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label for="name" class="font-weight-light d-block">Name:</label>
                                <p id="name">{{ $contact?->name ?? '' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="font-weight-light d-block">Email:</label>
                                <p id="email">{{ $contact?->email ?? '' }}</p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-md-6">
                                <label for="phone" class="font-weight-light d-block">Phone:</label>
                                <p id="phone">{{ $contact?->phone ?? '' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="website" class="font-weight-light d-block">Mobile:</label>
                                <p id="mobile">{{ $contact?->mobile ?? '' }}</p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-md-6 col-12">
                                <label for="address" class="font-weight-light d-block">Address:</label>
                                <p id="address">
                                    {{ $contact?->getFullAddress() ?? '' }}
                                </p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-md-6">
                                <label for="birthday" class="font-weight-light d-block">Birthday:</label>
                                <p id="birthday">{{ $contact?->birthday ?? '' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="website" class="font-weight-light d-block">Website:</label>
                                <p id="website">{{ $contact?->website ?? '' }}</p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="note" class="font-weight-light d-block">Note:</label>
                                <p id="note">{{ $contact?->note ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

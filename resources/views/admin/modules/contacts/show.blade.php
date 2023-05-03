@extends('admin.layout.app')

@section('title', 'Contact Details')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Contact Details </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('contacts') }}">Contacts</a></li>
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
                            <span class="timestamp text-muted">Created: {{ $contact->created_at->diffForHumans() ?? '' }}</span>
                        </div>
                        <div class="py-2">
                            <a href="{{ route('contacts.edit', encrypt($contact->id)) }}" class="btn btn-dark btn-icon-text" title="Edit">
                                <i class="mdi mdi-square-edit-outline btn-icon-append"></i>
                            </a>
                        </div>
                        <div class="row pt-2">
                            <div class="col-12">
                                <small class="font-weight-light text-muted">Contact Type: {{ ($contact->type == config('constants.CONTACT_TYPE_HEAD_OFFICE')) ? 'Head Office' : 'Sub Office' }}</small>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <label for="title" class="font-weight-light d-block">Title:</label>
                                <p id="title">{{ $contact->title ?? '' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="font-weight-light d-block">Email:</label>
                                <p id="email">{{ $contact->email ?? '' }}</p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-md-6">
                                <label for="phone" class="font-weight-light d-block">Phone:</label>
                                <p id="phone">{{ $contact->phone ?? '' }}</p>
                            </div>
                            <div class="col-md-6">
                                <label for="mobile" class="font-weight-light d-block">Mobile:</label>
                                <p id="mobile">{{ $contact->mobile ?? '' }}</p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="address" class="font-weight-light d-block">Address:</label>
                                <p id="address">
                                    {{ ($contact->address_line_one ?? '') . ($contact->address_line_one ? ', ' : '') . ($contact->address_line_two ?? '') . ($contact->address_line_two ? ', ' : '') . ($contact->city ?? '') . ($contact->city ? ', ' : '') . ($contact->state ?? '') . ($contact->state ? ', ' : '') . ($contact->country ?? '') . ($contact->country ? ', ' : '') . ($contact->post_code ?? '') }}.
                                </p>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="col-12">
                                <label for="map" class="font-weight-light d-block">Map:</label>
                                <p id="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56146.705319580185!2d70.26898301232497!3d28.414154513369134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39375c713b45db39%3A0x28af23c1672a0170!2sRahim%20Yar%20Khan%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1677180477570!5m2!1sen!2s" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

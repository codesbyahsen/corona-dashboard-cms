@extends('admin.layout.app')

@section('title', 'Contacts')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/borderless.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Contacts </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contacts</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-4 pr-2 float-right" title="Create new">
                    <a href="{{ route('contacts.create') }}" class="btn btn-dark" type="button">
                        <i class="mdi mdi-plus"></i>
                    </a>
                </div>
            </div>
        </div iv>
        @isset($headOffice)
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Head Office</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $headOffice->title ?? '' }}</td>
                                            <td>{{ $headOffice->phone ?? '' }}</td>
                                            <td>{{ $headOffice->email ?? '' }}</td>
                                            <td><button type="button"
                                                    class="btn btn-inverse-success btn-rounded btn-fw">Active</button></td>
                                            <td>
                                                <a href="{{ route('contacts.show', encrypt($headOffice->id ?? '')) }}"
                                                    title="View details"><i class="mdi mdi-file-eye"></i></a>
                                                    <a href="{{ route('contacts.edit', encrypt($headOffice->id ?? '')) }}"
                                                        title="Edit"><i class="mdi mdi-square-edit-outline"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endisset

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sub Offices</h4>
                        <div class="table-responsive">
                            <table class="table" id="contact_info">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->title ?? '' }}</td>
                                            <td>{{ $contact->phone ?? '' }}</td>
                                            <td>{{ $contact->email ?? '' }}</td>
                                            <td>
                                                <form action="{{ route('contacts_status.update', encrypt($contact->id)) }}"
                                                    method="POST">
                                                    @csrf @method('PUT')
                                                    <button type="submit" style="border: none; background: none;">
                                                        <span
                                                            class="badge rounded-pill {{ $contact->is_active == config('constants.CONTACT_STATUS_ACTIVE') ? 'btn-inverse-success' : 'btn-inverse-danger' }}">{{ $contact->is_active == config('constants.CONTACT_STATUS_ACTIVE') ? 'Active' : 'Disabled' }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('contacts.show', encrypt($contact->id ?? '')) }}"
                                                    title="View details"><i class="mdi mdi-file-eye"></i></a>
                                                <a href="{{ route('contacts.edit', encrypt($contact->id ?? '')) }}"
                                                    title="Edit"><i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0)"
                                                    onclick="confirmToDelete('{{ route('contacts.destroy', encrypt($contact->id)) }}')"
                                                    title="Delete"><i class="mdi mdi-delete-outline"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('extra-scripts')
    <script src="{{ asset('assets/vendors/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <x-toastr-notification />
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#contact_info').DataTable();
        });
    </script>
@endpush

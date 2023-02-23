@extends('layout.layout')

@section('title', 'Contact Information')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Contact Information </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Information</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mb-4 pr-2 float-right" title="Add new">
                    <a href="{{ route('contact_info.create') }}" class="btn btn-dark" type="button">
                        <i class="mdi mdi-plus"></i>
                    </a>
                </div>
            </div>
        </div iv>
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
                                        <td>Head Office</td>
                                        <td>009253275535</td>
                                        <td>headoffice@mail.com</td>
                                        <td><button type="button"
                                                class="btn btn-inverse-success btn-rounded btn-fw">Active</button></td>
                                        <td>
                                            <a href="#" title="View details"><i class="mdi mdi-file-eye"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                    <tr>
                                        <td>Sub Office</td>
                                        <td>009253275535</td>
                                        <td>headoffice@mail.com</td>
                                        <td><button type="button"
                                                class="btn btn-inverse-danger btn-rounded btn-fw">Disabled</button></td>
                                        <td>
                                            <a href="{{ route('contact_info.show') }}" title="View details"><i class="mdi mdi-file-eye"></i></a>
                                            <a href="{{ route('contact_info.edit') }}" title="Edit"><i class="mdi mdi-square-edit-outline"></i></a>
                                            <a href="#" title="Delete"><i class="mdi mdi-delete-outline"></i></a>
                                        </td>
                                    </tr>
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
    <script>
        $(document).ready(function() {
            $('#contact_info').DataTable();
        });
    </script>
@endpush

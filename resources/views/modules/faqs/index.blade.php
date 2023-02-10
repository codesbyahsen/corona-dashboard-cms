@extends('layout.layout')

@section('title', 'FAQs')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> FAQs </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-4 pr-2 float-right" title="Add new">
                    <a href="#" class="btn btn-dark" type="button">
                        <i class="mdi mdi-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">FAQs</h4> --}}
                        <div class="table-responsive">
                            <table class="table" id="contact_queries">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>What is what?</td>
                                        <td>
                                            Here is the answer.
                                        </td>
                                        <td><button type="button"
                                                class="btn btn-inverse-success btn-rounded btn-fw">Active</button></td>
                                        <td>
                                            <a href="#" title="View details"><i class="mdi mdi-file-eye"></i></a>
                                            <a href="#" title="Edit"><i class="mdi mdi-square-edit-outline"></i></a>
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
            $('#contact_queries').DataTable();
        });
    </script>
@endpush

@extends('admin.layout.app')

@section('title', 'Contact Queries')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Contact Queries </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Queries</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Contact Queries</h4> --}}
                        <div class="table-responsive">
                            <table class="table" id="contact_queries">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ali</td>
                                        <td><a href="mailto:example@gmail.com">example@gmail.com</a></td>
                                        <td>abc</td>
                                        <td>
                                            <a href="{{ route('contact_queries.show') }}" title="View details"><i class="mdi mdi-file-eye"></i></a>
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

@extends('admin.layout.app')

@section('title', 'Newsletter')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Newsletter </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                    <li class="breadcrumb-item active" aria-current="page">Mails</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('newsletter.create') }}" class="btn btn-outline-secondary btn-icon-text mb-4 pr-2 float-right">
                    <i class="mdi mdi-pencil btn-icon-prepend"></i> Compose </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mails</h4>
                        <div class="table-responsive">
                            <table class="table" id="mails">
                                <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>abc</td>
                                        <td>This is the newsletter message...</td>
                                        <td>
                                            <a href="{{ route('newsletter.show') }}" title="View details"><i class="mdi mdi-file-eye"></i></a>
                                            <a href="{{ route('newsletter.edit') }}" title="Edit & resend"><i class="mdi mdi-share"></i></a>
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
            $('#mails').DataTable();
        });
    </script>
@endpush

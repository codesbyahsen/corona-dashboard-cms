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
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Newsletter</li>
                    <li class="breadcrumb-item active" aria-current="page">Subscribers</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Subscribers</h4>
                        <div class="table-responsive">
                            <table class="table" id="subscribers">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th class="text-right">Subscribed At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>abc@gmail.com</td>
                                        <td class="text-right">1 month ago</td>
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
            $('#subscribers').DataTable();
        });
    </script>
@endpush

@extends('admin.layout.app')

@section('title', 'Contacts')

@section('injected-links')
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
                    <a href="{{ route('admin.contacts.create') }}" class="btn btn-dark" type="button">
                        <i class="mdi mdi-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contacts</h4>
                        <div class="table-responsive">
                            <table class="table" id="contacts">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact?->name ?? '' }}</td>
                                            <td>{{ $contact?->phone ?? '' }}</td>
                                            <td>{{ $contact?->email ?? '' }}</td>
                                            <td>
                                                <a href="{{ route('admin.contacts.show', encrypt($contact->id ?? '')) }}"
                                                    title="View details"><i class="mdi mdi-file-eye"></i></a>
                                                <a href="{{ route('admin.contacts.edit', encrypt($contact->id ?? '')) }}"
                                                    title="Edit"><i class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0)"
                                                    onclick="confirmToDelete('{{ route('admin.contacts.destroy', $contact?->id) }}')"
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

@push('injected-scripts')
    <script src="{{ asset('assets/vendors/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <x-toastr-notification />
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#contacts').DataTable();
        });
    </script>
@endpush

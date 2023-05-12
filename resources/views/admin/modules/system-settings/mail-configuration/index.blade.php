@extends('admin.layout.app')

@section('title', 'Mail Configuration')

@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/borderless.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Mail Configuration </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Mail Configuration</li>
                </ol>
            </nav>
        </div>

        <x-system-setup-navigation />

        <div class="row">
            <div class="col-12">
                <div class="mb-4 pr-2 float-right" title="Add new">
                    <a href="{{ route('admin.smtp.create') }}" class="btn btn-dark" type="button">
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
                                        <th>Mail Host</th>
                                        <th>Username</th>
                                        <th>Mail From</th>
                                        <th>Port</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mailConfigurations as $mail)
                                        <tr>
                                            <td>{{ $mail?->host ?? '' }}</td>
                                            <td>{{ $mail?->username ?? '' }}</td>
                                            <td>{{ $mail?->from_address ?? '' }}</td>
                                            <td>{{ $mail?->port ?? '' }}</td>
                                            <td>
                                                <form action="{{ route('admin.smtp.update.status', $mail?->id) }}" method="POST" title="{{ $mail?->is_active == config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') ? 'Click to disable' : 'Click to active' }}">
                                                    @csrf @method('PATCH')
                                                    <input type="text" name="status" value="{{ $mail?->is_active == config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') ? config('constants.MAIL_CONFIGURATION_STATUS_INACTIVE') : config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') }}" hidden />
                                                    <button type="submit" style="border: none; background: none;">
                                                        <span class="badge rounded-pill {{ $mail?->is_active == config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') ? 'btn-inverse-success' : 'btn-inverse-danger' }}">
                                                            {{ $mail?->is_active == config('constants.MAIL_CONFIGURATION_STATUS_ACTIVE') ? 'Active' : 'Disabled' }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.smtp.show', encrypt($mail?->id)) }}" title="View details"><i
                                                        class="mdi mdi-file-eye"></i></a>
                                                <a href="{{ route('admin.smtp.edit', encrypt($mail?->id)) }}" title="Edit"><i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0)" title="Delete" onclick="confirmToDelete('{{ route('admin.smtp.destroy', $mail?->id) }}')"><i class="mdi mdi-delete-outline"></i></a>
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
            $('#contact_queries').DataTable();
        });
    </script>
@endpush

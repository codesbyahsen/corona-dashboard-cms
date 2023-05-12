@extends('admin.layout.app')

@section('title', 'FAQs')

@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/borderless.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> FAQs </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQs</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-4 pr-2 float-right" title="Add new">
                    <a href="{{ route('admin.faqs.create') }}" class="btn btn-dark" type="button">
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
                            <table class="table" id="faqs">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Question</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                        <tr>
                                            <td>
                                                {{ $faq?->faqCategory?->name ?? '' }}
                                            </td>
                                            <td>{{ Str::limit($faq?->question, 25, '...') }}</td>
                                            <td>
                                                <form action="{{ route('admin.faqs.update.status', $faq?->id) }}"
                                                    method="POST"
                                                    title="{{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? 'Click to disable' : 'Click to active' }}">
                                                    @csrf @method('PATCH')
                                                    <input type="text" name="status"
                                                        value="{{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? config('constants.MAIL_CONFIGURATION_STATUS_INACTIVE') : config('constants.FAQ_STATUS_ACTIVE') }}"
                                                        hidden />
                                                    <button type="submit" style="border: none; background: none;">
                                                        <span
                                                            class="badge rounded-pill {{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? 'btn-inverse-success' : 'btn-inverse-danger' }}">
                                                            {{ $faq?->is_active == config('constants.FAQ_STATUS_ACTIVE') ? 'Active' : 'Disabled' }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.faqs.show', encrypt($faq?->id)) }}" title="View details"><i
                                                        class="mdi mdi-file-eye"></i></a>
                                                <a href="{{ route('admin.faqs.edit', encrypt($faq?->id)) }}" title="Edit"><i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0)"
                                                    onclick="confirmToDelete('{{ route('admin.faqs.destroy', $faq?->id) }}')"
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
            $('#faqs').DataTable();
        });
    </script>
@endpush

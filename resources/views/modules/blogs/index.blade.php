@extends('layout.layout')

@section('title', 'Blogs')

@section('extra-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/borderless.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Blogs </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-4 pr-2 float-right" title="Add new">
                    <a href="{{ route('blogs.create') }}" class="btn btn-dark" type="button">
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
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Heading</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('uploads/blog/main-image') . '/' . $blog->image }}"
                                                    alt="">
                                            </td>
                                            <td>
                                                {{ $blog->title ?? '' }}</td>
                                            <td>{{ $blog->heading ?? '' }}</td>
                                            <td>
                                                <form action="{{ route('blogs_status.update', encrypt($blog->id)) }}"
                                                    method="POST">
                                                    @csrf @method('PUT')
                                                    <button type="submit" style="border: none; background: none;">
                                                        <span
                                                            class="badge rounded-pill {{ $blog->is_active == config('constants.BLOG_STATUS_ACTIVE') ? 'btn-inverse-success' : 'btn-inverse-danger' }}">{{ $blog->is_active == config('constants.BLOG_STATUS_ACTIVE') ? 'Active' : 'Disabled' }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('blogs.show', encrypt($blog->id)) }}"
                                                    title="View details"><i class="mdi mdi-file-eye"></i></a>
                                                <a href="{{ route('blogs.edit', encrypt($blog->id)) }}" title="Edit"><i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0)"
                                                    onclick="confirmToDelete('{{ route('blogs.destroy', encrypt($blog->id)) }}')"
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
    <x-sweet-alert />
    <script>
        $(document).ready(function() {
            $('#faqs').DataTable();
        });
    </script>
@endpush

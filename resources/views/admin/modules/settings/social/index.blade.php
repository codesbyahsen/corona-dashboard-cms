@extends('admin.layout.app')

@section('title', 'Social Links')

@section('inject-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/borderless.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-toast/jquery.toast.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Social Links </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Social Links</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="mb-4 pr-2 float-right" title="Add new">
                    <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#createSocialLink">
                        <i class="mdi mdi-plus"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- error alert --}}
        <div class="alert alert-danger fade" role="alert">
            <strong class="error"></strong>
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- Create Social Link Modal -->
    <div class="modal fade" id="createSocialLink" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="createSocialLinkLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSocialLinkLabel">Create Social Link</h5>
                    <button type="button" class="close cancel-create-form" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.social-links.store') }}">
                        <div class="row pt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="socialName">Name</label>
                                    <select class="dropdown-select-single field-name" name="name" id="socialName"
                                        style="width:100%">
                                        <option value="">Select</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="linkedin">Linkedin</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="discord">Discord</option>
                                        <option value="reddit">Reddit</option>
                                        <option value="github">Github</option>
                                        <option value="tumblr">Tumblr</option>
                                        <option value="behance">Behance</option>
                                        <option value="dribbble">Dribbble</option>
                                        <option value="pinterest">Pinterest</option>
                                        <option value="snapchat">Snapchat</option>
                                        <option value="youtube">YouTube</option>
                                        <option value="vimeo">Vimeo</option>
                                    </select>
                                    <span class="text-danger small error-name"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control field-link" name="link"
                                        value="{{ old('link') }}" placeholder="Link" />
                                    <span class="text-danger small error-link"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-1 pr-3 float-right">
                            <button type="button" class="btn btn-secondary cancel-create-form"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="ml-2 btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Social Link Modal -->
    {{-- @foreach ($socialLinks as $socialLink) --}}
    <div class="modal fade" id="editSocialLink" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="editSocialLinkLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSocialLinkLabel">Edit Social Link</h5>
                    <button type="button" class="close cancel-create-form" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample">
                        <div class="row pt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <select class="dropdown-select-single field-name" name="name" style="width:100%">
                                        <option value="">Select</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="linkedin">Linkedin</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="discord">Discord</option>
                                        <option value="reddit">Reddit</option>
                                        <option value="github">Github</option>
                                        <option value="tumblr">Tumblr</option>
                                        <option value="behance">Behance</option>
                                        <option value="dribbble">Dribbble</option>
                                        <option value="pinterest">Pinterest</option>
                                        <option value="snapchat">Snapchat</option>
                                        <option value="youtube">YouTube</option>
                                        <option value="vimeo">Vimeo</option>
                                    </select>
                                    <span class="text-danger small error-name"></span>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="socialLink">Link</label>
                                    <input type="text" class="form-control field-link" name="link"
                                        placeholder="Link" />
                                    <span class="text-danger small error-link"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row p-1 pr-3 float-right">
                            <button type="button" class="btn btn-secondary cancel-create-form"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="ml-2 btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@endsection

@push('inject-scripts')
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-toast/jquery.toast.min.js') }}"></script>

    <script src="{{ asset('assets/js/modules/social-link.js') }}"></script>
    <script src="{{ asset('assets/js/helper.js') }}"></script>
@endpush

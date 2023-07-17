@extends('admin.layout.app')

@section('title', 'Social Links')

@section('inject-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/borderless.min.css') }}">
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

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">FAQs</h4> --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($socialLinks as $socialLink)
                                        <tr>
                                            <td>
                                                @isset($socialLink?->name)
                                                    <span class="pr-2"><i
                                                            class="mdi mdi-{{ $socialLink?->getAttributes()['name'] == 'github' ? $socialLink?->getAttributes()['name'] . '-circle' : $socialLink?->getAttributes()['name'] ?? '' }}"></i></span>
                                                @endisset
                                                {{ $socialLink?->name ?? '' }}
                                            </td>
                                            <td>{{ $socialLink?->link ?? '' }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.social_links.update.status', $socialLink->id) }}"
                                                    method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="text" name="status"
                                                        value="{{ $socialLink->is_active == config('constants.SOCIAL_LINK_STATUS_ACTIVE') ? config('constants.SOCIAL_LINK_STATUS_INACTIVE') : config('constants.SOCIAL_LINK_STATUS_ACTIVE') }}"
                                                        hidden />
                                                    <button type="submit" style="border: none; background: none;">
                                                        <span
                                                            class="badge rounded-pill {{ $socialLink->is_active == config('constants.SOCIAL_LINK_STATUS_ACTIVE') ? 'btn-inverse-success' : 'btn-inverse-danger' }}">{{ $socialLink->is_active == config('constants.SOCIAL_LINK_STATUS_ACTIVE') ? 'Active' : 'Disabled' }}
                                                        </span>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)" title="Edit" data-toggle="modal"
                                                    data-target="#editSocialLink-{{ $socialLink?->id }}"><i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0)" title="Delete"
                                                    onclick="confirmToDelete('{{ route('admin.social_links.destroy', $socialLink?->id) }}')"><i
                                                        class="mdi mdi-delete-outline"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center pt-5" colspan="4">No social link created yet.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>





    <!-- Create Social Link Modal -->
    <div class="modal fade" id="createSocialLink" tabindex="-1" role="dialog" aria-labelledby="createSocialLinkLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSocialLinkLabel">Create Social Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.social_links.store') }}" method="POST">
                        @csrf
                        <div class="row pt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="socialName">Name</label>
                                    <select class="dropdown-select-single" name="name" id="socialName"
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
                                    @error('name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="socialLink">Link</label>
                                    <input type="text" class="form-control" name="link" id="socialLink"
                                        value="{{ old('link') }}" placeholder="Link" />
                                    @error('link')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row p-1 pr-3 float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                onclick="cancel()">Cancel</button>
                            <button type="submit" class="ml-2 btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Social Link Modal -->
    @foreach ($socialLinks as $socialLink)
        <div class="modal fade" id="editSocialLink-{{ $socialLink?->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editSocialLinkLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSocialLinkLabel">Edit Social Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ route('admin.social_links.update', $socialLink?->id) }}"
                            method="POST">
                            @csrf @method('PUT')
                            <div class="row pt-2">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <select class="dropdown-select-single" name="name" style="width:100%">
                                            <option value="">Select</option>
                                            <option value="facebook" @selected('facebook' === $socialLink?->getAttributes()['name'])>Facebook</option>
                                            <option value="instagram" @selected('instagram' === $socialLink?->getAttributes()['name'])>Instagram</option>
                                            <option value="linkedin" @selected('linkedin' === $socialLink?->getAttributes()['name'])>Linkedin</option>
                                            <option value="twitter" @selected('twitter' === $socialLink?->getAttributes()['name'])>Twitter</option>
                                            <option value="discord" @selected('discord' === $socialLink?->getAttributes()['name'])>Discord</option>
                                            <option value="reddit" @selected('reddit' === $socialLink?->getAttributes()['name'])>Reddit</option>
                                            <option value="github" @selected('github' === $socialLink?->getAttributes()['name'])>Github</option>
                                            <option value="tumblr" @selected('tumblr' === $socialLink?->getAttributes()['name'])>Tumblr</option>
                                            <option value="behance" @selected('behance' === $socialLink?->getAttributes()['name'])>Behance</option>
                                            <option value="dribbble" @selected('dribbble' === $socialLink?->getAttributes()['name'])>Dribbble</option>
                                            <option value="pinterest" @selected('pinterest' === $socialLink?->getAttributes()['name'])>Pinterest</option>
                                            <option value="snapchat" @selected('snapchat' === $socialLink?->getAttributes()['name'])>Snapchat</option>
                                            <option value="youtube" @selected('youtube' === $socialLink?->getAttributes()['name'])>YouTube</option>
                                            <option value="vimeo" @selected('vimeo' === $socialLink?->getAttributes()['name'])>Vimeo</option>
                                        </select>
                                        @error('name')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="socialLink">Link</label>
                                        <input type="text" class="form-control" name="link" id="socialLink"
                                            value="{{ old('link', $socialLink?->link ?? '') }}" placeholder="Link" />
                                        @error('link')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row p-1 pr-3 float-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="cancel()">Cancel</button>
                                <button type="submit" class="ml-2 btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('inject-scripts')
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <x-toastr-notification />
    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        const cancel = () => {
            // var option = document.querySelector('#socialName').value = '';
            document.getElementById('socialLink').value = '';
        }
    </script>
@endpush

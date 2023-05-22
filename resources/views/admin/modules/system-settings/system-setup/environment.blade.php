@extends('admin.layout.app')

@section('title', 'Environment Settings')

@section('injected-links')
    <link rel="stylesheet" href="{{ asset('assets/vendors/toastr/toastr.min.css') }}">
@endsection

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> System Setup </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Environment</li>
                </ol>
            </nav>
        </div>

        <x-system-setup-navigation />

        @isset($environmentSetting?->created_at)
            <span class="timestamp text-muted"
                title="Created: {{ $environmentSetting?->created_at->format('d-M-Y') ?? '' }}">Updated:
                {{ $environmentSetting?->updated_at->diffForHumans() ?? '' }}</span>
        @endisset
        <form class="forms-sample" action="{{ route('admin.environment_settings.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="app-name">App Name</label>
                                        <input type="text" name="app_name" class="form-control" id="app-name"
                                            value="{{ old('app_name', $environmentSetting?->app_name) }}"
                                            placeholder="App Name" />
                                        @error('heading')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="app-debug">App Debug</label>
                                        <select class="form-control" name="app_debug" id="app-debug">
                                            <option>Select</option>
                                            <option value="1" @selected(1 === $environmentSetting?->app_debug)>True</option>
                                            <option value="0" @selected(0 === $environmentSetting?->app_debug)>False</option>
                                        </select>
                                        @error('app_debug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="app-mode">App Mode</label>
                                        <select class="form-control" name="app_mode" id="app-mode">
                                            <option>Select</option>
                                            <option value="local" @selected('local' === $environmentSetting?->app_mode)>Development</option>
                                            <option value="production" @selected('production' === $environmentSetting?->app_mode)>Live</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="app-url">App URL</label>
                                        <input type="text" name="app_url" class="form-control" id="app-url"
                                            value="{{ old('app_url', $environmentSetting?->app_url) }}"
                                            placeholder="App URL" />
                                        @error('app_url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="db-connection">DB Connection</label>
                                        <input type="text" name="db_connection" class="form-control" id="db-connection"
                                            value="{{ old('db_connection', $environmentSetting?->db_connection) }}"
                                            placeholder="DB Connection" />
                                        @error('db_connection')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="db-host">DB Host</label>
                                        <input type="text" name="db_host" class="form-control" id="db-host"
                                            value="{{ old('db_host', $environmentSetting?->db_host) }}"
                                            placeholder="DB Host" />
                                        @error('db_host')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="db-port">DB Port</label>
                                        <input type="text" name="db_port" class="form-control" id="db-port"
                                            value="{{ old('db_port', $environmentSetting?->db_port) }}"
                                            placeholder="DB Port" />
                                        @error('db_port')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="db-database">DB Database</label>
                                        <input type="text" name="db_database" class="form-control" id="db-database"
                                            value="{{ old('db_database', $environmentSetting?->db_database) }}"
                                            placeholder="DB Database" />
                                        @error('db_database')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="db-username">DB Username</label>
                                        <input type="text" name="db_username" class="form-control" id="db-username"
                                            value="{{ old('db_username', $environmentSetting?->db_username) }}"
                                            placeholder="DB Username" />
                                        @error('db_username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="db-password">DB Password</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="db_password"
                                                value="{{ old('db_password', $environmentSetting?->db_password) }}"
                                                placeholder="DB Password" />
                                            <div class="input-group-append">
                                                <button type="button" title="Click to generate password"
                                                    class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#generatePassword">PW Generator</button>
                                            </div>
                                        </div>
                                        @error('db_password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="submit" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Generate Password Modal -->
    <div class="modal fade" id="generatePassword" tabindex="-1" role="dialog" aria-labelledby="generatePasswordLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="generatePasswordLabel">Password Generator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row pt-2">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="generated-password" value="" />
                                </div>
                            </div>
                        </div>

                        <div class="row p-1 pr-3 float-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="ml-2 btn btn-primary"
                                onclick="generatePassword()">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('injected-scripts')
    <script src="{{ asset('assets/vendors/toastr/toastr.min.js') }}"></script>
    <x-toastr-notification />
    <script>
        //  copy to clipboard
        $('#generated-password').click(function() {
            var copyData = $('#generated-password').val();
            navigator.clipboard.writeText(copyData);
            toastr['success']('', 'Copied to clipboard!');
        });

        //  generate random password
        function generatePassword() {
            var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            var passwordLength = 12;
            var password = "";

            for (var i = 0; i <= passwordLength; i++) {
                var randomNumber = Math.floor(Math.random() * chars.length);
                password += chars.substring(randomNumber, randomNumber + 1);
            }
            document.getElementById("generated-password").value = password;
        }
        window.onload = generatePassword();
    </script>
@endpush

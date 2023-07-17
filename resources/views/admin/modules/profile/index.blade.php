@extends('admin.layout.app')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <span class="timestamp text-muted">Updated: {{ $user?->updated_at?->diffForHumans() }}</span>
                        <div class="text-center">
                            <img src="{{ asset('assets/images/faces/profile.jpg') }}" alt="profile"
                                width="110" height="150">

                            <div for="name" class="font-weight-light pt-5">Name:</div>
                            <div>{{ $user?->fullNameShort() }}</div>

                            <div for="email" class="font-weight-light pt-3">Email:</div>
                            <div>{{ $user?->email }}</div>

                            <div for="phone" class="font-weight-light pt-3">Phone:</div>
                            <div>{{ $user?->phone }}</div>

                            <div for="gender" class="font-weight-light pt-3">Gender:</div>
                            <div>{{ $user?->gender }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

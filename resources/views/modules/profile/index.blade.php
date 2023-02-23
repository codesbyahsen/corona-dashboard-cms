@extends('layout.layout')

@section('page-content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <span class="timestamp text-muted">Updated: 1 minute ago</span>
                        <div class="text-center">
                            <img src="{{ asset('assets/images/faces/profile.jpg') }}" alt="profile"
                                width="110" height="150">

                            <div for="name" class="font-weight-light pt-5">Name:</div>
                            <div>Ahsan Ali Rehmani</div>

                            <div for="email" class="font-weight-light pt-3">Email:</div>
                            <div>superadmin@gmail.com</div>

                            <div for="phone" class="font-weight-light pt-3">Phone:</div>
                            <div>+92 334 4090444</div>

                            <div for="gender" class="font-weight-light pt-3">Gender:</div>
                            <div>Male</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

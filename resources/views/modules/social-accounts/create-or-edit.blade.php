@extends('layout.layout')

@section('title', 'Social Accounts')

@section('page-content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Social Accounts </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Social Accounts</li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="card-title">Default form</h4> --}}
                        {{-- <p class="card-description"> Basic form layout </p> --}}
                        <form class="forms-sample" action="#">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="facebook" placeholder="facebook.com/username" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="instagram" placeholder="instagram.com/username" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="linkedin" placeholder="linkedin.com/in/username" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="twitter" placeholder="twitter.com/@username" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="discord">Discord</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-discord"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="discord" placeholder="discordapp.com/users/userID" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="reddit">Reddit</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-reddit"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="reddit" placeholder="reddit.com/user/username" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="github">GitHub</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-github-circle"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="github" placeholder="github.com/username" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="tumblr">Tumblr</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-tumblr"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="tumblr" placeholder="username.tumblr.com" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="behance">Behance</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-behance"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="behance" placeholder="behance.net/username" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="dribbble">Dribbble</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-dribbble"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="dribbble" placeholder="dribbble.com/username" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="pinterest">Pinterest</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-pinterest"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="pinterest" placeholder="pinterest.com/username" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="snapchat">Snapchat</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-snapchat"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="snapchat" placeholder="snapchat.com/add/username" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="youtube">YouTube</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-youtube"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="youtube" placeholder="youtube.com/@username" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="vimeo">Vimeo</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="mdi mdi-vimeo"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="vimeo" placeholder="vimeo.com/username" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-3 pr-3">
                                <button type="button" class="btn btn-primary btn-icon-text ml-auto">
                                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

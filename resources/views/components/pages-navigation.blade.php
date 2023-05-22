<div class="row">
    <div class="col-12">
        <ul class="nav mb-3 ml-3">
            <li class="nav-item">
                <a href="{{ url()->current() == route('admin.terms') ? 'javascript:void(0);' : route('admin.terms') }}" class="btn {{ request()->routeIs('admin.terms') ? 'btn-secondary' : 'btn-link' }} btn-icon-text"><i
                        class="mdi mdi-file-document-edit-outline btn-icon-prepend"></i>Terms</a>
            </li>
            <li class="nav-item">
                <a href="{{ url()->current() == route('admin.privacy_policy') ? 'javascript:void(0);' : route('admin.privacy_policy') }}" class="btn {{ request()->routeIs('admin.privacy_policy') ? 'btn-secondary' : 'btn-link' }} btn-icon-text"><i
                        class="mdi mdi-shield btn-icon-prepend"></i>Privacy Policy</a>
            </li>
        </ul>
    </div>
</div>

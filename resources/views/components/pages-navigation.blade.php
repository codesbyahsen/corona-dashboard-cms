<div class="row">
    <div class="col-12">
        <ul class="nav mb-3 ml-3">
            <li class="nav-item">
                <a href="{{ url()->current() == route('admin.terms_and_conditions') ? 'javascript:void(0);' : route('admin.terms_and_conditions') }}" class="btn {{ request()->routeIs('admin.terms_and_conditions') ? 'btn-secondary' : 'btn-link' }} btn-icon-text"><i
                        class="mdi mdi-file-document-edit-outline btn-icon-prepend"></i>Terms</a>
            </li>
            <li class="nav-item">
                <a href="{{ url()->current() == route('admin.privacy_policies') ? 'javascript:void(0);' : route('admin.privacy_policies') }}" class="btn {{ request()->routeIs('admin.privacy_policies') ? 'btn-secondary' : 'btn-link' }} btn-icon-text"><i
                        class="mdi mdi-shield btn-icon-prepend"></i>Privacy</a>
            </li>
        </ul>
    </div>
</div>

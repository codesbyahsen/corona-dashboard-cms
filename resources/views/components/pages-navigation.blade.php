<div class="row mb-3">
    <div class="col-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3 border-0">
            <li class="nav-item mt-2">
                <a class="nav-link {{ request()->routeIs('admin.terms_and_conditions') ? 'active' : '' }}" href="{{ url()->current() == route('admin.terms_and_conditions') ? 'javascript:void(0);' : route('admin.terms_and_conditions') }}">Terms</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ request()->routeIs('admin.privacy_policies') ? 'active' : '' }}" href="{{ url()->current() == route('admin.privacy_policies') ? 'javascript:void(0);' : route('admin.privacy_policies') }}">Privacy</a>
            </li>
        </ul>
    </div>
</div>

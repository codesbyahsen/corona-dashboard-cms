<div class="row mb-3">
    <div class="col-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3 border-0">
            <li class="nav-item mt-2">
                <a class="nav-link {{ request()->routeIs('admin.general_settings') ? 'active' : '' }}" href="{{ url()->current() == route('admin.general_settings') ? 'javascript:void(0);' : route('admin.general_settings') }}">General</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ request()->routeIs('admin.environment_settings') ? 'active' : '' }}" href="{{ url()->current() == route('admin.environment_settings') ? 'javascript:void(0);' : route('admin.environment_settings') }}">Environment</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link {{ request()->routeIs('admin.smtp') ? 'active' : '' }}" href="{{ url()->current() == route('admin.smtp') ? 'javascript:void(0);' : route('admin.smtp') }}">Mail Configuration</a>
            </li>
        </ul>
    </div>
</div>

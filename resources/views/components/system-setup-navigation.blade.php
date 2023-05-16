<div class="row">
    <div class="col-12">
        <ul class="nav mb-3 ml-3">
            <li class="nav-item">
                <a href="{{ url()->current() == route('admin.general_settings') ? 'javascript:void(0);' : route('admin.general_settings') }}" class="btn {{ request()->routeIs('admin.general_settings') ? 'btn-secondary' : 'btn-link' }} btn-icon-text"><i
                        class="mdi mdi-cogs btn-icon-prepend"></i>General</a>
            </li>
            <li class="nav-item">
                <a href="{{ url()->current() == route('admin.environment_settings') ? 'javascript:void(0);' : route('admin.environment_settings') }}" class="btn {{ request()->routeIs('admin.environment_settings') ? 'btn-secondary' : 'btn-link' }} btn-icon-text"><i
                        class="mdi mdi-lock btn-icon-prepend"></i>Environment</a>
            </li>
            <li class="nav-item">
                <a href="{{ url()->current() == route('admin.smtp') ? 'javascript:void(0);' : route('admin.smtp') }}" class="btn {{ request()->routeIs('admin.smtp') ? 'btn-secondary' : 'btn-link' }} btn-icon-text"><i
                        class="mdi mdi-email btn-icon-prepend"></i>Mail Configuration</a>
            </li>
        </ul>
    </div>
</div>

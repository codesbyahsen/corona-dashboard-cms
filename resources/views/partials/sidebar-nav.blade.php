<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                        <span>Gold Member</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="{{ route('admin.profile') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-account-circle text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Profile</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('contact_info') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-contacts"></i>
                </span>
                <span class="menu-title">Contact Info</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('contact_queries') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-question"></i>
                </span>
                <span class="menu-title">Contact Queries</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('social_links') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-facebook"></i>
                </span>
                <span class="menu-title">Social Links</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('terms_and_conditions') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document-edit-outline"></i>
                </span>
                <span class="menu-title">Terms &amp; Conditions</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('privacy_policies') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-shield"></i>
                </span>
                <span class="menu-title">Privacy Policies</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#faq_nav" aria-expanded="false"
                aria-controls="faq_nav">
                <span class="menu-icon">
                    <i class="mdi mdi-frequently-asked-questions"></i>
                </span>
                <span class="menu-title">FAQs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="faq_nav">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="#">Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('faqs') }}">FAQs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#newsletter_nav" aria-expanded="false"
                aria-controls="newsletter_nav">
                <span class="menu-icon">
                    <i class="mdi mdi-email-open-multiple"></i>
                </span>
                <span class="menu-title">Newsletter</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="newsletter_nav">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('newsletter.subscribers') }}">Subscribers</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('newsletter.mails') }}">Mails</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('smtp') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-at"></i>
                </span>
                <span class="menu-title">Mail Configuration</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('general_settings') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-cogs"></i>
                </span>
                <span class="menu-title">General Settings</span>
            </a>
        </li>
    </ul>
</nav>

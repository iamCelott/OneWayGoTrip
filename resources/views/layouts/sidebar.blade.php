<div class="app-menu">

    <!-- App Logo -->
    <a href="/" class="logo-box">

        <!-- Light Logo -->
        <div class="logo-light">
            <img src="{{ asset('storage/images/logo/white.png') }}" class="logo-lg h-[22px]" alt="Light logo">
            <img src="{{ asset('storage/images/logo/logo.jpg') }}" class="logo-sm h-[40px]" alt="Light logo">
        </div>

        <!-- Dark Logo -->
        <div class="logo-dark">
            <img src="{{ asset('storage/images/logo/white.png') }}" class="logo-lg h-[22px]" alt="Dark logo">
            <img src="{{ asset('storage/images/logo/logo.jpg') }}" class="logo-sm h-[40px]" alt="Dark logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5 z-50">
        <span class="sr-only">Menu Toggle Button</span>
        <i class="ri-checkbox-blank-circle-line text-xl"></i>
    </button>

    <!--- Menu -->
    <div class="scrollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            <li class="menu-title">Navigation</li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-home-4-line"></i>
                    </span>
                    <span class="menu-text"> Dashboard </span>
                    <span class="badge bg-success rounded-full">2</span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="dashboard-analytics.html" class="menu-link">
                            <span class="menu-text">Analytics</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="index.html" class="menu-link">
                            <span class="menu-text">Ecommerce</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="/" class="menu-link">
                    <span class="menu-icon">
                        <i class="fal fa-ship"></i>
                    </span>
                    <span class="menu-text"> Company Profile </span>
                </a>
            </li>

            <li class="menu-title">CONTENT</li>

            <li class="menu-item">
                <a href="{{ route('trips.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fal fa-ship"></i>
                    </span>
                    <span class="menu-text"> Trip </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('packages.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fal fa-anchor"></i>
                    </span>
                    <span class="menu-text"> Package </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('trip_packages.index') }}" class="menu-link">
                    <span class="menu-icon pl-1">
                        <i class="fal fa-clipboard-list"></i>
                    </span>
                    <span class="menu-text pl-1"> Trip Package </span>
                </a>
            </li>

            <li class="menu-title">GET IN TOUCH</li>

            <li class="menu-item">
                <a href="{{ route('social_media.index') }}" class="menu-link">
                    <span class="menu-icon pl-1">
                        <i class="fal fa-hashtag"></i>
                    </span>
                    <span class="menu-text pl-1"> Social Media </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('contacts.index') }}" class="menu-link">
                    <span class="menu-icon pl-1">
                        <i class="fal fa-id-card"></i>
                    </span>
                    <span class="menu-text pl-1"> Contact </span>
                </a>
            </li>

            {{-- <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-mail-line"></i>
                    </span>
                    <span class="menu-text"> Email </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="apps-email-inbox.html" class="menu-link">
                            <span class="menu-text">Inbox</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="apps-email-read.html" class="menu-link">
                            <span class="menu-text">Read Email</span>
                        </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>

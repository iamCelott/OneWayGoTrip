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
            <li class="menu-title">COMPANY</li>

            <li class="menu-item">
                <a href="{{ route('company_profile.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fal fa-building"></i>
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
                        <i class="fal fa-clock"></i>
                    </span>
                    <span class="menu-text"> Package </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('categories.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fal fa-anchor"></i>
                    </span>
                    <span class="menu-text"> Category </span>
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

            <li class="menu-title">IMAGE MANAGEMENT</li>

            <li class="menu-item">
                <a href="{{ route('hero_backgrounds.index') }}" class="menu-link">
                    <span class="menu-icon pl-1">
                        <i class="fal fa-images"></i>
                    </span>
                    <span class="menu-text pl-1"> Hero Image </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('galleries.index') }}" class="menu-link">
                    <span class="menu-icon pl-1">
                        <i class="fal fa-camera-retro"></i>
                    </span>
                    <span class="menu-text pl-1"> Gallery </span>
                </a>
            </li>
        </ul>
    </div>
</div>

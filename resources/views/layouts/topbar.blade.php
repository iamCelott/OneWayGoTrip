<header class="app-header flex items-center px-4 gap-3.5">

    <!-- App Logo -->
    <a href="/" class="logo-box">
        <!-- Light Logo -->
        <div class="logo-light">
            <img src="{{ asset('storage/images/logo/blue.png') }}" class="logo-lg h-[22px]" alt="Light logo">
            <img src="{{ asset('storage/images/logo/logo.jpg') }}" class="logo-sm h-[40px]" alt="Light logo">
        </div>

        <!-- Dark Logo -->
        <div class="logo-dark">
            <img src="{{ asset('storage/images/logo/blue.png') }}" class="logo-lg h-[22px]" alt="Dark logo">
            <img src="{{ asset('storage/images/logo/logo.jpg') }}" class="logo-sm h-[40px]" alt="Dark logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-toggle-menu" class="nav-link p-2">
        <span class="sr-only">Menu Toggle Button</span>
        <span class="flex items-center justify-center">
            <i class="ri-menu-2-fill text-2xl"></i>
        </span>
    </button>

    <div class="relative ms-auto">
        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg py-2">
        </div>
    </div>
    
    <!-- Fullscreen Toggle Button -->
    <div class="md:flex hidden">
        <button data-toggle="fullscreen" type="button" class="nav-link p-2">
            <span class="sr-only">Fullscreen Mode</span>
            <span class="flex items-center justify-center">
                <i class="ri-fullscreen-line text-2xl"></i>
            </span>
        </button>
    </div>


    <!-- Profile Dropdown Button -->
    <div class="relative">
        <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button"
            class="nav-link flex items-center gap-2.5 px-3 bg-black/5 border-x border-black/10">
            <span class="md:flex flex-col gap-0.5 text-start hidden">
                <h5 class="text-sm">{{ Auth::user()->name }}</h5>
                <span class="text-xs">Admin</span>
            </span>
        </button>

        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-all duration-300 bg-white shadow-lg border rounded-lg py-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
            <!-- item-->
            <h6 class="flex items-center py-2 px-3 text-xs text-gray-800 dark:text-gray-400">Welcome !</h6>

            <!-- item-->
            <a href="{{ route('profile.edit') }}"
                class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-account-circle-line text-lg align-middle"></i>
                <span>My Account</span>
            </a>

            <!-- item-->
            <label for="logout"
                class="cursor-pointer flex items-center justify-start gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <i class="ri-logout-box-line text-lg align-middle"></i>
                    <button type="submit" id="logout">
                        <span>
                            {{ __('Log Out') }}
                        </span>
                    </button>
                </form>
            </label>
        </div>
    </div>
</header>

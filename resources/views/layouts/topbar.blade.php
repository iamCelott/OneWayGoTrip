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

    <!-- Topbar Search Input -->
    <div class="relative hidden lg:block">

        {{-- <form data-fc-type="dropdown" type="button">
            <input type="search" class="form-input bg-black/5 border-none ps-8 relative" placeholder="Search...">
            <span class="ri-search-line text-base z-10 absolute start-2 top-1/2 -translate-y-1/2"></span>
        </form> --}}

        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 mt-3.5 transition-all duration-300 bg-white shadow-lg border rounded-lg py-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">

            <!-- item-->
            <h5 class="flex items-center py-2 px-3 text-sm text-gray-800 dark:text-gray-400 uppercase">Found <b
                    class="text-decoration-underline">08</b> results</h5>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-file-chart-line text-base me-1"></i>
                <span>Analytics Report</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-lifebuoy-line text-base me-1"></i>
                <span>How can I help you?</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-user-settings-line text-base me-1"></i>
                <span>User profile settings</span>
            </a>

            <!-- item-->
            <h6 class="flex items-center py-2 px-3 text-sm text-gray-800 dark:text-gray-400 uppercase">Users</h6>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <img class="me-2 rounded-full h-8" src="assets/images/users/avatar-2.jpg"
                    alt="Generic placeholder image">
                <div class="flex-grow">
                    <h5 class="m-0 fs-14">Erwin Brown</h5>
                    <span class="fs-12 ">UI Designer</span>
                </div>
            </a>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <img class="me-2 rounded-full h-8" src="assets/images/users/avatar-5.jpg"
                    alt="Generic placeholder image">
                <div class="flex-grow">
                    <h5 class="m-0 fs-14">Jacob Deo</h5>
                    <span class="fs-12 ">Developer</span>
                </div>
            </a>
        </div>
    </div>

    <!-- Language Dropdown Button -->
    <div class="relative ms-auto">
        {{-- <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2 fc-dropdown">
            <span class="flex items-center gap-2">
                <img src="assets/images/flags/us.jpg" alt="flag-image" class="h-3">
                <div class="lg:block hidden">
                    <span>English</span>
                    <i class="ri-arrow-down-s-line"></i>
                </div>
            </span>
        </button> --}}


        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-40 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg py-2">
            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center gap-2.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <img src="assets/images/flags/germany.jpg" alt="user-image" class="h-4">
                <span class="align-middle">German</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center gap-2.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <img src="assets/images/flags/italy.jpg" alt="user-image" class="h-4">
                <span class="align-middle">Italian</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center gap-2.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <img src="assets/images/flags/spain.jpg" alt="user-image" class="h-4">
                <span class="align-middle">Spanish</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);"
                class="flex items-center gap-2.5 py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <img src="assets/images/flags/russia.jpg" alt="user-image" class="h-4">
                <span class="align-middle">Russian</span>
            </a>
        </div>
    </div>

    <!-- Notification Bell Button -->
    <div class="relative lg:flex hidden">
        {{-- <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2">
            <span class="sr-only">View notifications</span>
            <span class="flex items-center justify-center">
                <i class="ri-notification-3-line text-2xl"></i>
                <span class="absolute top-5 end-2.5 w-2 h-2 rounded-full bg-danger"></span>
            </span>
        </button> --}}
        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 transition-all duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg">

            <div class="p-3 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <h6 class="text-sm text-gray-500 dark:text-gray-200"> Notification</h6>
                    <a href="javascript: void(0);" class="text-gray-500 dark:text-gray-200 underline">
                        <small>Clear All</small>
                    </a>
                </div>
            </div>

            <div class="py-4 h-80" data-simplebar>

                <h5 class="text-xs text-gray-500 dark:text-gray-200 px-4 mb-2">Today</h5>

                <a href="javascript:void(0);" class="block mb-4">
                    <div
                        class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex justify-center items-center h-9 w-9 rounded-full bg text-white bg-primary">
                                    <i class="ri-message-3-line text-lg"></i>
                                </div>
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Datacorp <small class="font-normal ms-1">1 min
                                        ago</small></h5>
                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="javascript:void(0);" class="block mb-4">
                    <div
                        class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="flex justify-center items-center h-9 w-9 rounded-full bg-info text-white">
                                    <i class="ri-user-add-line text-lg"></i>
                                </div>
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Admin <small class="font-normal ms-1">1 hr
                                        ago</small></h5>
                                <small class="noti-item-subtitle text-muted">New user registered</small>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="javascript:void(0);" class="block mb-4">
                    <div
                        class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img src="assets/images/users/avatar-2.jpg" class="rounded-full h-9 w-9"
                                    alt="">
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Cristina Pride <small
                                        class="font-normal ms-1">1 day ago</small></h5>
                                <small class="noti-item-subtitle text-muted">Hi, How are you? What about our next
                                    meeting</small>
                            </div>
                        </div>
                    </div>
                </a>

                <h5 class="text-xs text-gray-500 dark:text-gray-200 px-4 mb-2">Yesterday</h5>

                <a href="javascript:void(0);" class="block mb-4">
                    <div
                        class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div
                                    class="flex justify-center items-center h-9 w-9 rounded-full bg-primary text-white">
                                    <i class="ri-discuss-line text-lg"></i>
                                </div>
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Datacorp</h5>
                                <small class="noti-item-subtitle text-muted">Caleb Flakelar commented on Admin</small>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="javascript:void(0);" class="block">
                    <div
                        class="py-2 px-3 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img src="assets/images/users/avatar-4.jpg" class="rounded-full h-9 w-9"
                                    alt="">
                            </div>
                            <div class="flex-grow truncate ms-2">
                                <h5 class="text-sm font-semibold mb-1">Karen Robinson</h5>
                                <small class="noti-item-subtitle text-muted">Wow ! this admin looks good and awesome
                                    design</small>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <a href="javascript:void(0);"
                class="p-2 border-t border-gray-200 dark:border-gray-700 block text-center text-primary underline font-semibold">
                View All
            </a>
        </div>
    </div>

    <!-- Apps Dropdown -->
    {{-- <div class="relative lg:flex hidden">
        <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link p-2">
            <span class="sr-only">Apps</span>
            <span class="flex items-center justify-center">
                <i class="ri-apps-2-line text-2xl"></i>
            </span>
        </button>
        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-80 z-50 transition-all duration-300 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
            <div class="grid grid-cols-3 gap-3">
                <a class="flex flex-col items-center justify-center gap-1.5 py-3 px-6 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="#">
                    <img src="assets/images/brands/github.png" class="h-6" alt="Github">
                    <span>GitHub</span>
                </a>

                <a class="flex flex-col items-center justify-center gap-1.5 py-3 px-6 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="#">
                    <img src="assets/images/brands/bitbucket.png" class="h-6" alt="bitbucket">
                    <span>Bitbucket</span>
                </a>

                <a class="flex flex-col items-center justify-center gap-1.5 py-3 px-6 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="#">
                    <img src="assets/images/brands/dropbox.png" class="h-6" alt="dropbox">
                    <span>Dropbox</span>
                </a>

                <a class="flex flex-col items-center justify-center gap-1.5 py-3 px-6 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="#">
                    <img src="assets/images/brands/slack.png" class="h-6" alt="slack">
                    <span>Slack</span>
                </a>

                <a class="flex flex-col items-center justify-center gap-1.5 py-3 px-6 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="#">
                    <img src="assets/images/brands/dribbble.png" class="h-6" alt="dribbble">
                    <span>Dribbble</span>
                </a>

                <a class="flex flex-col items-center justify-center gap-1.5 py-3 px-6 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="#">
                    <img src="assets/images/brands/behance.png" class="h-6" alt="Behance">
                    <span>Behance</span>
                </a>
            </div>
        </div>
    </div> --}}

    <!-- Theme Setting Button -->
    {{-- <div class="flex">
        <button data-fc-type="offcanvas" data-fc-target="theme-customization" type="button" class="nav-link p-2">
            <span class="sr-only">Customization</span>
            <span class="flex items-center justify-center">
                <i class="ri-settings-3-line text-2xl"></i>
            </span>
        </button>
    </div> --}}

    <!-- Light/Dark Toggle Button -->
    {{-- <div class="lg:flex hidden">
        <button id="light-dark-mode" type="button" class="nav-link p-2">
            <span class="sr-only">Light/Dark Mode</span>
            <span class="flex items-center justify-center">
                <i class="ri-moon-line text-2xl block dark:hidden"></i>
                <i class="ri-sun-line text-2xl hidden dark:block"></i>
            </span>
        </button>
    </div> --}}

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
            <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-full h-8">
            <span class="md:flex flex-col gap-0.5 text-start hidden">
                <h5 class="text-sm">Tosha Minner</h5>
                <span class="text-xs">Founder</span>
            </span>
        </button>

        <div
            class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-all duration-300 bg-white shadow-lg border rounded-lg py-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
            <!-- item-->
            <h6 class="flex items-center py-2 px-3 text-xs text-gray-800 dark:text-gray-400">Welcome !</h6>

            <!-- item-->
            <a href="pages-profile.html"
                class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-account-circle-line text-lg align-middle"></i>
                <span>My Account</span>
            </a>

            <!-- item-->
            <a href="pages-profile.html"
                class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-settings-4-line text-lg align-middle"></i>
                <span>Settings</span>
            </a>

            <!-- item-->
            <a href="pages-faqs.html"
                class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-customer-service-2-line text-lg align-middle"></i>
                <span>Support</span>
            </a>

            <!-- item-->
            <a href="auth-lock-screen.html"
                class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-lock-password-line text-lg align-middle"></i>
                <span>Lock Screen</span>
            </a>

            <!-- item-->
            <a href="auth-logout-2.html"
                class="flex items-center gap-2 py-1.5 px-4 text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300">
                <i class="ri-logout-box-line text-lg align-middle"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>
</header>

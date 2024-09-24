<div class="app-menu">

    <!-- App Logo -->
    <a href="index.html" class="logo-box">
        <!-- Light Logo -->
        <div class="logo-light">
            <img src="assets/images/logo.png" class="logo-lg h-[22px]" alt="Light logo">
            <img src="assets/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
        </div>

        <!-- Dark Logo -->
        <div class="logo-dark">
            <img src="assets/images/logo-dark.png" class="logo-lg h-[22px]" alt="Dark logo">
            <img src="assets/images/logo-sm.png" class="logo-sm h-[22px]" alt="Small logo">
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

            <li class="menu-title">Apps</li>

            <li class="menu-item">
                <a href="apps-calendar.html" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-calendar-event-line"></i>
                    </span>
                    <span class="menu-text"> Calendar </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="apps-chat.html" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-message-3-line"></i>
                    </span>
                    <span class="menu-text"> Chat </span>
                </a>
            </li>

            <li class="menu-item">
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
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-task-line"></i>
                    </span>
                    <span class="menu-text"> Tasks </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="apps-tasks-list.html" class="menu-link">
                            <span class="menu-text">List</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="apps-tasks-details.html" class="menu-link">
                            <span class="menu-text">Details</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="apps-kanban.html" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-list-check-3"></i>
                    </span>
                    <span class="menu-text">Kanban Board</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="apps-file-manager.html" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-folder-2-line"></i>
                    </span>
                    <span class="menu-text"> File Manager </span>
                </a>
            </li>

            <li class="menu-title">Custom</li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="ri-pages-line"></i></span>
                    <span class="menu-text"> Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="pages-starter.html" class="menu-link">
                            <span class="menu-text">Starter</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-profile.html" class="menu-link">
                            <span class="menu-text">Profile</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-timeline.html" class="menu-link">
                            <span class="menu-text">Timeline</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-invoice.html" class="menu-link">
                            <span class="menu-text">Invoice</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-faqs.html" class="menu-link">
                            <span class="menu-text">FAQs</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-pricing.html" class="menu-link">
                            <span class="menu-text">Pricing</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="pages-maintenance.html" class="menu-link">
                            <span class="menu-text">Maintenance</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-shield-user-line"></i>
                    </span>
                    <span class="menu-text"> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="auth-login.html" class="menu-link">
                            <span class="menu-text">Login</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-login-2.html" class="menu-link">
                            <span class="menu-text">Login 2</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-register.html" class="menu-link">
                            <span class="menu-text">Register</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-register-2.html" class="menu-link">
                            <span class="menu-text">Register 2</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-logout.html" class="menu-link">
                            <span class="menu-text">Logout</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-logout-2.html" class="menu-link">
                            <span class="menu-text">Logout 2</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-recoverpw.html" class="menu-link">
                            <span class="menu-text">Recover Password</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-recoverpw-2.html" class="menu-link">
                            <span class="menu-text">Recover Password 2</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-lock-screen.html" class="menu-link">
                            <span class="menu-text">Lock Screen</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-lock-screen-2.html" class="menu-link">
                            <span class="menu-text">Lock Screen 2</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-confirm-mail.html" class="menu-link">
                            <span class="menu-text">Confirm Mail</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="auth-confirm-mail-2.html" class="menu-link">
                            <span class="menu-text">Confirm Mail 2</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-error-warning-line"></i>
                    </span>
                    <span class="menu-text"> Error Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="error-404.html" class="menu-link">
                            <span class="menu-text">Error 404</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="error-404-alt.html" class="menu-link">
                            <span class="menu-text">Error 404-alt</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="error-500.html" class="menu-link">
                            <span class="menu-text">Error 500</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-layout-line"></i>
                    </span>
                    <span class="menu-text"> Layout </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="layout-hover-view.html" target="_blank" class="menu-link">
                            <span class="menu-text">Hovered Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layout-icon-view.html" target="_blank" class="menu-link">
                            <span class="menu-text">Icon View Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layout-compact-view.html" target="_blank" class="menu-link">
                            <span class="menu-text">Compact Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layout-mobile-view.html" target="_blank" class="menu-link">
                            <span class="menu-text">Mobile View Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="layout-hidden.html" target="_blank" class="menu-link">
                            <span class="menu-text">Hidden Menu</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-title">Components</li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-briefcase-line"></i>
                    </span>
                    <span class="menu-text"> Base UI </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="ui-accordions.html" class="menu-link">
                            <span class="menu-text">Accordions</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-alerts.html" class="menu-link">
                            <span class="menu-text">Alerts</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-avatars.html" class="menu-link">
                            <span class="menu-text">Avatars</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-buttons.html" class="menu-link">
                            <span class="menu-text">Buttons</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-badges.html" class="menu-link">
                            <span class="menu-text">Badges</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-breadcrumbs.html" class="menu-link">
                            <span class="menu-text">Breadcrumb</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-cards.html" class="menu-link">
                            <span class="menu-text">Cards</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-collapse.html" class="menu-link">
                            <span class="menu-text">Collapse</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-dismissible.html" class="menu-link">
                            <span class="menu-text">Dismissible</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-dropdowns.html" class="menu-link">
                            <span class="menu-text">Dropdowns</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-progress.html" class="menu-link">
                            <span class="menu-text">Progress</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-skeleton.html" class="menu-link">
                            <span class="menu-text">Skeleton</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-spinners.html" class="menu-link">
                            <span class="menu-text">Spinners</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-list-group.html" class="menu-link">
                            <span class="menu-text">List Group</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-ratio.html" class="menu-link">
                            <span class="menu-text">Ratio</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-tabs.html" class="menu-link">
                            <span class="menu-text">Tab</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-modals.html" class="menu-link">
                            <span class="menu-text">Modals</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-offcanvas.html" class="menu-link">
                            <span class="menu-text">Offcanvas</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-popovers.html" class="menu-link">
                            <span class="menu-text">Popovers</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-tooltips.html" class="menu-link">
                            <span class="menu-text">Tooltips</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ui-typography.html" class="menu-link">
                            <span class="menu-text">Typography</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-stack-line"></i>
                    </span>
                    <span class="menu-text"> Extended UI </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="extended-swiper.html" class="menu-link">
                            <span class="menu-text">Swiper</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="extended-nestable.html" class="menu-link">
                            <span class="menu-text">Nestable List</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="extended-ratings.html" class="menu-link">
                            <span class="menu-text">Ratings</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="extended-player.html" class="menu-link">
                            <span class="menu-text">Player</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="extended-scrollbar.html" class="menu-link">
                            <span class="menu-text">Scrollbar</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="extended-tippy-tooltips.html" class="menu-link">
                            <span class="menu-text">Tippy Tooltip</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-service-line"></i>
                    </span>
                    <span class="menu-text"> Icons </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="icons-remixicons.html" class="menu-link">
                            <span class="menu-text">Remixicons</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="icons-lucide.html" class="menu-link">
                            <span class="menu-text">Lucide</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-survey-line"></i>
                    </span>
                    <span class="menu-text"> Forms </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="forms-elements.html" class="menu-link">
                            <span class="menu-text">Form Elements</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forms-advanced.html" class="menu-link">
                            <span class="menu-text">Advanced</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="forms-editor.html" class="menu-link">
                            <span class="menu-text">Editor</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="forms-file-uploads.html" class="menu-link">
                            <span class="menu-text">File Uploads</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forms-validation.html" class="menu-link">
                            <span class="menu-text">Validation</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="forms-layout.html" class="menu-link">
                            <span class="menu-text">Form Layout</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-table-line"></i>
                    </span>
                    <span class="menu-text"> Tables </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="tables-basic.html" class="menu-link">
                            <span class="menu-text">Basic Tables</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="tables-datatables.html" class="menu-link">
                            <span class="menu-text">Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-bar-chart-line"></i>
                    </span>
                    <span class="menu-text"> Apex Charts </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="charts-apex-area.html" class="menu-link">
                            <span class="menu-text">Area</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-bar.html" class="menu-link">
                            <span class="menu-text">Bar</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-bubble.html" class="menu-link">
                            <span class="menu-text">Bubble</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-candlestick.html" class="menu-link">
                            <span class="menu-text">Candlestick</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-column.html" class="menu-link">
                            <span class="menu-text">Column</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-heatmap.html" class="menu-link">
                            <span class="menu-text">Heatmap</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-line.html" class="menu-link">
                            <span class="menu-text">Line</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-mixed.html" class="menu-link">
                            <span class="menu-text">Mixed</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-timeline.html" class="menu-link">
                            <span class="menu-text">Timeline</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-boxplot.html" class="menu-link">
                            <span class="menu-text">Boxplot</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-treemap.html" class="menu-link">
                            <span class="menu-text">Treemap</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-pie.html" class="menu-link">
                            <span class="menu-text">Pie</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-radar.html" class="menu-link">
                            <span class="menu-text">Radar</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-radialbar.html" class="menu-link">
                            <span class="menu-text">RadialBar</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-scatter.html" class="menu-link">
                            <span class="menu-text">Scatter</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-polar-area.html" class="menu-link">
                            <span class="menu-text">Polar Area</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-apex-sparklines.html" class="menu-link">
                            <span class="menu-text">Sparklines</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-pie-chart-line"></i>
                    </span>
                    <span class="menu-text"> Chartjs </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="charts-chartjs-area.html" class="menu-link">
                            <span class="menu-text">Area</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-chartjs-bar.html" class="menu-link">
                            <span class="menu-text">Bar</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-chartjs-line.html" class="menu-link">
                            <span class="menu-text">Line</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="charts-chartjs-other.html" class="menu-link">
                            <span class="menu-text">Other</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-treasure-map-line"></i>
                    </span>
                    <span class="menu-text"> Maps </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="maps-vector.html" class="menu-link">
                            <span class="menu-text">Vector Maps</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="maps-google.html" class="menu-link">
                            <span class="menu-text">Google Maps</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-share-line"></i>
                    </span>
                    <span class="menu-text"> Level </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="javascript: void(0)" class="menu-link">
                            <span class="menu-text">Item 1</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript: void(0)" class="menu-link">
                            <span class="menu-text">Item 2</span>
                            <span class="badge bg-info rounded-md">New</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link">
                    <span class="menu-icon">
                        <i class="ri-flag-2-line"></i>
                    </span>
                    <span class="menu-text"> Badge Items </span>
                    <span class="badge bg-danger rounded-md">Hot</span>
                </a>
            </li>
        </ul>

    </div>
</div>

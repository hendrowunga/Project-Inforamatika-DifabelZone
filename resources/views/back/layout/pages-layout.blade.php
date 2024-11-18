<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>@yield('pageTitle')</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/back/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/back/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/back/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="src/plugins/jvectormap/jquery-jvectormap-2.0.3.css" />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css" />


    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="/extra-assets/ijabo/ijabo.min.css">
    <link rel="stylesheet" href="/extra-assets/ijaboCropTool/ijaboCropTool.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="/extra-assets/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ijabo@1.1.0/dist/css/ijabo.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ijabo-crop-tool@1.0.1/dist/css/ijaboCropTool.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    @stack('stylesheet')
</head>

<body>


    <div class="header">
        <div class="header-left">
            {{-- <div class="menu-icon bi bi-list" id="open-menu"></div> --}}
        </div>
        <div class="header-right">

            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/img.jpg" alt="" />
                                        <h3>John Doe</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo1.jpg" alt="" />
                                        <h3>Lea R. Frith</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo2.jpg" alt="" />
                                        <h3>Erik L. Richards</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo3.jpg" alt="" />
                                        <h3>John Doe</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/photo4.jpg" alt="" />
                                        <h3>Renee I. Hansen</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="/back/vendors/images/img.jpg" alt="" />
                                        <h3>Vicki M. Coleman</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing
                                            elit, sed...
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @livewire('admin-seller-header-profile-info')
        </div>
    </div>



    <!-- Left side bar -->
    <div class="left-side-bar" id="left-sidebar">
        <div class="brand-logo">
            <a href="{{ route('admin.home') }}">
                <img src="/back/vendors/images/deskapp-logo.svg" alt="" class="dark-logo" />
                <img src="/back/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo" />
            </a>
            <div class="close-sidebar" id="close-sidebar">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    @if (Route::is('admin.*'))
                        <li><a href="{{ route('admin.home') }}"
                                class="dropdown-toggle no-arrow {{ Route::is('admin.home') ? 'active' : '' }}"><span
                                    class="micon fa fa-home"></span><span class="mtext">Dashboard</span></a></li>

                        <li>
                        <li>
                            <a href="{{ route('admin.manage-products.product_list') }}"
                                class="dropdown-toggle no-arrow  {{ Route::is('admin.manage-products.*') ? 'active' : '' }}">
                                <span class="micon bi bi-box-seam"></span><span class="mtext">Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.manage-categories.cats-subcats-list') }}"
                                class="dropdown-toggle no-arrow {{ Route::is('admin.manage-categories.*') ? 'active' : '' }}">
                                <span class="micon bi bi-tags"></span><span class="mtext">Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.manage-users.user_list') }}"
                                class="dropdown-toggle no-arrow {{ Route::is('admin.manage-users.*') ? 'active' : '' }}">
                                <span class="micon bi bi-person"></span><span class="mtext">Customer</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.manage-orders.order_list') }}"
                                class="dropdown-toggle no-arrow {{ Route::is('admin.manage-orders.*') ? 'active' : '' }}">
                                <span class="micon bi bi-bag"></span><span class="mtext">Order</span>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider"></div>
                        </li>

                        <li><a href="{{ route('admin.profile') }}"
                                class="dropdown-toggle no-arrow {{ Route::is('admin.profile') ? 'active' : '' }} "><span
                                    class="micon bi bi-person-circle"></span><span class="mtext">Profile</span></a>
                        </li>
                        <li><a href="{{ route('admin.settings') }}"
                                class="dropdown-toggle no-arrow {{ Route::is('admin.settings') ? 'active' : '' }}"><span
                                    class="micon icon-copy fi-widget"></span><span class="mtext">Settings
                                </span></a>
                        </li>
                    @else
                        <li>
                            <a href="invoice.html" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-receipt-cutoff"></span><span class="mtext">Invoice</span>
                            </a>
                        </li>
                        <li>
                            <a href="invoice.html" class="dropdown-toggle no-arrow">
                                <span class="micon bi bi-receipt-cutoff"></span><span class="mtext">Profile</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div>@yield('content') </div>
            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">DifabZone - Admin By @if (Auth::check())
                    <strong>{{ Auth::user()->name }}</strong>
                @else
                    Not logged in
                @endif
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="/back/vendors/scripts/core.js"></script>
    <script src="/back/vendors/scripts/script.min.js"></script>
    <script src="/back/vendors/scripts/process.js"></script>
    <script src="/back/vendors/scripts/layout-settings.js"></script>
    <script src="/back/vendors/scripts/dashboard2.js"></script>

    <script>
        if (navigator.userAgent.indexOf("Firefox") != -1) {
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function() {
                history.pushState(null, null, document.URL);
            });
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ijabo@1.1.0/dist/js/ijabo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/ijabo-crop-tool@1.0.1/dist/js/ijaboCropTool.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/ijabo-viewer@1.0.0/dist/js/jquery.ijaboViewer.min.js"></script>

    <script src="/extra-assets/ijabo/ijabo.min.js"></script>
    <script src="/extra-assets/ijabo/jquery.ijaboViewer.min.js"></script>
    <script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="/extra-assets/summernote/summernote-bs4.min.css">
    <!-- Tambahkan WYSIHTML5 CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysihtml5-bower/0.3.3/bootstrap3-wysihtml5.min.css" />

    <!-- Tambahkan WYSIHTML5 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-wysihtml5-bower/0.3.3/bootstrap3-wysihtml5.all.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('scripts')
</body>

</html>

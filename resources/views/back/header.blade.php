
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{ $data['title'] }}</title>

    <meta name="description" content="Submarine Records">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Open Graph Meta -->
    <meta property="og:title" content="Submarine Records">
    <meta property="og:site_name" content="Submarine Records">
    <meta property="og:description" content="Submarine Records">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/icon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets_back/js/codebase.app.min.js') }}"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets_back/js/plugins/chart.js/chart.umd.js') }}"></script>
    <!-- Page JS Code -->
    <script src="{{ asset('assets_back/js/pages/db_classic.min.js') }}"></script>
    <link rel="stylesheet" id="css-main" href="{{ asset('assets_back/css/codebase.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
    <script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{ asset('assets_back/css/themes/flat.min.css') }}"> -->
    <!-- END Stylesheets -->
  </head>

  <body>
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      <!-- Side Overlay-->
      <aside id="side-overlay">
        <!-- Side Header -->
        <div class="content-header bg-primary-dark">
          <!-- User Avatar -->
          <a class="img-link me-2" href="be_pages_generic_profile.html">
            <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar12.jpg" alt="">
          </a>
          <!-- END User Avatar -->

          <!-- User Info -->
          <a class="link-fx text-white fw-semibold fs-sm" href="#">
            {{ session('name') }}
          </a>
          <!-- END User Info -->

          <!-- Close Side Overlay -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout" data-action="side_overlay_close">
            <i class="fa fa-fw fa-times"></i>
          </button>
          <!-- END Close Side Overlay -->
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
          <!-- Mini Stats -->
          <div class="block pull-t pull-x">
            <div class="block-content block-content-full block-content-sm bg-body-light">
              <div class="row text-center">
                <div class="col-4">
                  <div class="fs-sm fw-semibold text-uppercase text-muted">Sales</div>
                  <div class="fs-4">985</div>
                </div>
                <div class="col-4">
                  <div class="fs-sm fw-semibold text-uppercase text-muted">Tickets</div>
                  <div class="fs-4">251</div>
                </div>
                <div class="col-4">
                  <div class="fs-sm fw-semibold text-uppercase text-muted">Projects</div>
                  <div class="fs-4">39</div>
                </div>
              </div>
            </div>
          </div>
          <!-- END Mini Stats -->

          <!-- Search -->
          <div class="block pull-x">
            <div class="block-content block-content-full block-content-sm bg-body-light">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" id="side-overlay-search" name="side-overlay-search" placeholder="Search..">
                  <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-search"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- END Search -->

          <!-- Notifications -->
          <div class="block pull-x">
            <div class="block-header bg-body-light">
              <h3 class="block-title">Notifications</h3>
              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
              </div>
            </div>
            <div class="block-content">
              <ul class="list list-activity mb-0">
                <li>
                  <i class="si si-wallet text-success"></i>
                  <div class="fs-sm fw-semibold">+$29 New sale</div>
                  <div class="fs-sm">
                    <a href="javascript:void(0)">Admin Template</a>
                  </div>
                  <div class="fs-xs text-muted">5 min ago</div>
                </li>
                <li>
                  <i class="si si-close text-danger"></i>
                  <div class="fs-sm fw-semibold">Project removed</div>
                  <div class="fs-sm">
                    <a href="javascript:void(0)">Best Icon Set</a>
                  </div>
                  <div class="fs-xs text-muted">26 min ago</div>
                </li>
                <li>
                  <i class="si si-pencil text-info"></i>
                  <div class="fs-sm fw-semibold">You edited the file</div>
                  <div class="fs-sm">
                    <a href="javascript:void(0)">
                      <i class="fa fa-file-alt"></i> Docs.doc
                    </a>
                  </div>
                  <div class="fs-xs text-muted">3 hours ago</div>
                </li>
                <li>
                  <i class="si si-plus text-success"></i>
                  <div class="fs-sm fw-semibold">New user</div>
                  <div class="fs-sm">
                    <a href="javascript:void(0)">StudioWeb - View Profile</a>
                  </div>
                  <div class="fs-xs text-muted">5 hours ago</div>
                </li>
                <li>
                  <i class="si si-wrench text-warning"></i>
                  <div class="fs-sm fw-semibold">App v5.5 is available</div>
                  <div class="fs-sm">
                    <a href="javascript:void(0)">Update now</a>
                  </div>v
                  <div class="fs-xs text-muted">8 hours ago</div>
                </li>
                <li>
                  <i class="si si-user-follow text-pulse"></i>
                  <div class="fs-sm fw-semibold">+1 Friend Request</div>
                  <div class="fs-sm">
                    <a href="javascript:void(0)">Accept</a>
                  </div>
                  <div class="fs-xs text-muted">1 day ago</div>
                </li>
              </ul>
            </div>
          </div>
          <!-- END Notifications -->
        </div>
        <!-- END Side Content -->
      </aside>
      <!-- END Side Overlay -->

      <!-- Sidebar -->
      <nav id="sidebar">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
          <!-- Side Header -->
          <div class="content-header justify-content-lg-center bg-black-10">
            <!-- Logo -->
            <div style="padding-top: 50px; margin-bottom:30px">
                <span class="smini-hidden">
                    <img src="{{ asset('assets\img\logo-submarine.png') }}" alt="Logo Submarine" class="img-fluid img-responsive" width="150">
                </span>
            </div>
            <!-- END Logo -->

            <!-- Options -->
            <div>
              <!-- Close Sidebar, Visible only on mobile screens -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-fw fa-times"></i>
              </button>
              <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
          </div>
          <!-- END Side Header -->

          <!-- Sidebar Scrolling -->
          <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <a href="{{ url('/home') }}" class="btn btn-primary w-100 push d-flex align-items-center justify-content-between"><span>Back To Store Page</span><i class="fa fa-plus opacity-50 ms-1"></i></a>
              <ul class="nav-main">
                <li class="nav-main-item">
                  <a class="nav-main-link" href="{{ url('/dashboard') }}">
                    <i class="nav-main-link-icon fa fa-coffee"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                  </a>
                </li>
                <li class="nav-main-heading">Headquarters</li>
                <li class="nav-main-item">
                  <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-briefcase"></i>
                    <span class="nav-main-link-name">Master</span>
                  </a>
                  <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <a class="nav-main-link" href="{{ url('/genre') }}">
                        <span class="nav-main-link-name">Genre</span>
                      </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ url('/release') }}">
                          <span class="nav-main-link-name">Release</span>
                        </a>
                      </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{ url('/ticket') }}">
                          <span class="nav-main-link-name">Ticket</span>
                        </a>
                      </li>
                    {{-- <li class="nav-main-item">
                      <a class="nav-main-link" href="">
                        <span class="nav-main-link-name">Manage</span>
                      </a>
                    </li> --}}
                  </ul>
                </li>
                {{-- <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-file-invoice-dollar"></i>
                    <span class="nav-main-link-name">Invoices</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Clients</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-wallet"></i>
                    <span class="nav-main-link-name">Payments</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-layer-group"></i>
                    <span class="nav-main-link-name">Requests</span>
                  </a>
                </li>
                <li class="nav-main-heading">Settings</li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-sticky-note"></i>
                    <span class="nav-main-link-name">Profile</span>
                  </a>
                </li>
                <li class="nav-main-item">
                  <a class="nav-main-link" href="">
                    <i class="nav-main-link-icon fa fa-lock"></i>
                    <span class="nav-main-link-name">Security</span>
                  </a>
                </li> --}}
              </ul>
            </div>
            <!-- END Side Navigation -->
          </div>
          <!-- END Sidebar Scrolling -->
        </div>
        <!-- Sidebar Content -->
      </nav>
      <!-- END Sidebar -->

      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="d-flex align-items-center space-x-2">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
              <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Open Search Section -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-sm-none" data-toggle="layout" data-action="header_search_on">
              <i class="fa fa-fw fa-search"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Full Search -->
            <form class="d-none d-sm-inline-block" action="db_classic.html" method="POST" onsubmit="return false;">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" placeholder="Search..">
                <span class="input-group-text">
                  <i class="fa fa-search"></i>
                </span>
              </div>
            </form>
            <!-- END Full Search -->
          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div class="space-x-1">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block">
              <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fw-semibold">{{ session('name') }}</span>
                <i class="fa fa-angle-down opacity-50 ms-1"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="be_pages_generic_profile.html">
                    <span>Profile</span>
                    <i class="fa fa-fw fa-user opacity-25"></i>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                    <span>Inbox</span>
                    <i class="fa fa-fw fa-envelope-open opacity-25"></i>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="be_pages_generic_invoice.html">
                    <span>Invoices</span>
                    <i class="fa fa-fw fa-file opacity-25"></i>
                  </a>
                  <div class="dropdown-divider"></div>

                  <!-- Toggle Side Overlay -->
                  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                  <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                    <span>Settings</span>
                    <i class="fa fa-fw fa-wrench opacity-25"></i>
                  </a>
                  <!-- END Side Overlay -->

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{ url('/dologout') }}">
                    <span>Sign Out</span>
                    <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
                  </a>
                </div>
              </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="side_overlay_toggle">
              <i class="fa fa-fw fa-list"></i>
            </button>
            <!-- END Toggle Side Overlay -->
          </div>
          <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
          <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
              <div class="input-group">
                <!-- Close Search Section -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times"></i>
                </button>
                <!-- END Close Search Section -->
                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                <button type="submit" class="btn btn-secondary">
                  <i class="fa fa-fw fa-search"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <div id="page-header-loader" class="overlay-header bg-primary">
          <div class="content-header">
            <div class="w-100 text-center">
              <i class="far fa-sun fa-spin text-white"></i>
            </div>
          </div>
        </div>
        <!-- END Header Loader -->
      </header>
      <!-- END Header -->

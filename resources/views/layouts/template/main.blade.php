<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Dashboard</title>


    {{--   ------------------------------------------- datatable css ------------------------------------------- --}}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">

    {{--   ------------------------------------------- datatable css ------------------------------------------- --}}

    <link
        href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"
        rel="stylesheet"
    />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}"/>
    <script
        data-search-pseudo-elements
        defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        crossorigin="anonymous"
    ></script>
</head>
<body class="nav-fixed">
<nav
    class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
    id="sidenavAccordion"
>
    <!-- Sidenav Toggle Button-->
    <button
        class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0"
        id="sidebarToggle"
    >
        <i data-feather="menu"></i>
    </button>
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.html">Dashboard</a>
    <!-- Navbar Search Input-->
    <!-- * * Note: * * Visible only on and above the lg breakpoint-->
    <form class="form-inline me-auto d-none d-lg-block me-3">
        <div class="input-group input-group-joined input-group-solid">
            <input
                class="form-control pe-0"
                type="search"
                placeholder="Search"
                aria-label="Search"
            />
            <div class="input-group-text"><i data-feather="search"></i></div>
        </div>
    </form>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">

        <!-- Navbar Search Dropdown-->
        <!-- * * Note: * * Visible only below the lg breakpoint-->
        <li class="nav-item dropdown no-caret me-3 d-lg-none">
            <a
                class="btn btn-icon btn-transparent-dark dropdown-toggle"
                id="searchDropdown"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            ><i data-feather="search"></i
                ></a>
            <!-- Dropdown - Search-->
            <div
                class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up"
                aria-labelledby="searchDropdown"
            >
                <form class="form-inline me-auto w-100">
                    <div class="input-group input-group-joined input-group-solid">
                        <input
                            class="form-control pe-0"
                            type="text"
                            placeholder="Search for..."
                            aria-label="Search"
                            aria-describedby="basic-addon2"
                        />
                        <div class="input-group-text">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Alerts Dropdown-->
        <li
            class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications"
        >
            <a
                class="btn btn-icon btn-transparent-dark dropdown-toggle"
                id="navbarDropdownAlerts"
                href="javascript:void(0);"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            ><i data-feather="bell"></i
                ></a>
            <div
                class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownAlerts"
            >
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="me-2" data-feather="bell"></i>
                    Alerts Center
                </h6>
                <!-- Example Alert 1-->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-warning">
                        <i data-feather="activity"></i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 29, 2021
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            This is an alert message. It's nothing serious, but it
                            requires your attention.
                        </div>
                    </div>
                </a>
                <!-- Example Alert 2-->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-info">
                        <i data-feather="bar-chart"></i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 22, 2021
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            A new monthly report is ready. Click here to view!
                        </div>
                    </div>
                </a>
                <!-- Example Alert 3-->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 8, 2021
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            Critical system failure, systems shutting down.
                        </div>
                    </div>
                </a>
                <!-- Example Alert 4-->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <div class="dropdown-notifications-item-icon bg-success">
                        <i data-feather="user-plus"></i>
                    </div>
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-details">
                            December 2, 2021
                        </div>
                        <div class="dropdown-notifications-item-content-text">
                            New user request. Woody has requested access to the
                            organization.
                        </div>
                    </div>
                </a>
                <a class="dropdown-item dropdown-notifications-footer" href="#!"
                >View All Alerts</a
                >
            </div>
        </li>
        <!-- Messages Dropdown-->
        <li
            class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications"
        >
            <a
                class="btn btn-icon btn-transparent-dark dropdown-toggle"
                id="navbarDropdownMessages"
                href="javascript:void(0);"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            ><i data-feather="mail"></i
                ></a>
            <div
                class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownMessages"
            >
                <h6 class="dropdown-header dropdown-notifications-header">
                    <i class="me-2" data-feather="mail"></i>
                    Message Center
                </h6>
                <!-- Example Message 1  -->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <img
                        class="dropdown-notifications-item-img"
                        src="{{ asset('assets/img/illustrations/profiles/profile-2.png') }}"
                    />
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </div>
                        <div class="dropdown-notifications-item-content-details">
                            Thomas Wilcox · 58m
                        </div>
                    </div>
                </a>
                <!-- Example Message 2-->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <img
                        class="dropdown-notifications-item-img"
                        src="{{ asset('assets/img/illustrations/profiles/profile-3.png') }}"
                    />
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </div>
                        <div class="dropdown-notifications-item-content-details">
                            Emily Fowler · 2d
                        </div>
                    </div>
                </a>
                <!-- Example Message 3-->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <img
                        class="dropdown-notifications-item-img"
                        src="{{ asset('assets/img/illustrations/profiles/profile-4.png') }}"
                    />
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </div>
                        <div class="dropdown-notifications-item-content-details">
                            Marshall Rosencrantz · 3d
                        </div>
                    </div>
                </a>
                <!-- Example Message 4-->
                <a class="dropdown-item dropdown-notifications-item" href="#!">
                    <img
                        class="dropdown-notifications-item-img"
                        src="{{ asset('assets/img/illustrations/profiles/profile-5.png') }}"
                    />
                    <div class="dropdown-notifications-item-content">
                        <div class="dropdown-notifications-item-content-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.
                        </div>
                        <div class="dropdown-notifications-item-content-details">
                            Colby Newton · 3d
                        </div>
                    </div>
                </a>
                <!-- Footer Link-->
                <a class="dropdown-item dropdown-notifications-footer" href="#!"
                >Read All Messages</a
                >
            </div>
        </li>
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a
                class="btn btn-icon btn-transparent-dark dropdown-toggle"
                id="navbarDropdownUserImage"
                href="javascript:void(0);"
                role="button"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            ><img
                    class="img-fluid"
                    src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}"
                /></a>
            <div
                class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage"
            >
                <h6 class="dropdown-header d-flex align-items-center">
                    <img
                        class="dropdown-user-img"
                        src="{{ asset('assets/img/illustrations/profiles/profile-1.png') }}"
                    />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ auth()->user()->name ?? '' }}</div>
                        <div class="dropdown-user-details-email">{{ auth()->user()->email ?? '' }}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                {{--                <a class="dropdown-item" href="#!">--}}
                {{--                    <div class="dropdown-item-icon">--}}
                {{--                        <i data-feather="settings"></i>--}}
                {{--                    </div>--}}
                {{--                    Account--}}
                {{--                </a>--}}
                <a class="dropdown-item" href="{{ route('logout_') }}">
                    <div class="dropdown-item-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <!-- Sidenav Menu Heading (Account)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <div class="sidenav-menu-heading d-sm-none">Account</div>
                    <!-- Sidenav Link (Alerts)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="bell"></i></div>
                        Alerts
                        <span class="badge bg-warning-soft text-warning ms-auto"
                        >4 New!</span
                        >
                    </a>
                    <!-- Sidenav Link (Messages)-->
                    <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                    <a class="nav-link d-sm-none" href="#!">
                        <div class="nav-link-icon"><i data-feather="mail"></i></div>
                        Messages
                        <span class="badge bg-success-soft text-success ms-auto"
                        >2 New!</span
                        >
                    </a>

                    {{-- ---------------------------------------------- sidebar - Tahmid Ferdous ---------------------------------------------- --}}

                    <div class="sidenav-menu-heading">Panel</div>

                    {{-- -------------- admin role -------------- --}}

                    <x-sidebar.admin></x-sidebar.admin>


                    {{-- -------------- hr role -------------- --}}

                    <x-sidebar.hr></x-sidebar.hr>


                    {{-- -------------- manager role -------------- --}}

                    <x-sidebar.manager></x-sidebar.manager>

                    {{-- ---------------------------------------------- sidebar - Tahmid Ferdous ---------------------------------------------- --}}


                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">{{ auth()->user()->name ?? '' }}</div>
                    <div class="sidenav-footer-title">{{ auth()->user()->roles->pluck('name')->map(fn($name) => ucfirst($name))->implode(', ') ?? '' }}</div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">


        {{--  ------------------------------------------------- Dashboard extended content - Tahmid Ferdous ------------------------------------------------- --}}

        @yield('content')

        {{--  ------------------------------------------------- Dashboard extended content - Tahmid Ferdous ------------------------------------------------- --}}


        <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">
                        Copyright &copy; Your Website 2021
                    </div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"
></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
    crossorigin="anonymous"
></script>
<script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>

{{-- ---------------------------------------------------- Datatable js ---------------------------------------------------- --}}

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>


<script>
    $(document).ready(function () {
        // $('#example').DataTable();

        var table = $('#datatablesSimple').DataTable({
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
</script>


{{-- ---------------------------------------------------- Datatable js ---------------------------------------------------- --}}


<script
    src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"
    crossorigin="anonymous"
></script>
<script src="{{ asset('js/litepicker.js') }}"></script>
</body>
</html>

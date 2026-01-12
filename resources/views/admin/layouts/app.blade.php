<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>Car Rental Portal | @yield('title')</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dataTables.bootstrap.min.css') }}">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-social.css') }}">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-select.css') }}">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/fileinput.min.css') }}">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/awesome-bootstrap-checkbox.css') }}">
    <!-- assets/admin Stye -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/admin/img/icons8-car-96.png') }}">



    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>

    @yield('styles')
</head>

<body>
    @include('admin.includes.header')

    <div class="ts-main-content">
        @include('admin.includes.sidebar')

        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/fileinput.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chartData.js') }}"></script>
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    @yield('scripts')
    <script>
        // Toggle sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const adminSidebar = document.getElementById('adminSidebar');
            const sidebarToggler = document.querySelector('.sidebar-toggler');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    adminSidebar.classList.toggle('collapsed');
                });
            }

            if (sidebarToggler) {
                sidebarToggler.addEventListener('click', function() {
                    adminSidebar.classList.toggle('collapsed');
                });
            }

            // Mobile sidebar toggle
            const menuToggle = document.querySelector('.menu-toggle');
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    adminSidebar.classList.toggle('mobile-open');
                });
            }

            // Submenu toggle
            const hasSubmenuItems = document.querySelectorAll('.has-submenu');
            hasSubmenuItems.forEach(item => {
                const menuLink = item.querySelector('.menu-link');
                menuLink.addEventListener('click', function(e) {
                    if (!adminSidebar.classList.contains('collapsed')) {
                        e.preventDefault();
                        item.classList.toggle('open');
                    }
                });
            });

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    if (!adminSidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                        adminSidebar.classList.remove('mobile-open');
                    }
                }
            });
        });
    </script>
</body>

</html>

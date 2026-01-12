<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Car Rental Portal'))</title>

    {{-- ✅ Arabic Font: Cairo or Noto Naskh Arabic are modern and clear --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    {{-- ✅ CSS --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-slider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40N8S3p4s5S8Fp1L+K5YJ0xQG9B0m2Hh3f3Z4q4M2T4jFwG8K6s3G/y/1F/1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    {{-- ✅ RTL Style for Arabic --}}
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <link href="{{ asset('assets/css/rtl-style.css') }}" rel="stylesheet">
    @endif

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}">

    {{-- ✅ Font Awesome & Toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    {{-- ✅ Color Switcher --}}
    <link rel="stylesheet" href="{{ asset('assets/switcher/css/switcher.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/switcher/css/red.css') }}" title="red">
    <link rel="alternate stylesheet" href="{{ asset('assets/switcher/css/orange.css') }}" title="orange">
    <link rel="alternate stylesheet" href="{{ asset('assets/switcher/css/blue.css') }}" title="blue">
    <link rel="alternate stylesheet" href="{{ asset('assets/switcher/css/pink.css') }}" title="pink">
    <link rel="alternate stylesheet" href="{{ asset('assets/switcher/css/green.css') }}" title="green">
    <link rel="alternate stylesheet" href="{{ asset('assets/switcher/css/purple.css') }}" title="purple">

    {{-- Apply Arabic Font if RTL --}}
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <style>
            body {
                font-family: 'Cairo', sans-serif !important;
            }

            /* Add any specific RTL font-size adjustments here if needed */
        </style>
    @else
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    @endif

    @stack('styles')

</head>

<body>

    {{-- ✅ Color Switcher + Header + Footer --}}
    @include('layouts.colorswitcher')
    @include('layouts.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
    @include('layouts.auth-modal')

    {{-- ... rest of the JS includes and scripts ... --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/interface.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}" defer></script>
    <script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- Note: Replaced duplicate jQuery and old Bootstrap JS with the necessary modern includes --}}


    {{-- ✅ Theme Switcher --}}
    <script>
        (function($) {
            "use strict";
            $(function() {
                $(".demo-icon").on("click", function() {
                    $(".demo_changer").toggleClass("open");
                });

                $(".styleswitch").on("click", function(e) {
                    e.preventDefault();
                    const color = $(this).data("switchcolor");
                    $('link[rel*=alternate][title]').each(function() {
                        this.disabled = true;
                        if (this.getAttribute('title') === color) this.disabled = false;
                    });
                    localStorage.setItem("themeColor", color);
                });

                const savedColor = localStorage.getItem("themeColor");
                if (savedColor) {
                    $('link[rel*=alternate][title]').each(function() {
                        this.disabled = true;
                        if (this.getAttribute('title') === savedColor) this.disabled = false;
                    });
                }
            });
        })(jQuery);
    </script>

    {{-- ✅ Navbar Toggle --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toggler = document.querySelector(".navbar-toggle");
            const nav = document.querySelector("#navigation");
            // The original logic assumes Bootstrap 3.x classes. We are keeping the class toggle
            // but for Bootstrap 5.x, the data-bs-target handles the collapse.
            // If the original site relies on this JS toggle, keep it.
            if (toggler && nav && !toggler.dataset.bsToggle) {
                toggler.addEventListener("click", function() {
                    nav.classList.toggle("show");
                });
            }
        });
    </script>

    {{-- ✅ User Dropdown --}}
    <script>
        window.toggleUserDropdown = function(event) {
            event.preventDefault();
            event.stopPropagation();
            const dropdownMenu = event.target.closest('.dropdown').querySelector('.dropdown-menu');
            const isVisible = dropdownMenu.classList.contains('show');
            document.querySelectorAll('.user_login .dropdown-menu').forEach(menu => menu.classList.remove('show'));
            if (!isVisible) dropdownMenu.classList.add('show');
        };

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.user_login')) {
                document.querySelectorAll('.user_login .dropdown-menu').forEach(menu => menu.classList.remove(
                    'show'));
            }
        });
    </script>

    {{-- ✅ Toastr Options --}}
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "4000"
        };
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @elseif (session('info'))
            toastr.info("{{ session('info') }}");
        @elseif (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @elseif (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
    </script>

    {{-- ✅ Register Form AJAX --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            const registerErrors = document.getElementById('registerErrors');

            if (registerForm) {
                registerForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    registerErrors.classList.add('d-none');
                    registerErrors.innerHTML = '';

                    const formData = new FormData(this);
                    fetch('{{ LaravelLocalization::localizeURL(route('register.store')) }}', {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success(data.message || 'Registration successful');
                                window.location.href =
                                    '{{ LaravelLocalization::localizeURL(route('home')) }}';
                            } else {
                                registerErrors.classList.remove('d-none');
                                if (data.errors) {
                                    let html = '';
                                    for (const key in data.errors) {
                                        html += `<p class="mb-0">${data.errors[key][0]}</p>`;
                                    }
                                    registerErrors.innerHTML = html;
                                } else if (data.message) {
                                    registerErrors.innerHTML = `<p class="mb-0">${data.message}</p>`;
                                }
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            registerErrors.classList.remove('d-none');
                            registerErrors.innerHTML =
                                '<p class="mb-0">An unexpected error occurred.</p>';
                        });
                });
            }
        });
    </script>


</body>

</html>

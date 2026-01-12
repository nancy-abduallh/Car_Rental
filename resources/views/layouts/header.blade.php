<header>
    <div class="default-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-2">
                    <div class="logo">
                        <a href="{{ LaravelLocalization::localizeURL(route('home')) }}">
                            @if (app()->getLocale() === 'ar')
                                <img src="{{ asset('assets/images/logo-ar.png') }}" alt="{{ __('Car Rental Portal') }}">
                            @else
                                <img src="{{ asset('assets/images/logo-2.png') }}" alt="{{ __('Car Rental Portal') }}">
                            @endif
                        </a>
                    </div>

                </div>

                <div class="col-sm-9 col-md-10">
                    <div class="header_info">
                        @php
                            $contact = \DB::table('tblcontactusinfo')->select('EmailId', 'ContactNo')->first();
                            if (session()->isStarted()) {
                                session()->save();
                            }
                        @endphp

                        {{-- Email --}}
                        <div class="header_widgets">
                            <div class="circle_icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <p class="uppercase_text">{{ __('FOR SUPPORT MAIL US :') }}</p>
                            <a class="mail" href="mailto:{{ $contact->EmailId ?? 'support@carrental.com' }}">
                                {{ $contact->EmailId ?? 'support@carrental.com' }}
                            </a>
                        </div>

                        {{-- Phone --}}
                        <div class="header_widgets">
                            <div class="circle_icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <p class="uppercase_text">{{ __('SERVICE HELPLINE CALL US:') }}</p>
                            <a href="tel:{{ $contact->ContactNo ?? '+1234567890' }}">
                                {{ $contact->ContactNo ?? '+1 234 567 890' }}
                            </a>
                        </div>


                        @guest
                            <div class="login_btn" id="loginButton">
                                <a href="#" class="btn btn-xs uppercase btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    {{ __('LOGIN / REGISTER') }}
                                </a>
                            </div>
                        @endguest

                        @auth
                            <div class="header_widgets text-end text-white" id="welcomeMessage">
                                <p class="uppercase_text welcome-text">
                                    {{ __('WELCOME TO CAR RENTAL PORTAL,') }}
                                    <span class="fw-bold primary-color-link">
                                        {{ explode(' ', Auth::user()->FullName ?? 'User')[0] }}
                                    </span>
                                </p>
                            </div>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav id="navigation_bar" class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button id="menu_slide" class="navbar-toggle collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="sr-only">{{ __('Toggle navigation') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            {{-- Main Nav and Controls Wrapper --}}
            <div class="navbar-main-content">
                {{-- Main Nav --}}
                <div class="collapse navbar-collapse" id="navigation">
                    <ul class="nav navbar-nav">
                        <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                            <a href="{{ LaravelLocalization::localizeURL(route('home')) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="{{ request()->routeIs('car.listing') ? 'active' : '' }}">
                            <a
                                href="{{ LaravelLocalization::localizeURL(route('car.listing')) }}">{{ __('Car Listing') }}</a>
                        </li>
                        <li
                            class="{{ request()->routeIs('page.show') && request()->type == 'aboutus' ? 'active' : '' }}">
                            <a
                                href="{{ LaravelLocalization::localizeURL(route('page.show', ['type' => 'aboutus'])) }}">{{ __('About Us') }}</a>
                        </li>

                        <li class="{{ request()->routeIs('page.show') && request()->type == 'faqs' ? 'active' : '' }}">
                            <a
                                href="{{ LaravelLocalization::localizeURL(route('page.show', ['type' => 'faqs'])) }}">{{ __('FAQs') }}</a>
                        </li>
                        <li class="{{ request()->routeIs('contact.us') ? 'active' : '' }}">
                            <a
                                href="{{ LaravelLocalization::localizeURL(route('contact.us')) }}">{{ __('Contact Us') }}</a>
                        </li>
                    </ul>

                </div>


                <div class="header_wrap">
                    @auth
                        <div class="user_login" id="userLoginDropdown">
                            <ul>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" onclick="toggleUserDropdown(event)">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                        {{ Auth::user()->FullName ?? 'User' }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a
                                                href="{{ LaravelLocalization::localizeURL(route('user.profile')) }}">{{ __('Profile Settings') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ LaravelLocalization::localizeURL(route('user.password')) }}">{{ __('Update Password') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ LaravelLocalization::localizeURL(route('booking.my')) }}">{{ __('My Booking') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ LaravelLocalization::localizeURL(route('testimonial.create')) }}">{{ __('Post a Testimonial') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ LaravelLocalization::localizeURL(route('testimonial.index')) }}">{{ __('My Testimonial') }}</a>
                                        </li>
                                        <li><a
                                                href="{{ LaravelLocalization::localizeURL(route('logout')) }}">{{ __('Sign Out') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endauth

                    {{-- Search --}}
                    <div class="header_search">
                        <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
                        <form action="{{ LaravelLocalization::localizeURL(route('vehicle.search')) }}" method="GET"
                            id="header-search-form">
                            <input type="text" placeholder="{{ __('Search...') }}" name="query"
                                class="form-control" required />
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>
                    {{-- Language Switcher --}}
                    <div class="dropdown professional-language-switcher">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa fa-globe me-1"></i> {{ LaravelLocalization::getCurrentLocaleNative() }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

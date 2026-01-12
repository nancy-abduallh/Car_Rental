<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <h6>{{ __('About Us Title') }}</h6>
                    <ul>
                        {{-- Use LaravelLocalization::localizeURL for static pages that use route('page.show') or similar --}}
                        <li><a
                                href="{{ LaravelLocalization::localizeURL(route('page.show', ['type' => 'aboutus'])) }}">{{ __('About Us') }}</a>
                        </li>
                        <li><a
                                href="{{ LaravelLocalization::localizeURL(route('page.show', ['type' => 'faqs'])) }}">{{ __('FAQs') }}</a>
                        </li>
                        <li><a
                                href="{{ LaravelLocalization::localizeURL(route('page.show', ['type' => 'privacy'])) }}">{{ __('Privacy') }}</a>
                        </li>
                        <li><a
                                href="{{ LaravelLocalization::localizeURL(route('page.show', ['type' => 'terms'])) }}">{{ __('Terms of use') }}</a>
                        </li>
                        <li><a
                                href="{{ route('admin.login') }}">{{ __('Admin Login') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6">
                    <h6>{{ __('Subscribe Newsletter') }}</h6>
                    <div class="newsletter-form">
                        <form method="post">
                            <div class="form-group">
                                <input type="email" name="subscriberemail" class="form-control newsletter-input"
                                    placeholder="{{ __('Enter Email Address') }}" required />
                            </div>
                            <button type="submit" name="emailsubscibe" class="btn btn-block">{{ __('Subscribe') }}
                                <span class="angle_arrow"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i></span></button>
                        </form>
                        <p class="subscribed-text">
                            {{ __('*We send great deals and latest auto news to our subscribed users very week.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6 text-right">
                    <div class="footer_widget">
                        <p>{{ __('Connect with Us:') }}</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <p class="copy-right">{{ __('Salah Abu El-Dahab for Cars') }}</p>
                </div>
                <div class="col-lg-12">
                    <p class="text-right">&copy;2025 {{ __('All Rights Reserved by') }} <span class="text-warning"
                            style="font-size: 20px; color:brown;"><i>Nancy Abduallh</i></span></p>
                </div>
            </div>
        </div>
    </div>
</footer>

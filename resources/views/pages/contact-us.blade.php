@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

    <!-- Modern Page Header -->
    <section class="page-header-modern contactus_page"
        style="background: linear-gradient(135deg, rgba(44, 62, 80, 0.8) 0%, rgba(0, 0, 0, 0.8) 100%), url('{{ asset('assets/images/contact-bg.jpg') }}') no-repeat center center; background-size: cover; position: relative; padding: 0; overflow: hidden;">
        <div class="container" style="position: relative; z-index: 2;">
            <div class="page-header_wrap text-center text-white">
                <div class="page-heading">
                    <h1
                        style="font-size: 3.5rem; font-weight: 700; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        Get In Touch</h1>
                    <p style="font-size: 1.3rem; opacity: 0.9; max-width: 600px; margin: 0 auto;">We're here to help you find
                        the perfect vehicle for your journey</p>
                </div>
                <ul class="coustom-breadcrumb" style="justify-content: center; margin-top: 30px;">
                    <li style="margin: 0 10px;"><a href="{{ route('home') }}"
                            style="color: #f39c12; text-decoration: none; font-weight: 600;">Home</a></li>
                    <li style="margin: 0 10px; color: #ecf0f1;">Contact Us</li>
                </ul>
            </div>
        </div>

        <!-- Animated Background Elements -->
        <div class="header-shapes">
            <div class="shape-1"
                style="position: absolute; top: 10%; left: 5%; width: 50px; height: 50px; border: 2px solid rgba(255,255,255,0.1); border-radius: 50%;">
            </div>
            <div class="shape-2"
                style="position: absolute; bottom: 20%; right: 10%; width: 80px; height: 80px; border: 2px solid rgba(255,255,255,0.1); border-radius: 50%;">
            </div>
            <div class="shape-3"
                style="position: absolute; top: 40%; right: 20%; width: 30px; height: 30px; background: rgba(255,255,255,0.1); border-radius: 50%;">
            </div>
        </div>
    </section>
    <!-- /Modern Page Header-->

    <!--Enhanced Contact Section-->
    <section class="contact_us section-padding" style="background: #f8f9fa; padding: 80px 0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row"
                        style="background: white; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); overflow: hidden;">
                        <!-- Contact Form Section -->
                        <div class="col-md-7" style="padding: 50px 40px; background: white;">
                            <div class="section-title" style="margin-bottom: 40px;">
                                <h3
                                    style="color: #2c3e50; font-size: 2rem; font-weight: 700; margin-bottom: 15px; position: relative;">
                                    Send Us a Message
                                    <span
                                        style="position: absolute; bottom: -10px; left: 0; width: 60px; height: 4px; background: linear-gradient(135deg, #3498db, #2c3e50); border-radius: 2px;"></span>
                                </h3>
                                <p style="color: #7f8c8d; font-size: 1.1rem;">Have questions about our fleet? We'd love to
                                    hear from you.</p>
                            </div>

                            @if (session('error'))
                                <div class="modern-error"
                                    style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; padding: 20px; border-radius: 12px; margin-bottom: 30px; box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);">
                                    <div style="display: flex; align-items: center;">
                                        <div
                                            style="background: rgba(255,255,255,0.2); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                            <i class="fa fa-exclamation-triangle" style="color: white;"></i>
                                        </div>
                                        <div>
                                            <strong style="font-size: 1.1rem;">Attention Needed</strong>
                                            <p style="margin: 5px 0 0 0; opacity: 0.9;">{{ session('error') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (session('msg'))
                                <div class="modern-success"
                                    style="background: linear-gradient(135deg, #27ae60, #219a52); color: white; padding: 20px; border-radius: 12px; margin-bottom: 30px; box-shadow: 0 5px 15px rgba(39, 174, 96, 0.3);">
                                    <div style="display: flex; align-items: center;">
                                        <div
                                            style="background: rgba(255,255,255,0.2); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                            <i class="fa fa-check-circle" style="color: white;"></i>
                                        </div>
                                        <div>
                                            <strong style="font-size: 1.1rem;">Message Sent!</strong>
                                            <p style="margin: 5px 0 0 0; opacity: 0.9;">{{ session('msg') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('contact.store') }}" class="modern-contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group-modern" style="margin-bottom: 30px;">
                                            <label class="control-label"
                                                style="color: #2c3e50; font-weight: 600; margin-bottom: 8px; display: block;">Full
                                                Name <span style="color: #e74c3c;">*</span></label>
                                            <input type="text" name="fullname" class="form-control-modern" id="fullname"
                                                required
                                                style="width: 100%; padding: 15px 20px; border: 2px solid #ecf0f1; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: #f8f9fa;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group-modern" style="margin-bottom: 30px;">
                                            <label class="control-label"
                                                style="color: #2c3e50; font-weight: 600; margin-bottom: 8px; display: block;">Email
                                                Address <span style="color: #e74c3c;">*</span></label>
                                            <input type="email" name="email" class="form-control-modern"
                                                id="emailaddress" required
                                                style="width: 100%; padding: 15px 20px; border: 2px solid #ecf0f1; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: #f8f9fa;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-modern" style="margin-bottom: 30px;">
                                    <label class="control-label"
                                        style="color: #2c3e50; font-weight: 600; margin-bottom: 8px; display: block;">Phone
                                        Number <span style="color: #e74c3c;">*</span></label>
                                    <input type="text" name="contactno" class="form-control-modern" id="phonenumber"
                                        required maxlength="10" pattern="[0-9]+"
                                        style="width: 100%; padding: 15px 20px; border: 2px solid #ecf0f1; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: #f8f9fa;">
                                </div>

                                <div class="form-group-modern" style="margin-bottom: 30px;">
                                    <label class="control-label"
                                        style="color: #2c3e50; font-weight: 600; margin-bottom: 8px; display: block;">Message
                                        <span style="color: #e74c3c;">*</span></label>
                                    <textarea class="form-control-modern" name="message" rows="5" required
                                        style="width: 100%; padding: 15px 20px; border: 2px solid #ecf0f1; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; background: #f8f9fa; resize: vertical;"></textarea>
                                </div>

                                <div class="form-group-modern">
                                    <button class="btn-modern-primary" type="submit" name="send"
                                        style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; border: none; padding: 18px 40px; border-radius: 50px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4); display: inline-flex; align-items: center;">
                                        Send Message
                                        <span style="margin-left: 10px; transition: transform 0.3s ease;">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Contact Info Section -->
                        <div class="col-md-5"
                            style="background: linear-gradient(135deg, #2c3e50, #34495e); padding: 50px 40px; color: white; position: relative;">
                            <div class="contact-info-modern">
                                <h3
                                    style="color: white; font-size: 1.8rem; font-weight: 700; margin-bottom: 40px; position: relative;">
                                    Contact Information
                                    <span
                                        style="position: absolute; bottom: -10px; left: 0; width: 60px; height: 4px; background: #f39c12; border-radius: 2px;"></span>
                                </h3>

                                <div class="contact-details-modern">
                                    <div class="contact-item"
                                        style="display: flex; align-items: flex-start; margin-bottom: 35px; padding: 20px; background: rgba(255,255,255,0.1); border-radius: 12px; transition: all 0.3s ease;">
                                        <div class="icon-wrapper"
                                            style="background: #f39c12; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 20px; flex-shrink: 0;">
                                            <i class="fa fa-map-marker" aria-hidden="true"
                                                style="color: white; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h4
                                                style="color: #f39c12; margin: 0 0 8px 0; font-size: 1.1rem; font-weight: 600;">
                                                Our Location</h4>
                                            <p style="margin: 0; color: #ecf0f1; line-height: 1.5;">
                                                {{ $contactInfo->Address ?? 'Your Address Here' }}</p>
                                        </div>
                                    </div>

                                    <div class="contact-item"
                                        style="display: flex; align-items: flex-start; margin-bottom: 35px; padding: 20px; background: rgba(255,255,255,0.1); border-radius: 12px; transition: all 0.3s ease;">
                                        <div class="icon-wrapper"
                                            style="background: #27ae60; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 20px; flex-shrink: 0;">
                                            <i class="fa fa-phone" aria-hidden="true"
                                                style="color: white; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h4
                                                style="color: #27ae60; margin: 0 0 8px 0; font-size: 1.1rem; font-weight: 600;">
                                                Phone Number</h4>
                                            <p style="margin: 0; color: #ecf0f1;">
                                                <a href="tel:{{ $contactInfo->ContactNo ?? 'your-phone-number' }}"
                                                    style="color: #ecf0f1; text-decoration: none; font-weight: 600;">
                                                    {{ $contactInfo->ContactNo ?? 'Your Phone Number' }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="contact-item"
                                        style="display: flex; align-items: flex-start; padding: 20px; background: rgba(255,255,255,0.1); border-radius: 12px; transition: all 0.3s ease;">
                                        <div class="icon-wrapper"
                                            style="background: #3498db; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 20px; flex-shrink: 0;">
                                            <i class="fa fa-envelope-o" aria-hidden="true"
                                                style="color: white; font-size: 1.2rem;"></i>
                                        </div>
                                        <div>
                                            <h4
                                                style="color: #3498db; margin: 0 0 8px 0; font-size: 1.1rem; font-weight: 600;">
                                                Email Address</h4>
                                            <p style="margin: 0; color: #ecf0f1;">
                                                <a href="mailto:{{ $contactInfo->EmailId ?? 'your-email@example.com' }}"
                                                    style="color: #ecf0f1; text-decoration: none; font-weight: 600;">
                                                    {{ $contactInfo->EmailId ?? 'your-email@example.com' }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Info -->
                                <div class="additional-info"
                                    style="margin-top: 40px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.2);">
                                    <h4 style="color: #f39c12; margin-bottom: 15px; font-size: 1.1rem;">Business Hours</h4>
                                    <p style="margin: 0; color: #ecf0f1; line-height: 1.6;">
                                        <strong>Mon - Sun:</strong> 24/7 Available<br>
                                        <strong>Customer Support:</strong> Always Active
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Enhanced Contact Section-->

@endsection

@push('styles')
    <style>
        /* Modern Form Interactions */
        .form-control-modern:focus {
            outline: none;
            border-color: #3498db !important;
            background: white !important;
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.2) !important;
            transform: translateY(-2px);
        }

        /* Button Hover Effects */
        .btn-modern-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.6) !important;
        }

        .btn-modern-primary:hover span {
            transform: translateX(5px);
        }

        /* Contact Item Hover Effects */
        .contact-item:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15) !important;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .page-header-modern .page-heading h1 {
                font-size: 2.5rem !important;
            }

            .col-md-7,
            .col-md-5 {
                padding: 30px 25px !important;
            }
        }

        /* Custom Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact_item,
        .form-group-modern {
            animation: fadeInUp 0.6s ease-out;
        }

        .contact_item:nth-child(1) {
            animation-delay: 0.1s;
        }

        .contact_item:nth-child(2) {
            animation-delay: 0.2s;
        }

        .contact_item:nth-child(3) {
            animation-delay: 0.3s;
        }

        /* Modern Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 10px;
        }

        /* Selection Color */
        ::selection {
            background: #3498db;
            color: white;
        }
    </style>
@endpush

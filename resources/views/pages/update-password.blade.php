@extends('layouts.app')

@section('title', 'Update Password')

@section('content')
    <!--Page Header-->
    <section class="page-header profile_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Update Password</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Update Password</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <section class="user_profile inner_pages">
        <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40">
                <div class="upload_user_logo">
                    <img src="{{ asset('assets/images/dealer-logo.jpg') }}" alt="image">
                </div>

                <div class="dealer_info">
                    <h5>{{ Auth::user()->FullName }}</h5>
                    <p>{{ Auth::user()->Address }}<br>
                        {{ Auth::user()->City }}&nbsp;{{ Auth::user()->Country }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3">
                    @include('layouts.sidebar')
                </div>

                <div class="col-md-6 col-sm-8">
                    <div class="profile_wrap">
                        <!-- Simple form without AJAX -->
                        <form method="POST" action="{{ route('user.password.update') }}">
                            @csrf

                            <div class="gray-bg field-title">
                                <h6>Update password</h6>
                            </div>

                            @if (session('error'))
                                <div class="errorWrap">
                                    <strong>ERROR</strong>: {{ session('error') }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="succWrap">
                                    <strong>SUCCESS</strong>: {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="errorWrap">
                                    <strong>ERROR</strong>:
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="control-label">Current Password</label>
                                <input class="form-control white_bg" name="current_password" type="password" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">New Password</label>
                                <input class="form-control white_bg" type="password" name="new_password" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Confirm New Password</label>
                                <input class="form-control white_bg" type="password" name="new_password_confirmation"
                                    required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-block">Update Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
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
@endpush

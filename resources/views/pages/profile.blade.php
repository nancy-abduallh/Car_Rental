@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Profile</li>
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
        <h5>{{ $user->FullName }}</h5>
        <p>{{ $user->Address }}<br>
          {{ $user->City }}&nbsp;{{ $user->Country }}</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3 col-sm-3">
        <!-- Include sidebar if you have one -->
        @include('layouts.sidebar')
      </div>

      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">General Settings</h5>

          @if(session('success'))
            <div class="succWrap">
              <strong>SUCCESS</strong>: {{ session('success') }}
            </div>
          @endif

          @if(session('error'))
            <div class="errorWrap">
              <strong>ERROR</strong>: {{ session('error') }}
            </div>
          @endif

          <form action="{{ route('user.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="control-label">Reg Date -</label>
              {{ $user->RegDate }}
            </div>

            @if($user->UpdationDate)
            <div class="form-group">
              <label class="control-label">Last Update at -</label>
              {{ $user->UpdationDate }}
            </div>
            @endif

            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="{{ $user->FullName }}" id="fullname" type="text" required>
            </div>

            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="{{ $user->EmailId }}" name="emailid" id="email" type="email" required readonly>
            </div>

            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="{{ $user->ContactNo }}" id="phone-number" type="text" required>
            </div>

            <div class="form-group">
              <label class="control-label">Date of Birth&nbsp;(dd/mm/yyyy)</label>
              <input class="form-control white_bg" value="{{ $user->dob }}" name="dob" placeholder="dd/mm/yyyy" id="birth-date" type="text">
            </div>

            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4">{{ $user->Address }}</textarea>
            </div>

            <div class="form-group">
              <label class="control-label">Country</label>
              <input class="form-control white_bg" id="country" name="country" value="{{ $user->Country }}" type="text">
            </div>

            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="{{ $user->City }}" type="text">
            </div>

            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting-->

@endsection

@push('styles')
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
@endpush
@extends('layouts.app')

@section('title', 'My Testimonials')

@section('content')

<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Testimonials</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Testimonials</li>
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
        <!-- Include sidebar if you have one -->
        @include('layouts.sidebar')
      </div>

      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Testimonials</h5>

          <!-- Add Testimonial Form -->
          <div class="mb-4">
            <h6>Submit New Testimonial</h6>
            <form action="{{ route('testimonial.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <textarea class="form-control white_bg" name="testimonial" rows="4" required placeholder="Write your feedback..."></textarea>
              </div>
              <button type="submit" class="btn">Submit Testimonial <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
          </div>

          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
              @forelse($testimonials as $testimonial)
              <li>
                <div>
                  <p>{{ $testimonial->Testimonial }}</p>
                  <p><b>Posting Date:</b> {{ $testimonial->PostingDate }}</p>
                </div>

                @if($testimonial->status == 1)
                <div class="vehicle_status">
                  <a class="btn outline btn-xs active-btn">Active</a>
                  <div class="clearfix"></div>
                </div>
                @else
                <div class="vehicle_status">
                  <a href="#" class="btn outline btn-xs">Waiting for approval</a>
                  <div class="clearfix"></div>
                </div>
                @endif
              </li>
              @empty
              <li>
                <div>
                  <p>No testimonials submitted yet.</p>
                </div>
              </li>
              @endforelse
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/my-vehicles-->

@endsection
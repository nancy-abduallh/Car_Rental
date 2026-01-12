<aside class="sidebar bg-light p-3 rounded">
    <h5 class="mb-3">User Menu</h5>
    <ul class="list-unstyled fw-bold">
        <li><a href="{{ route('user.profile') }}">My Profile</a></li>
        <li><a href="{{ route('user.password') }}">Change Password</a></li>
        <li><a href="{{ route('booking.my') }}">My Bookings</a></li>
        <li><a href="{{ route('testimonial.index') }}">My Testimonials</a></li>
        <li><a href="{{ route('testimonial.create') }}">Post Testimonial</a></li>
        <li><a href="{{ route('logout') }}">Sign Out</a></li>

    </ul>
</aside>

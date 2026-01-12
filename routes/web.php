<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\{
    HomeController,
    VehicleController,
    BookingController,
    ContactController,
    PageController,
    TestimonialController,
    AuthController,
    UserController
};

use App\Http\Controllers\Admin\{
    AdminAuthController,
    AdminDashboardController,
    AdminBrandController,
    AdminVehicleController,
    AdminBookingController,
    AdminContactController,
    AdminSubscriberController,
    AdminPageController,
    AdminTestimonialController,
    AdminUserController,
    AdminContactInfoController
};

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function() {

Route::middleware(['web'])->group(function () {

    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Authentication
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::get('/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('password.forgot.form');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

    // Profile Routes
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');

    // Password Routes
    Route::get('/update-password', [UserController::class, 'updatePassword'])->name('user.password');
    Route::post('/update-password', [UserController::class, 'changePassword'])->name('user.password.update');

    // Vehicle Listings & Details
    Route::get('/cars', [VehicleController::class, 'index'])->name('car.listing');

    // Search Routes
    Route::get('/search', [VehicleController::class, 'searchForm'])->name('search.form');
    Route::get('/vehicle/search', [VehicleController::class, 'searchResult'])->name('vehicle.search');

    // Vehicle detail route - MUST come after search routes
    Route::get('/vehicle/{id}', [VehicleController::class, 'show'])->name('vehicle.show');

    // Check Availability
    Route::get('/check-availability', [BookingController::class, 'checkForm'])->name('booking.check.form');
    Route::post('/check-availability', [BookingController::class, 'checkAvailability'])->name('booking.check');

    // Bookings
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('booking.my');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Testimonials
    Route::get('/my-testimonials', [TestimonialController::class, 'index'])->name('testimonial.index');
    Route::get('/post-testimonial', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('/my-testimonials', [TestimonialController::class, 'store'])->name('testimonial.store');

    // Contact Us
    Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.us');
    Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

    // Static Pages (About, Terms, etc.)
    Route::get('/page/{type}', [PageController::class, 'show'])->name('page.show');

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
});


Route::prefix('admin')->group(function () {
    // Admin Authentication
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Admin Protected Routes
    Route::middleware(['admin'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Change Password
        Route::get('/change-password', [AdminAuthController::class, 'showChangePasswordForm'])->name('admin.change.password');
        Route::post('/change-password', [AdminAuthController::class, 'changePassword'])->name('admin.change.password.submit');

        // Registered Users
        Route::get('/reg-users', [AdminUserController::class, 'index'])->name('admin.reg-users');

        // Update Contact Info
        Route::get('/update-contactinfo', [AdminContactInfoController::class, 'edit'])->name('admin.contact.update');
        Route::post('/update-contactinfo', [AdminContactInfoController::class, 'update'])->name('admin.contact.update.submit');

        // Brands Management
        Route::get('/brands', [AdminBrandController::class, 'index'])->name('admin.brands');
        Route::get('/brands/create', [AdminBrandController::class, 'create'])->name('admin.brands.create');
        Route::post('/brands', [AdminBrandController::class, 'store'])->name('admin.brands.store');
        Route::get('/brands/{id}/edit', [AdminBrandController::class, 'edit'])->name('admin.brands.edit');
        Route::put('/brands/{id}', [AdminBrandController::class, 'update'])->name('admin.brands.update');
        Route::delete('/brands/{id}', [AdminBrandController::class, 'destroy'])->name('admin.brands.destroy');

        // Vehicles Management
        Route::get('/vehicles', [AdminVehicleController::class, 'index'])->name('admin.vehicles');
        Route::get('/vehicles/create', [AdminVehicleController::class, 'create'])->name('admin.vehicles.create');
        Route::post('/vehicles', [AdminVehicleController::class, 'store'])->name('admin.vehicles.store');

        // DELETE MUST COME BEFORE /edit ROUTE
        Route::delete('/vehicles/{id}', [AdminVehicleController::class, 'destroy'])->name('admin.vehicles.destroy');

        // Edit & Update
        Route::get('/vehicles/{id}/edit', [AdminVehicleController::class, 'edit'])->name('admin.vehicles.edit');
        Route::put('/vehicles/{id}', [AdminVehicleController::class, 'update'])->name('admin.vehicles.update');

        // Image management
        Route::get('/vehicles/{id}/change-image/{imageNumber}', [AdminVehicleController::class, 'showChangeImageForm'])->name('admin.vehicles.change.image');
        Route::post('/vehicles/{id}/change-image/{imageNumber}', [AdminVehicleController::class, 'updateImage'])->name('admin.vehicles.update.image');

        // Bookings Management
        Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
        Route::get('/bookings/confirmed', [AdminBookingController::class, 'confirmed'])->name('admin.bookings.confirmed');
        Route::get('/bookings/cancelled', [AdminBookingController::class, 'cancelled'])->name('admin.bookings.cancelled');
        Route::get('/bookings/{id}', [AdminBookingController::class, 'show'])->name('admin.bookings.show');
        Route::post('/bookings/{id}/confirm', [AdminBookingController::class, 'confirm'])->name('admin.bookings.confirm');
        Route::post('/bookings/{id}/cancel', [AdminBookingController::class, 'cancel'])->name('admin.bookings.cancel');

        // Contact Queries
        Route::get('/contact-queries', [AdminContactController::class, 'index'])->name('admin.contact.queries');
        Route::post('/contact-queries/{id}/mark-read', [AdminContactController::class, 'markAsRead'])->name('admin.contact.queries.mark.read');

        // Subscribers
        Route::get('/subscribers', [AdminSubscriberController::class, 'index'])->name('admin.subscribers');
        Route::delete('/subscribers/{id}', [AdminSubscriberController::class, 'destroy'])->name('admin.subscribers.destroy');

        // Pages Management
        Route::get('/pages', [AdminPageController::class, 'index'])->name('admin.pages');
        Route::post('/pages/{type}', [AdminPageController::class, 'update'])->name('admin.pages.update');

        // Testimonials Management
        Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('admin.testimonials');
        Route::post('/testimonials/{id}/activate', [AdminTestimonialController::class, 'activate'])->name('admin.testimonials.activate');
        Route::post('/testimonials/{id}/deactivate', [AdminTestimonialController::class, 'deactivate'])->name('admin.testimonials.deactivate');    });
});
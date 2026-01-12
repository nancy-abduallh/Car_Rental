<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')
            ->get()
            ->map(function($testimonial) {
                $testimonial->FullName = $testimonial->user->FullName ?? 'N/A';
                return $testimonial;
            });

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function activate($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->status = 1;
        $testimonial->save();

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial Successfully Active');
    }

    public function deactivate($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->status = 0;
        $testimonial->save();

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial Successfully Inactive');
    }
}
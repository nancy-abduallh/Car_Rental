<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function index()
    {
        $email = Auth::user()->EmailId ?? 'guest@local';
        $testimonials = Testimonial::where('UserEmail', $email)->get();
        return view('pages.my-testimonials', compact('testimonials'));
    }

    public function create()
    {
        return view('pages.post-testimonial');
    }


    public function store(Request $request)
    {
        $request->validate(['testimonial' => 'required|string|max:500']);

        Testimonial::create([
            'UserEmail' => Auth::user()->EmailId ?? 'guest@local',
            'Testimonial' => $request->testimonial,
            'status' => 0
        ]);

        return back()->with('success', 'Your testimonial has been submitted!');
    }
}

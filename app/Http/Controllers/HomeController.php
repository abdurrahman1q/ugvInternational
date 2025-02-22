<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Faculty;
use App\Models\Notice;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notices = Notice::latest()->where('status', 'Published')->get();
        $events = Event::latest()->where('status', 'Published')->limit(3)->get();
        $blogs = Blog::latest()->where('status', 'Published')->limit(3)->get();
        $sliders = Slider::latest()->get();
        return view('pages.home', compact('notices', 'events', 'sliders', 'blogs'));
    }
    public function about()
    {
        return view('pages.about');
    }
}

<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial_no', 'ASC')->get();
        $projects = Project::where('status', 'active')->get();
        $events = Event::where('status', 'active')->orderBy('order_no', 'ASC')->limit(8)->get();
        $partners = Partner::where('status', 'published')->orderBy('order_no', 'ASC')->get();
        $countries = Country::all();
        $galleries = Gallery::where("category_id", 2)->orderBy("serial_number", "ASC")->get();
        return view('website.index', compact('sliders', 'countries', 'projects', 'events', 'partners', 'galleries'));
    }

























    public function homepage()
    {
        $sliders = Slider::where('status', 1)->orderBy('serial_no', 'ASC')->get();
        $projects = Project::where('status', 'active')->get();
        return view('website.mhow-home-page', compact('sliders', 'projects'));
    }

}

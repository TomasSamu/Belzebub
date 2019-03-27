<?php

namespace App\Http\Controllers;

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
        return view('first');
    }
    public function welcome()
    {
        return view('first');
    }
    public function tc()
    {
        return view('footer/tc');
    }
    public function faq()
    {
        return view('footer/faq');
    }

    public function aboutus()
    {
        return view('footer/aboutus');
    }
    public function contactus()
    {
        return view('footer/contactus');
    }
}

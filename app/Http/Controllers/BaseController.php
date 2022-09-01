<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function causes() {
        return view('berita');
    }

    public function team() {
        return view('team');
    }

    public function testimonial() {
        return view('testimonial');
    }

    public function donate() {
        return view('donate');
    }

    public function contact() {
        return view('contact');
    }
}

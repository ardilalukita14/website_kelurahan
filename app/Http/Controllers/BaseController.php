<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index() {
        return view('index');
    }

    public function causes() {
        return view('berita');
    }

    public function contact() {
        return view('contact');
    }

    public function standar() {
        return view('standarpelayanan');
    }
}

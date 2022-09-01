<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin() {
        return view('dashboard.index');
    }

    public function widgets() {
        return view('dashboard.widgets');
    }
}

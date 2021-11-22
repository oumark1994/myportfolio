<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view ('admin.dashboard');
    }

    public function slider(){
        $sliders = Home::get();
        return view ('admin.home')->with('sliders',$sliders);
    }
}

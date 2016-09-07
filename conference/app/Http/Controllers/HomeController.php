<?php

namespace conference\Http\Controllers;

use conference\Http\Requests;
use Illuminate\Http\Request;
use conference\Sector;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectorsEnable = Sector::where('state','=','enable')->get();
        $sectorsDisabled = Sector::where('state','=','disabled')->get();
        return view('home', compact('sectorsEnable','sectorsDisabled'));
    }

}

<?php

namespace App\Http\Controllers;

use App\model\Questionare;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questionares = auth()->user()->questionares;
        return view('home',compact('questionares'));
    }
}

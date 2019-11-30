<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Bjora\Question;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::paginate(10);
        return view('/home', compact('questions'));
    }
}

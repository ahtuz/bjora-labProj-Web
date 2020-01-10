<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Bjora\Question;
use Bjora\User;
use Illuminate\Support\Facades\Auth;

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
        // return question ordered by the date
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);
        return view('/home', compact('questions'));
    }

    public function searchIndex(Request $request){
        $search = $request->q;

        $questions = Question::where('question_detail', 'LIKE', "%$search%")->orWhereHas('user', function($u) use ($search){return $u->where('username', 'LIKE', "%$search%");})->paginate(10);

        return view('/home', compact('questions'));
    }

    public function pageNotFound(){
        return view('error_page');
    }
}
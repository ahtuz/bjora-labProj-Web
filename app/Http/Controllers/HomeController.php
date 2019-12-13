<?php

namespace Bjora\Http\Controllers;

use Illuminate\Http\Request;
use Bjora\Question;
use Bjora\User;

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

    public function searchIndex(Request $request){
        $search = $request->q;

        $users = User::where('username', 'LIKE', "%$search%")->get();
        $questions = Question::whereIn('user_id', $users)->orWhere('question_detail', 'LIKE', "%$search%")->paginate(10);

        return view('/home', compact('questions'));
    }
}

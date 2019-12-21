<?php

namespace Bjora\Http\Controllers;

use Bjora\User;
use Bjora\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if(Auth::attempt(['email'=>$email, 'password'=>$password])){
            $response = \Response::make(redirect('/home'));
            if($remember){
                request()->session()->get('user');
                $response->cookie('user_cookie', $email, 120);
            }
            return $response;
        }
        return redirect()->back();
    }

    public function logout(){

        $response = \Response::make(redirect('/home'));

        $response->cookie(\Cookie::forget('user_cookie'));

        Auth::logout();

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user/show_user', ['user'=>$user]);
    }

    // Show questions made by the user, by comparing id in both tables
    public function viewQuestion($id)
    {
        $questions = Question::where('user_id', $id)->paginate(10);
        return view('user/view_user_questions', compact('questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user/edit_user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // get the filename with time, so there will be no duplicate files
        $file = $request['profile_picture'];
        $filename = $request['username'] . '-' . time() . '-' . $file->getClientOriginalName();
        $file->storeAs('profile_pictures', $filename, 'public');

        $request->validate([
            'username' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed|alpha_num',
            'gender' => 'required',
            'address' => 'required',
            'role' => 'required',
            'birthday' => 'required|date_format:Y-m-d',
            'profile_picture' => 'required|mimes:jpg,jpeg,png',
        ]);

        $user->username = $request->username;
        $user->email = $request->question_label;
        $user->password = Hash::make($request['password']);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->profile_picture = $filename;
        $user->save();

        return redirect()->route('show_user', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchIndex(Request $request, $id){
        $search = $request->q;

        $questions = Question::where('question_detail', 'LIKE', "%$search%")->where('user_id', $id)->paginate(10);

        return view('user/view_user_questions', compact('questions'));
    }
}

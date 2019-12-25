<?php

namespace Bjora\Http\Controllers;

use Bjora\Answer;
use Bjora\Question;
use Bjora\User;
use Bjora\Label;
use Bjora\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function view_users(){
        $users = User::all();
        return view('admin/view_users', compact('users'));
    }

    public function view_labels(){
        $question_labels = Label::paginate(10);
        return view('admin/view_question_label', compact('question_labels'));
    }

    public function add_user(){
        return view('admin/add_user');
    }

    public function store_user(Request $request){

        // validation for adding user
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

        $file = $request['profile_picture'];
        $filename = $request['username'] . '-' . time() . '-' . $file->getClientOriginalName();
        $file->storeAs('profile_pictures', $filename, 'public');
        
        // the usual way to create new User using Eloquent
        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' => $request['gender'],
            'address' => $request['address'],
            'profile_picture' => $filename,
            'role' => $request['role'],
            'birthday' => $request['birthday'],
        ]);

        return redirect()->route('view_users');
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('admin/edit_user', compact('user'));
    }

    public function update_user(Request $request, $id)
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
        $user->email = $request->email;
        $user->password = Hash::make($request['password']);
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->birthday = $request->birthday;
        $user->profile_picture = $filename;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('view_users');
    }

    public function delete_user($id)
    {
        User::destroy($id);
        return redirect()->route('view_users');
    }

    public function change_status(Request $request, $id){

        $question = Question::find($id);
        $question->status = $request->status;
        $question->save();

        return redirect()->back();
    }

    public function admin_edit_question($id)
    {
        $labels = Label::all();
        $question = Question::find($id);
        return view('admin/edit_question', ['question'=>$question], compact('labels'));
    }

    public function view_questions(){
        $questions = Question::paginate(10);
        return view('admin/view_questions', compact('questions'));
    }
    
    public function edit_user_question($id)
    {
        $labels = Label::all();
        $question = Question::find($id);
        return view('admin/edit_question', ['question'=>$question], compact('labels'));
    }

    public function update_user_question(Request $request, $id)
    {
        $request->validate([
            'question_detail'=>'required',
            'label_id'=>'required',
        ]);

        $question = Question::find($id);
        $user = $question->user_id;
        $question->question_detail = $request->question_detail;
        $question->label_id = $request->label_id;
        $question->save();

        $questions = Question::paginate(10);
        return view('admin/view_questions', compact('questions'));
    }

    public function destroy_user_question($id)
    {
        Question::destroy($id);

        return redirect()->back();
    }

    public function show_message(Message $message, $id)
    {
        $messages = Message::where('recipient_id', $id)->paginate(10);
        return view('admin/inbox', compact('messages'));
    }

    public function destroy_message($id)
    {
        Message::destroy($id);
        return redirect()->back();
    }

    public function edit_answer(Request $request)
    {
        $answer = Answer::find($request->id);
        $question = $answer->question;
        return view('admin/edit_answer', compact('answer'), compact('question'));
    }

    public function update_answer(Request $request, $id)
    {
        $request->validate([
            'answer_detail'=>'required',
        ]);

        $answer = Answer::find($id);
        $answer->answer_detail = $request->answer_detail;
        $answer->save();
        return redirect()->route('show_question', $answer->question_id);
    }

    public function destroy_answer($id)
    {
        Answer::destroy($id);
        return redirect()->back();
    }
}

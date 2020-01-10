<?php

namespace Bjora\Http\Controllers;

use Bjora\Question;
use Bjora\Answer;
use Bjora\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd($labels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labels = Label::all();
        return view('question/add_question', compact('labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation for newly added question
        $request->validate([
            'question_detail' => 'required',
            'label_id' => 'required',
        ]);

        $question = new Question();
        $question->user_id = auth()->user()->id;
        $question->question_detail = $request->question_detail;
        $question->label_id = $request->label_id;
        $question->status = 1;
        $question->save();

        return redirect()->route('home')->with('status', 'Your question have been submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $answer = Answer::where('question_id', $id)->get();
        return view('question/show_question', ['question'=>$question], compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $labels = Label::all();
        $question = Question::find($id);
        return view('question/edit_question', ['question'=>$question], compact('labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update for question
        $request->validate([
            'question_detail'=>'required',
            'label_id'=>'required',
        ]);

        $question = Question::find($id);
        $question->question_detail = $request->question_detail;
        $question->label_id = $request->label_id;
        $question->save();

        return redirect()->route('view_user_questions', Auth::id())->with('status', 'Your question have been updated.');
    }

    public function change_status(Request $request, $id){

        // function to change status open / close
        $question = Question::find($id);
        $question->status = $request->status;
        $question->save();

        return redirect()->back()->with('status', 'Your question\'s status have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect()->route('view_user_questions', Auth::id())->with('status', 'Your question have been deleted.');
    }
}

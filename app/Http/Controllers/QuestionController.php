<?php

namespace Bjora\Http\Controllers;

use Bjora\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
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
        return view('question/add_question');
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
            'question_detail'=>'required',
            'question_label'=>'required',
        ]);

        $question = new Question();
        $question->user_id = auth()->user()->id;
        $question->question_detail = $request->question_detail;
        $question->question_label = $request->question_label;
        $question->save();

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('question/edit_question', ['question'=>$question]);
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
        $request->validate([
            'question_detail'=>'required',
            'question_label'=>'required',
        ]);

        $question = Question::find($id);
        $question->question_detail = $request->question_detail;
        $question->question_label = $request->question_label;
        $question->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        Question::destroy($id);
        return redirect()->route('home');
    }
}

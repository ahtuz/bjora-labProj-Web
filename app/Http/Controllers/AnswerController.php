<?php

namespace Bjora\Http\Controllers;

use Bjora\Answer;
use Bjora\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
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
        $request->validate([
            'answer_detail'=>'required',
        ]);

        $answer = new Answer();
        $answer->user_id = auth()->user()->id;  
        $answer->question_id = $request->id;
        $answer->answer_detail = $request->answer_detail;
        $answer->save();

        return redirect()->route('show_question', $request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bjora\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bjora\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $answer = Answer::find($request->id);
        $question = $answer->question;
        return view('answer/edit_answer', compact('answer'), compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bjora\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::find($id);
        $answer->answer_detail = $request->answer_detail;
        $answer->save();
        return redirect()->route('show_question', $answer->question_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Answer::destroy($id);
        return redirect()->back();
    }
}

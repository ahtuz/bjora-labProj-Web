<?php

namespace Bjora\Http\Controllers;

use Bjora\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question_labels = Label::paginate(10);
        return view('/admin/view_question_label', compact('question_labels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/add_question_label');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Label::firstOrCreate(['question_label' => $request->question_label]);
        $question_labels = Label::paginate(10);
        return view('/admin/view_question_label', compact('question_labels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bjora\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bjora\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function edit(Label $label, $id)
    {
        $label = Label::find($id);
        return view('admin/edit_question_label', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bjora\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $label = Label::find($id);
        
        $label->question_label = $request->question_label;
        $label->save();

        return redirect()->route('view_label');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Label::destroy($id);
        return redirect()->back();
    }
}

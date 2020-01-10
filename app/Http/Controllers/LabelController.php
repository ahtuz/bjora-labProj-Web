<?php

namespace Bjora\Http\Controllers;

use Bjora\Label;
use Bjora\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // validation add new label
        $validator = Validator::make($request->all(), [
            'question_label' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // add the label using model
        Label::firstOrCreate(['question_label' => $request->question_label]);
        $question_labels = Label::paginate(10);
        return redirect()->route('view_label')->with('status', 'Label successfully added.');
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
        $request->validate([
            'question_label'=>'required',
        ]);

        $label = Label::find($id);
        
        $label->question_label = $request->question_label;
        $label->save();

        return redirect()->route('view_label')->with('status', 'Label successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bjora\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // change all affected questions with the deleted label into "Unspecified" (id label = 1) topic/label
        if ('label_id' != 1) {
            Question::where('label_id', $id)->update(['label_id' => 1]);
        } else {
            // if the deleted label is "Unspecified", delete all remaining "Unspecified" label/topic questions
            Question::where('label_id', $id)->delete();
        }
        
        Label::destroy($id);
        return redirect()->back()->with('status', 'Label successfully deleted.');
    }
}

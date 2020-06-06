<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msg_success = Session::get('msg_success');

        $questions = Question::all();

        return view('question.index')->with(
            [
                'questions'=> $questions,
                'msg_success' => $msg_success
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required | min:3',
                'shortName' => 'max:10'
            ]
        );

        $question = new Question(
            [
                'name' => $request->name,
                'description' => $request->description,
                'shortName' => $request->shortName
            ]
        );

        $question->save();

        return redirect('/question')->with(
            'msg_success', 'Speichern von <b>' . $request->name . '</b> erfolgreich.'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('question.edit')->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $request->validate(
            [
                'name' => 'required | min:3',
                'shortName' => 'max:10'
            ]
        );

        $question->update(
            [
                'name' => $request->name,
                'description' => $request->description,
                'shortName' => $request->shortName
            ]
        );

        $question->save();

        return redirect('/question')->with(
            'msg_success', 'Änderung von <b>' . $request->name . '</b> erfolgreich gespeichert.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $oldName = $question->name;
        $question->delete();

        return back()->with([
            'msg_success' => 'Die Frage <b>' .$oldName. '</b> wurde gelöscht'
        ]);
    }
}

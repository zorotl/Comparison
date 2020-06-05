<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('auth');
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
        $answers = Answer::where('user_id', auth()->id())->first();
        $answers = (isset($answers->answers)) ? json_decode($answers->answers, true) : array();

        return view('answer.index')->with(
            [
                'questions'=> $questions,
                'answers' => $answers,
                'msg_success' => $msg_success
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('submit', '_token');     // Request aus Form in Array speichern, exklusive submit und token
        $string = json_encode($input);                          // Arrays $_POST[] in JSON-String umwandeln

        $answer = Answer::where('user_id', Auth::id())->first();

        if (!isset($answer))
            $answer = new Answer;       // Neuen Eintrag in Datenbank speichern

        $answer->user_id = Auth::id();
        $answer->answers = $string;
        $answer->save();

        return redirect('/answer/')->with('msg_success', 'Deine Antworten wurden erfolgreich gespeichert!');
    }

    public function evaluateStart()
    {

    }

    public function evaluation()
    {

    }
}

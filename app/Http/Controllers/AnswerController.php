<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\User;
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
        $user = User::where('id', Auth::id())->first();
        return view('answer.evaluate')->with('user', $user);
    }

    public function evaluation(Request $request)
    {
        $request->validate(
            [
                'codeOwn' => 'required | min:10 | max:30',
                'codeOther' => 'required | different:codeOwn | min:10 | max:30'
            ]
        );

        $this->_updateAnswerStrings($request->codeOwn);
        $this->_updateAnswerStrings($request->codeOther);

        // Alle Fragen laden
        $questions = Question::all();

        // Die eigenen Antworten laden
        $answersOwn = Answer::where('user_id', Auth::id())->first();
        $answersOwn = (isset($answersOwn->answers)) ? json_decode($answersOwn->answers, true) : null;

        //Die zu vergleichenden Antworten laden
        $user = User::where('code', $request->codeOther)->first();
        if (isset($user->id))
            $answersOther = Answer::where('user_id', $user->id)->first();
        $answersOther = (isset($answersOther->answers)) ? json_decode($answersOther->answers, true) : null;

        // Mit Fehler zurück, wenn Antworten von einem der beiden User nicht gesetzt sind
        if ($answersOwn === null || $answersOther === null)
            return redirect()->back()->withErrors(['Error001' => 'Code ungültig oder Antworten von einem der beiden Usern nicht gesetzt']);

        // Array mit den übereinstimmendne Antworten erzeugen
        $i = 0;
        foreach ($answersOwn as $key => $value)
        {
            $checkVar = $value . $answersOther[$key];
            if ($checkVar === "jaja" || $checkVar === "evev" || $checkVar === "jaev" || $checkVar === "evja")
                $compareResult[$questions[$i]->name] = $questions[$i]->description;
            $i++;
        }

        return view('answer.evaluatePost')->with('result', $compareResult);
    }

    protected function _updateAnswerStrings($code)
    {
        $id = array();
        $newAnswers = array();

        // Alle Fragen laden
        $questions = Question::all();

        // Die ID's der Fragen im Array $id[] speichern
        $i = 0;
        foreach ($questions as $question)
        {
            $id[$i] = $question['id'];
            $i++;
        }

        // Laden der Antworten
        $user = User::where('code', $code)->first();
        if (isset($user->id))
            $answers = Answer::where('user_id', $user->id)->first();

        // Antworten in assoc. Array  umwandeln
        $answersArray = (isset($answers->answers)) ? json_decode($answers->answers, true) : null;

        // Prüfung, ob auslesen und Umwandlung ok
        if ($answersArray === null)
            return redirect()->back()->withErrors(['Error002' => 'Code ungültig oder Antworten von einem der beiden Usern nicht gesetzt (E002)']);

        // Antwort-Array aktualisieren
        foreach ($id as $i)
        {
            if (isset($answersArray[$i]))
                $newAnswers[$i] = $answersArray[$i];    // Wenn Antwort vorhandne, gleiche Antwort setzen
            else
                $newAnswers[$i] = "nein";               // Wenn keine Antwort vorhanden, als Standard "nein"
        }

        // Array newAnswers in JSON-String umwandeln
        $string = json_encode($newAnswers);

        // Antworten für UPDATE vorbereiten
        $answers->update(         [
                'answers' => $string
            ]
        );

        // UPDATE ausführen
        $answers->save();
    }
}

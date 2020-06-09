<?php

namespace App\Http\Controllers;

use App\GuestAnswer;
use Illuminate\Http\Request;

class GuestAnswerController extends Controller
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
    public function store(Request $request):string
    {
        $generalCode = $request->generalCode;

        $firstSecond = $request->firstSecond;

        if ($firstSecond === "second")
            $count = GuestAnswer::where('general_code', $generalCode)->count();

        if ($count === 0)
            return false;

        // Request aus Form in Array speichern, exklusive submit, token, firstSecond, generalCode
        $input = $request->except('submit', '_token', 'firstSecond', 'generalCode');

        $string = json_encode($input);          // Arrays $input in JSON-String umwandeln
        $uniqid = uniqid();

        // Neuen Eintrag für DB vorbereiten und speichern
        $guestAnswer = new GuestAnswer;
        $guestAnswer->answers = $string;
        $guestAnswer->general_code = $generalCode;
        $guestAnswer->personal_code = $uniqid;
        $guestAnswer->save();

        return $uniqid;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GuestAnswer  $guestAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(GuestAnswer $guestAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GuestAnswer  $guestAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(GuestAnswer $guestAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GuestAnswer  $guestAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestAnswer $guestAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GuestAnswer  $guestAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestAnswer $guestAnswer)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Answer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function ageDemographics()
    {
        $ageData = Answer::where('question_id', 2)
            ->selectRaw('value as age, COUNT(*) as count')
            ->groupBy('age')
            ->get();

        return response()->json($ageData);
    }

    public function genderDemographics()
    {
        $genderData = Answer::where('question_id', 3)
            ->selectRaw('value as gender, COUNT(*) as count')
            ->groupBy('gender')
            ->get();

        return response()->json($genderData);
    }
}

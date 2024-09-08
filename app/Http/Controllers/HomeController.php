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

    // app/Http/Controllers/HomeController.php

    public function ageDemographics()
    {
        $seventeen = Answer::where('question_id', 10)
            ->selectRaw('SUM(value) as seventeen')
            ->first();

        $thirty = Answer::where('question_id', 11)
            ->selectRaw('SUM(value) as thirty')
            ->first();

        $fortyfive = Answer::where('question_id', 12)
            ->selectRaw('SUM(value) as fortyfive') // Corrected to fortyfive
            ->first();

        $sixty = Answer::where('question_id', 13)
            ->selectRaw('SUM(value) as sixty')
            ->first();

        return response()->json([
            'seventeen' => $seventeen->seventeen,
            'thirty' => $thirty->thirty,
            'fortyfive' => $fortyfive->fortyfive,
            'sixty' => $sixty->sixty,
        ]);
    }


    public function genderDemographics()
    {
        $genderData = Answer::where('question_id', 5)
            ->selectRaw('value as gender, COUNT(*) as count')
            ->groupBy('gender')
            ->get();

        return response()->json($genderData);
    }
}

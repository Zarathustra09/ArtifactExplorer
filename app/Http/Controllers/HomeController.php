<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MattDaneshvar\Survey\Models\Answer;
use MattDaneshvar\Survey\Models\Entry;

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
        $visitToday = $this->visitToday();
        $visitMonth = $this->visitThisMonth();
        return view('home', compact('visitToday', 'visitMonth'));
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


// app/Http/Controllers/HomeController.php

    public function mostVisited()
    {
        $entriesByDay = Entry::selectRaw('DAYNAME(created_at) as day, COUNT(DISTINCT device_identifier) as visits')
            ->groupBy('day')
            ->orderBy(DB::raw('FIELD(day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")'))
            ->get();

        return response()->json($entriesByDay);
    }

    public function visitToday()
    {
        return Entry::whereDate('created_at', Carbon::today())
            ->distinct('device_identifier')
            ->count('device_identifier');
    }

    public function visitThisMonth()
    {
        return Entry::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->distinct('device_identifier')
            ->count('device_identifier');
    }




}

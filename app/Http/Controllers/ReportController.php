<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MattDaneshvar\Survey\Models\Survey;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        return view('reports.index');
    }

    public function dataTable(Request $request)
    {
        $feedbackSurvey = Survey::where('name', 'Visitor Feedback')->first();

        $entries = DB::table('entries')
            ->join('answers', 'entries.id', '=', 'answers.entry_id')
            ->where('entries.survey_id', $feedbackSurvey->id)
            ->whereIn('answers.question_id', range(14, 24))
            ->select('entries.device_identifier', 'answers.question_id', 'answers.value')
            ->get()
            ->groupBy('device_identifier')
            ->map(function ($group) {
                $result = ['device_identifier' => $group->first()->device_identifier];
                foreach ($group as $entry) {
                    $result['question_' . $entry->question_id] = $entry->value;
                }
                return $result;
            })
            ->values();

        return response()->json(['data' => $entries]);
    }





}

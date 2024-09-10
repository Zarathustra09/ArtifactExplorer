<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $results = $this->getSurveyReport($search);

        if ($request->ajax()) {
            return response()->json(['results' => $results->items()]);
        }

        return view('reports.index', ['results' => $results, 'search' => $search]);
    }

    public function getSurveyReport($search = null)
    {
        $survey1Id = 1;
        $survey2Id = 2;
        $fullNameQuestionId = 2;
        $visitQuestionId = 14;
        $feedbackQuestionId = 15;

        $query = DB::table('entries as e1')
            ->join('answers as a1', 'e1.id', '=', 'a1.entry_id')
            ->join('entries as e2', 'e1.device_identifier', '=', 'e2.device_identifier')
            ->join('answers as a2', 'e2.id', '=', 'a2.entry_id')
            ->where('e1.survey_id', $survey1Id)
            ->where('e2.survey_id', $survey2Id)
            ->whereIn('a1.question_id', [$fullNameQuestionId])
            ->whereIn('a2.question_id', [$visitQuestionId, $feedbackQuestionId])
            ->select(
                DB::raw('MAX(CASE WHEN a1.question_id = ' . $fullNameQuestionId . ' THEN a1.value END) as full_name'),
                DB::raw('MAX(CASE WHEN a2.question_id = ' . $visitQuestionId . ' THEN a2.value END) as visit_rating'),
                DB::raw('MAX(CASE WHEN a2.question_id = ' . $feedbackQuestionId . ' THEN a2.value END) as feedback')
            )
            ->groupBy('e1.device_identifier');

        if ($search) {
            $query->having('full_name', 'like', '%' . $search . '%')
                ->orHaving('visit_rating', 'like', '%' . $search . '%')
                ->orHaving('feedback', 'like', '%' . $search . '%');
        }

        return $query->paginate(10);
    }



}

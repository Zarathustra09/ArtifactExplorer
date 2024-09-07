<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorInformationController extends Controller
{

// app/Http/Controllers/VisitorInformationController.php
    public function index()
    {
        $data = $this->getVisitorData();
        return view('visitor_information.index', compact('data'));
    }

    private function getVisitorData()
    {
        return DB::table('answers')
            ->select('entry_id', 'question_id', 'value')
            ->whereIn('question_id', [1, 2, 3, 4, 5])
            ->get()
            ->groupBy('entry_id')
            ->map(function ($answers, $entryId) {
                $result = [
                    'id' => $entryId,
                    'full_name' => null,
                    'age' => null,
                    'gender' => null,
                    'occupation' => null,
                    'nationality' => null,
                ];

                foreach ($answers as $answer) {
                    switch ($answer->question_id) {
                        case 1:
                            $result['full_name'] = $answer->value;
                            break;
                        case 2:
                            $result['age'] = $answer->value;
                            break;
                        case 3:
                            $result['gender'] = $answer->value;
                            break;
                        case 4:
                            $result['occupation'] = $answer->value;
                            break;
                        case 5:
                            $result['nationality'] = $answer->value;
                            break;
                    }
                }

                return $result;
            })
            ->values();
    }
    public function dataTable()
    {
        $data = DB::table('answers')
            ->select('entry_id', 'question_id', 'value')
            ->whereIn('question_id', [1, 2, 3, 4, 5])
            ->get()
            ->groupBy('entry_id')
            ->map(function ($answers) {
                $result = [
                    'full_name' => null,
                    'age' => null,
                    'gender' => null,
                    'occupation' => null,
                    'nationality' => null,
                ];

                foreach ($answers as $answer) {
                    switch ($answer->question_id) {
                        case 1:
                            $result['full_name'] = $answer->value;
                            break;
                        case 2:
                            $result['age'] = $answer->value;
                            break;
                        case 3:
                            $result['gender'] = $answer->value;
                            break;
                        case 4:
                            $result['occupation'] = $answer->value;
                            break;
                        case 5:
                            $result['nationality'] = $answer->value;
                            break;
                    }
                }

                return $result;
            })
            ->values();

        return response()->json($data);
    }
}

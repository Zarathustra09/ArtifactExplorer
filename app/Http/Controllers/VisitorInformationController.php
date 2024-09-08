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
            ->whereIn('question_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]) // Include question 13
            ->get()
            ->groupBy('entry_id')
            ->map(function ($answers, $entryId) {
                $result = [
                    'id' => $entryId,
                    'bus_number' => null,
                    'full_name' => null,
                    'address' => null,
                    'nationality' => null,
                    'gender' => null,
                    'students_grade_school' => null,
                    'students_high_school' => null,
                    'students_college' => null,
                    'pwd' => null,
                    'age_17_below' => null,
                    'age_18_30' => null,
                    'age_31_45' => null,
                    'age_60_above' => null,
                ];

                foreach ($answers as $answer) {
                    switch ($answer->question_id) {
                        case 1:
                            $result['bus_number'] = $answer->value;
                            break;
                        case 2:
                            $result['full_name'] = $answer->value;
                            break;
                        case 3:
                            $result['address'] = $answer->value;
                            break;
                        case 4:
                            $result['nationality'] = $answer->value;
                            break;
                        case 5:
                            $result['gender'] = $answer->value;
                            break;
                        case 6:
                            $result['students_grade_school'] = $answer->value;
                            break;
                        case 7:
                            $result['students_high_school'] = $answer->value;
                            break;
                        case 8:
                            $result['students_college'] = $answer->value;
                            break;
                        case 9:
                            $result['pwd'] = $answer->value;
                            break;
                        case 10:
                            $result['age_17_below'] = $answer->value;
                            break;
                        case 11:
                            $result['age_18_30'] = $answer->value;
                            break;
                        case 12:
                            $result['age_31_45'] = $answer->value;
                            break;
                        case 13:
                            $result['age_60_above'] = $answer->value;
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
            ->whereIn('question_id', [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]) // Include question 13
            ->get()
            ->groupBy('entry_id')
            ->map(function ($answers) {
                $result = [
                    'bus_number' => null,
                    'full_name' => null,
                    'address' => null,
                    'nationality' => null,
                    'gender' => null,
                    'students_grade_school' => null,
                    'students_high_school' => null,
                    'students_college' => null,
                    'pwd' => null,
                    'age_17_below' => null,
                    'age_18_30' => null,
                    'age_31_45' => null,
                    'age_60_above' => null,
                ];

                foreach ($answers as $answer) {
                    switch ($answer->question_id) {
                        case 1:
                            $result['bus_number'] = $answer->value;
                            break;
                        case 2:
                            $result['full_name'] = $answer->value;
                            break;
                        case 3:
                            $result['address'] = $answer->value;
                            break;
                        case 4:
                            $result['nationality'] = $answer->value;
                            break;
                        case 5:
                            $result['gender'] = $answer->value;
                            break;
//                        case 6:
//                            $result['students_grade_school'] = $answer->value;
//                            break;
//                        case 7:
//                            $result['students_high_school'] = $answer->value;
//                            break;
//                        case 8:
//                            $result['students_college'] = $answer->value;
//                            break;
                        case 9:
                            $result['pwd'] = $answer->value;
                            break;
//                        case 10:
//                            $result['age_17_below'] = $answer->value;
//                            break;
//                        case 11:
//                            $result['age_18_30'] = $answer->value;
//                            break;
//                        case 12:
//                            $result['age_31_45'] = $answer->value;
//                            break;
//                        case 13:
//                            $result['age_60_above'] = $answer->value;
//                            break;
                    }
                }

                return $result;
            })
            ->values();

        return response()->json($data);
    }
}

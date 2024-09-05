<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;
class GuestController extends Controller
{
    public function create()
    {
        $survey = Survey::where('name', 'Visitor Information')->first();

        return view('survey.guest', ['survey' => $survey]);

    }

    public function store(Request $request)
    {
        $survey = $this->survey();

        // Validate the request data using the survey rules
        $answers = $request->validate($survey->rules);

        // Create a new entry with the validated answers
        (new Entry)->for($survey)->fromArray($answers)->push();

        return redirect()->back()->with('success', 'Survey submitted successfully!');
    }

    protected  function survey(){
        return Survey::where('name', 'Visitor Information')->first();
    }

}

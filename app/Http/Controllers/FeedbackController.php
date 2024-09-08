<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;

class FeedbackController extends Controller
{
    public function create()
    {
        $survey = Survey::where('name', 'Visitor Feedback')->first();
        return view('survey.feedback', ['survey' => $survey]);
    }



    // app/Http/Controllers/FeedbackController.php

    public function store(Request $request)
    {
        $deviceIdentifier = Cookie::get('device_identifier');

        // If the cookie exists
        if ($deviceIdentifier) {
            // Check if the user has already submitted a response for survey_id = 2
            $existingEntry = Entry::where('device_identifier', $deviceIdentifier)
                ->where('survey_id', 2)
                ->first();

            if ($existingEntry) {
                return redirect()->back()->with('error', 'You have already submitted a response.');
            }

            // Validate the request data
            $request->validate([
                'rating' => 'required|integer|min:1|max:5',
            ]);

            // Create a new entry with the validated rating
            $entry = new Entry();
            $entry->device_identifier = $deviceIdentifier;
            $entry->survey_id = 2; // Assuming survey_id 2 is for the feedback survey
            $entry->save();

            // Save the answer to the entry
            $entry->answers()->create([
                'question_id' => 2, // Assuming question_id 2 is for the rating question
                'value' => $request->input('rating'),
            ]);

            $currentTime = Carbon::now()->setTimezone('Asia/Manila')->toDateTimeString();

            return redirect()->back()->with('success', 'Survey submitted successfully! Current Philippine time: ' . $currentTime);
        }

        // If the cookie does not exist, redirect to /guest-survey
        return redirect('/guest-survey');
    }

    protected function survey()
    {
        return Survey::where('name', 'Visitor Feedback')->first();
    }
}

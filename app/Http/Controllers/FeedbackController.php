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

    public function store(Request $request)
    {
        $survey = $this->survey();
        $deviceIdentifier = Cookie::get('device_identifier');

        // If the cookie does not exist, create a new unique identifier
        if (!$deviceIdentifier) {
            $deviceIdentifier = $request->ip() . '-' . Str::random(40);
            $expiresAt = Carbon::now()->setTimezone('Asia/Manila')->endOfDay();
            Cookie::queue('device_identifier', $deviceIdentifier, $expiresAt->diffInMinutes());
        }

        // Check if the user has already submitted a response today
        $existingEntry = Entry::where('survey_id', $survey->id)
            ->where('device_identifier', $deviceIdentifier)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if ($existingEntry) {
            return redirect()->back()->with('error', 'You have already submitted a response today.');
        }

        // Validate the request data
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|max:255',
        ]);

        // Create a new entry with the validated rating
        $entry = new Entry();
        $entry->device_identifier = $deviceIdentifier;
        $entry->survey_id = $survey->id;
        $entry->save();

        // Save the answers to the entry
        $entry->answers()->create([
            'question_id' => 14, // Assuming question_id 14 is for the rating question
            'value' => $request->input('rating'),
        ]);

        $entry->answers()->create([
            'question_id' => 15, // Assuming question_id 15 is for the feedback question
            'value' => $request->input('feedback'),
        ]);

        $currentTime = Carbon::now()->setTimezone('Asia/Manila')->toDateTimeString();

        return redirect()->back()->with('success', 'Survey submitted successfully! Current Philippine time: ' . $currentTime);
    }

    protected function survey()
    {
        return Survey::where('name', 'Visitor Feedback')->first();
    }
}

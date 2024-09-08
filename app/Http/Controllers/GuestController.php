<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;
use Illuminate\Support\Facades\Cookie;
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
        $deviceIdentifier = Cookie::get('device_identifier');

        // If the cookie does not exist, create a new unique identifier
        if (!$deviceIdentifier) {
            $deviceIdentifier = $request->ip() . '-' . Str::random(40);
            $expiresAt = Carbon::now()->setTimezone('Asia/Manila')->endOfDay();
            Cookie::queue('device_identifier', $deviceIdentifier, $expiresAt->diffInMinutes());
        }

        // Check if the user has already submitted a response
        $existingEntry = Entry::where('survey_id', $survey->id)
            ->where('device_identifier', $deviceIdentifier)
            ->first();

        if ($existingEntry) {
            return redirect()->back()->with('error', 'You have already submitted a response.');
        }

        // Validate the request data using the survey rules
        $answers = $request->validate($survey->rules);

        // Create a new entry with the validated answers
        $entry = new Entry();
        $entry->survey_id = $survey->id;
        $entry->device_identifier = $deviceIdentifier;
        $entry->save();

        // Save the answers to the entry
        $entry->fromArray($answers)->push();

        return redirect()->back()->with('success', 'Survey submitted successfully!');
    }

    protected function survey()
    {
        return Survey::where('name', 'Visitor Information')->first();
    }

}

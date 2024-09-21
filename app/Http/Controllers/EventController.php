<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('event.index');
    }

    public function getEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
        ]);

        // Convert dates to Philippine time
        $validatedData['start_date'] = Carbon::parse($validatedData['start_date'])->setTimezone('Asia/Manila');
        if (!empty($validatedData['end_date'])) {
            $validatedData['end_date'] = Carbon::parse($validatedData['end_date'])->setTimezone('Asia/Manila');
        }

        // Create a new event
        $event = Event::create($validatedData);

        // Return a success response with a 200 status code
        return response()->json([
            'success' => true,
            'message' => 'Event created successfully',
            'event' => $event
        ], 200);
    }

    // app/Http/Controllers/EventController.php

    public function edit(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
        ]);

        // Convert dates to Philippine time
        $validatedData['start_date'] = Carbon::parse($validatedData['start_date'])->setTimezone('Asia/Manila');
        if (!empty($validatedData['end_date'])) {
            $validatedData['end_date'] = Carbon::parse($validatedData['end_date'])->setTimezone('Asia/Manila');
        }

        // Find the event by ID
        $event = Event::findOrFail($id);

        // Update the event with validated data
        $event->update($validatedData);

        // Return a success response with a 200 status code
        return response()->json([
            'success' => true,
            'message' => 'Event updated successfully',
            'event' => $event
        ], 200);
    }

    // app/Http/Controllers/EventController.php

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete the event
        $event->delete();

        // Return a success response with a 200 status code
        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully'
        ], 200);
    }
}

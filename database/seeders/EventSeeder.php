<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDate = Carbon::now();

        Event::create([
            'title' => 'Event 1',
            'description' => 'Description for Event 1',
            'start_date' => $currentDate->copy()->addDays(1),
            'end_date' => $currentDate->copy()->addDays(1)->addHours(2),
            'location' => 'Location 1'
        ]);

        Event::create([
            'title' => 'Event 2',
            'description' => 'Description for Event 2',
            'start_date' => $currentDate->copy()->addDays(3),
            'end_date' => $currentDate->copy()->addDays(3)->addHours(3),
            'location' => 'Location 2'
        ]);

        Event::create([
            'title' => 'Event 3',
            'description' => 'Description for Event 3',
            'start_date' => $currentDate->copy()->addDays(5),
            'end_date' => $currentDate->copy()->addDays(5)->addHours(4),
            'location' => 'Location 3'
        ]);
    }
}

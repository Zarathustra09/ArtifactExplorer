<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MattDaneshvar\Survey\Models\Survey;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new survey
        $survey = Survey::create(['name' => 'Visitor Feedback', 'settings' =>  ['accept-guest-entries' => true]]);

        $survey->questions()->create([
            'content' => 'How is your Visit?',
            'type' => 'rating',
            'options' => [1, 2, 3, 4, 5], // Representing 1 to 5 stars
            'rules' => ['required']
        ]);

        $survey->questions()->create([
            'content' => 'Feedback',
            'rules' => ['required']
        ]);
    }
}

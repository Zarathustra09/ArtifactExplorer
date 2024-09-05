<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use MattDaneshvar\Survey\Models\Survey;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new survey
        $survey = Survey::create(['name' => 'Visitor Information', 'settings' =>  ['accept-guest-entries' => true]]);

        // Add questions to the survey


        $survey->questions()->create([
            'content' => 'Full Name',
            'rules' => ['required']
        ]);

        $survey->questions()->create([
            'content' => 'Age',
            'type' => 'number',
            'rules' => ['numeric', 'min:0', 'required']
        ]);

        $survey->questions()->create([
            'content' => 'Gender',
            'type' => 'radio',
            'options' => ['Male', 'Female', 'Other'],
            'rules' => ['required']
        ]);

        $survey->questions()->create([
            'content' => 'Occupation',
            'rules' => ['required']
        ]);

        $survey->questions()->create([
            'content' => 'Nationality',
            'rules' => ['required']
        ]);
    }
}

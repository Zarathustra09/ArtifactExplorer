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

        // Create sections
        $sectionOne = $survey->sections()->create(['name' => 'Personal Information']);
        $sectionTwo = $survey->sections()->create(['name' => 'Demographics']);

        // Add questions to section one
        $sectionOne->questions()->create([
            'content' => 'C.N. Bus Number', // Question 1
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Full name', // Question 2
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Address/Affliation', // Question 3
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Nationality', // Question 4
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Male Visitors', // Question 5
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Female Visitors', // Question 6
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        // Add questions to section two
        $sectionTwo->questions()->create([
            'content' => 'No. of Students / Grade School', // Question 7
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        $sectionTwo->questions()->create([
            'content' => 'No. of Students / High School', // Question 8
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        $sectionTwo->questions()->create([
            'content' => 'No. of Students / College / GradSchool', // Question 9
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        $sectionTwo->questions()->create([
            'content' => 'PWD', // Question 10
            'rules' => ['required']
        ]);

        $sectionTwo->questions()->create([
            'content' => '17 y/o and below', // Question 11
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        $sectionTwo->questions()->create([
            'content' => '18-30 y/o', // Question 12
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        $sectionTwo->questions()->create([
            'content' => '31-45 y/o', // Question 13
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);

        $sectionTwo->questions()->create([
            'content' => '60 y/o and above', // Question 14
            'type' => 'number',
            'rules' => ['required', 'numeric', 'min:0']
        ]);
    }

}

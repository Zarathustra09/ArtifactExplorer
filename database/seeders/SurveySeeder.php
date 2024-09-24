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
            'content' => 'C.N. Bus Number',
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Full name',
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Address/Affliation',
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Nationality',
            'rules' => ['required']
        ]);

        $sectionOne->questions()->create([
            'content' => 'Gender',
            'type' => 'radio',
            'options' => ['Male', 'Female'],
            'rules' => ['required']
        ]);

        // Add questions to section two
        $sectionTwo->questions()->create([
            'content' => 'No. of Students / Grade School',
            'type' => 'number',
            'rules' => ['required', 'numeric']
        ]);

        $sectionTwo->questions()->create([
            'content' => 'No. of Students / High School',
            'type' => 'number',
            'rules' => ['required', 'numeric']
        ]);

        $sectionTwo->questions()->create([
            'content' => 'No. of Students / College / GradSchool',
            'type' => 'number',
            'rules' => ['required', 'numeric']
        ]);

        $sectionTwo->questions()->create([
            'content' => 'PWD',
            'rules' => ['required']
        ]);

        $sectionTwo->questions()->create([
            'content' => '17 y/o and below',
            'type' => 'number',
            'rules' => ['required', 'numeric']
        ]);

        $sectionTwo->questions()->create([
            'content' => '18-30 y/o',
            'type' => 'number',
            'rules' => ['required', 'numeric']
        ]);

        $sectionTwo->questions()->create([
            'content' => '31-45 y/o',
            'type' => 'number',
            'rules' => ['required', 'numeric']
        ]);

        $sectionTwo->questions()->create([
            'content' => '60 y/o and above',
            'type' => 'number',
            'rules' => ['required', 'numeric']
        ]);



    }
}

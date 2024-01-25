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
        $survey = Survey::create(['name' => 'Healthcare Facility Enrolment Questionnaire', 'settings' => ['accept-guest-entries' => true]]);
        $one = $survey->sections()->create(['name' => 'Facility Details']);
        $two = $survey->sections()->create(['name' => 'Ownership Details']);

        $one->questions()->create([
            'content' => 'Organisation Name:',
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'CAC Registration Number:',
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Organisation Type:',
            'type' => 'radio',
            'options' => ['Private sector (For-Profit)', 'Private sector (Non-Profit)','Federal Government Agency or Entity','State Government Agency or Entity','Local Government Agency or Entity'],
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Organisation E-mail:',
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Organisation Website:',
        ]);

        $one->questions()->create([
            'content' => 'Facility Name:',
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Facility Type:',
            'type' => 'radio',
            'options' => ['General Hospital', 'Specialist Hospital','Maternity Center','Medical Laboratory','Radiology/Imaging Center', 'Community Health Center','Ambulance Services','Eye Clinic','Dental Clinic','Pharmacy','Mortuary'],
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Facility Address:',
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Facility Registration Number (from Nigeria Health Facility Registry(NHFR):',
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Date of Certification:',
            'type' => 'date',
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Type of Facility Level:',
            'type' => 'radio',
            'options' => ['Primary', 'Secondary','Tertiary'],
            'rules' => ['required']
        ]);

        $one->questions()->create([
            'content' => 'Services Offered:',
            'type' => 'multiselect',
            'options' => ['Out-Patient Services', 'In-Patient Services','Medical Services','Surgical Services','Obstetrics and Gynaecology Services'],
            'rules' => ['required']
        ]);

        $two->questions()->create([
            'content' => 'Fullname:',
            'rules' => ['required']
        ]);

        $two->questions()->create([
            'content' => 'NIN:',
            'rules' => ['required']
        ]);

        $two->questions()->create([
            'content' => 'Email:',
            'rules' => ['required']
        ]);

        $two->questions()->create([
            'content' => 'Phone Number:',
            'rules' => ['required']
        ]);

        $two->questions()->create([
            'content' => 'BVN:',
            'rules' => ['required']
        ]);
    }
}

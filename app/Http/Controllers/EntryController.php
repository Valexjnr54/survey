<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Survey;
use RealRashid\SweetAlert\Facades\Alert;

class EntryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $survey = $this->survey();
        return view('users.survey', ['survey' => $survey]);
    }

    public function store(Request $request){
        $user = auth()->user();
        $survey = $this->survey();
        $answers = $this->validate($request, $survey->rules);
        (new Entry)->for($survey)->by($user)->fromArray($answers)->push();
        Alert::success("Submitted Successfully","Your Survey have been submitted successfully");
        return back()->with('success','Thank you for your submission');
    }

    protected function survey(){
        return Survey::where('name','Healthcare Facility Enrolment Questionnaire')->first();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use MattDaneshvar\Survey\Models\Entry;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view_survey()
    {
        $role = Auth::user()->role;
        if ($role != 'Admin') {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }
        
        $entries = Entry::where('survey_id', 1)->with('survey', 'participant', 'answers') // Load related models
        ->get();

        return view('admin.survey.index')->with(['entries'=>$entries]);
    }

    public function view_user_survey(Request $request)
    {
        $request->validate([
            'participant_id' => 'required'
        ]);

        $role = Auth::user()->role;
        if ($role != 'Admin') {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }

        $entries = Entry::where(['survey_id' => 1, 'participant_id' => $request->participant_id])->with('survey', 'participant', 'answers')->get();
        $total_entries = Entry::where(['survey_id' => 1, 'participant_id' => $request->participant_id])->count();
        $user = User::where('id', $request->participant_id)->first();
        // return response()->json([$entries]);
        return view('admin.survey.user_surveys')->with(['entries'=>$entries,'user' => $user, 'total_entries' => $total_entries]);
    }

    public function view_survey_detail(Request $request)
    {
        $request->validate([
            'participant_id' => 'required',
            'survey_id' => 'required',
            'entry_id' => 'required'
        ]);

        $role = Auth::user()->role;
        if ($role != 'Admin') {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }

        $entry = Entry::where(['survey_id' => $request->survey_id, 'id' => $request->entry_id, 'participant_id' => $request->participant_id])->with('survey', 'participant', 'answers')->first();
        return view('admin.survey.survey_detail')->with(['entry'=>$entry]);
    }

    public function all_survey(Request $request)
    {
        $role = Auth::user()->role;
        if ($role != 'Admin') {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }

        $entries = Entry::where(['survey_id' => 1])->with('survey', 'participant', 'answers')->get();
        // return response()->json([$entries]);
        return view('admin.survey.all_surveys')->with(['entries'=>$entries]);
    }
}

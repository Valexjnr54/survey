<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use MattDaneshvar\Survey\Models\Entry;
use MattDaneshvar\Survey\Models\Question;
use MattDaneshvar\Survey\Models\Survey;
use RealRashid\SweetAlert\Facades\Alert;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where(['email'=> $request->email])->first();
        $role = $user->role;
        if($role != "Admin"){
            Alert::error('Oops', 'Unauthorized User');
            return redirect("admin/login")->withSuccess('Unauthorized User');
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                ->withSuccess('Signed in');
        }
        Alert::error('Oops', 'Login details are not valid');
        return redirect("admin/login")->withSuccess('Login details are not valid');
    }
    public function registration()
    {
        return view('admin.auth.register');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("admin/dashboard")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function dashboard()
    {
        $role = Auth::user()->role;
        if ($role != 'Admin') {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }
        
        $user = User::where('role', 'User')->count();
        $admin = User::where('role', 'Admin')->count();
        $entries_count = Entry::all()->count();
        $entries = Entry::where('survey_id', 1)->with('survey', 'participant', 'answers') // Load related models
        ->get();

        if (Auth::check()) {
            // return response()->json([$entries]);
            return view('admin.dashboard')->with(['user_count' => $user, 'admin_count' => $admin, 'entries_count' => $entries_count, 'entries'=>$entries]);
        }
        return redirect("admin/login")->withSuccess('You are not allowed to access');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('admin/login');
    }
}
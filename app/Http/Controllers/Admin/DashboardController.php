<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_user()
    {
        $role = Auth::user()->role;
        if ($role != 'Admin') {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }

        return view('admin.user.create');
    }

    public function users()
    {
        $role = Auth::user()->role;
        if ($role != 'Admin') {
            Session::flush();
            Auth::logout();
            return Redirect('login');
        }

        $users = User::latest('created_at')->get();
        return view('admin.users')->with(['users'=>$users]);
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $data = $request->all();
        $check = $this->create($data);
        if($check){
            Alert::success('User created','User has been created successfully');
            return back()->with('Created User');
        }
        Alert::error('Oops','Something Went Wrong');
        return back();
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

    public function edit_user(Request $request)
    {
        $user = User::find($request->user_id);
        return view('admin.user.edit')->with(['user'=>$user]);
    }

    public function update_user(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->save();

        if($user->save()){
            Alert::success('User Updated','User details have been updated');
            return back()->with('Updated');
        }

        Alert::error('Oops','Something Went Wrong');
        return back();
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('Delete User','User has been deleted Successfully');
        return back()->with(['success'=>'User has been deleted Successfully','title'=>'Delete User']);
    }
}

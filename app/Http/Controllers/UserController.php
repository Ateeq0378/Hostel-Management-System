<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\forgotPassword;

class UserController extends Controller
{
    // public function addUser(Request $req){

    //     $data = $req->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'role' => 'required'
    //     ]);

    //     $user = User::create($data);
    //     if($user){
    //         return view('welcome');
    //     }
    // }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        
        if(Auth::attempt($credentials)){

            if (Auth::user()->role == "provost" || Auth::user()->role == "warden"){
                return redirect()->route('admin-dashboard');
            }
            if (Auth::user()->role == "student"){
                return redirect()->route('student-dashboard');
            }

            Auth::logout();
            return back()->withErrors(['status' => 'Unauthorized role.']);
        }
        return back()->withErrors(['status' => 'Invalid Gmail Id or Password']);
    }

    public function admin(){
        return view('admin.dashboard');
    }

    public function student(){
        return view('student.dashboard');
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }

    public function changePassword(string $user_email){
        return view('password', compact('user_email'));
    }
    
    public function updatePassword(Request $request){
        
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!Hash::check($request->current_password, $user->password)){
            return back()->withErrors(['status' => 'Current Password in incorrect!']);
        }

        $user->password = $request->password;
        $user->save();

        if($user->role == "provost" || $user->role == "warden"){
            return redirect()->route('admin-dashboard')->with(['success' => 'Password updated successfully']);
        }
        else {
            return redirect()->route('student-dashboard')->with(['success' => 'Password updated successfully']);
        }

    }

    function generatePassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        return substr(str_shuffle($characters), 0, 8);
    }

    public function forgotPassword(Request $request){

        $user = User::where('email', $request->email)->first();
        $password = $this->generatePassword();
        $user->password = $password;
        $user->save();
        $toemail = "ateeq0378@gmail.com";

        Mail::to($toemail)->send(new forgotPassword(
            'Forgot Password',
            $user->name,
            $user->email,
            $password
        ));

        if($user->role == "provost" || $user->role == "warden"){
            return redirect()->route('admin-dashboard')->with(['success' => 'A new password has been send to your email.']);
        }
        else {
            return redirect()->route('student-dashboard')->with(['success' => 'A new password has been send to your email.']);
        }

    }

    public function showDashboard(Request $request){

        $user = User::where('email', $request->email)->first();

        if($user->role == "provost" || $user->role == "warden"){
            return view('admin.dashboard');
        }
        else {
            return view('student.dashboard');
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Warden;
use App\Models\User;
use App\Models\Notice;
use App\Mail\WardenRegistration;

class WardenController extends Controller{

    public function index(){
        
        $wardens = Warden::all();
        return view("admin.warden", compact('wardens'));
    }

    public function addWarden(){
        return view("admin.add-warden");
    }

    function generatePassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        return substr(str_shuffle($characters), 0, 8);
    }

    public function create(Request $request){

        $data = $request->validate([
            'name' => 'required|string',
            'number' => 'required|digits:10',
            'email' => 'required|email|unique:wardens,email',
            'city' => 'required|string',
            'address' => 'required|string'
        ]);

        $warden = Warden::create($data);
        $password = $this->generatePassword();

        User::create([
            'name' => $warden->name,
            'email' => $warden->email,
            'password' => $password,
            'role' => 'warden'
        ]);

        $toemail = "ateeq0378@gmail.com";

        if($warden){

            Mail::to($toemail)->send(new WardenRegistration(
                'Warden Registration',
                $warden->name,
                $warden->email,
                $password
            ));
            return redirect()->route('warden')->with(['success' => 'Warden Added Successfully']);
        }
        else{
            return redirect()->route('warden')->with(['error' => 'Something went wrong!']);
        }
    }

    public function edit(Warden $warden_id){

        $warden = Warden::find($warden_id->id);
        return view("admin.edit-warden", compact('warden'));
    }

    public function update(Request $request, string $warden_id){

        $request->validate([
            'name' => 'required|string',
            'number' => 'required|digits:10',
            'email' => 'required|email|unique:wardens,email,' . $warden_id,
            'city' => 'required|string',
            'address' => 'required|string'
        ]);
        
        $warden = Warden::find($warden_id);

        $warden->name = $request->name;
        $warden->number=$request->number;
        $warden->address = $request->address;
        
        $warden->save();
        
        if($warden){
            return redirect()->route('warden')->with(['success' => 'Warden Updated Successfully']);
        }
        else{
            return redirect()->route('warden')->with(['error' => 'Something went wrong!']);
        }
    }

    public function delete(string $warden_email){

        $warden = Warden::where('email',$warden_email)->firstOrFail();
        $warden->delete();
        User::where('email',$warden_email)->delete();
        Notice::where('email',$warden_email)->delete();
        
        if($warden){
            return redirect()->route('warden')->with(['success' => 'Warden Deleted Successfully']);
        }
        else{
            return redirect()->route('warden')->with(['error' => 'Something went wrong!']);
        }
    }
}

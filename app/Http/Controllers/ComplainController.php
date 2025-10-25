<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Student;

class ComplainController extends Controller
{
    public function index(){

        $complains = Complain::all();
        return view('student.complain', compact('complains'));
    }

    public function addComplain(){
        return view('student.add-complain');
    }

    public function create(Request $request){

        $request->validate([
            'name' => 'required|string',
            'enroll_number' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $complain = Complain::create([
            'title' => $request->title,
            'description' => $request->description,
            'enroll_number' => $request->enroll_number,
            'complain_date' => date('Y-m-d')
        ]);

        if($complain){
            return redirect()->route('student-complain')->with(['success' => 'Complain Registered Successfully']);
        }
        else{
            return redirect()->route('student-complain')->with(['error' => 'Something went wrong!']);
        }
    }

    public function complain(){

        $complains = Complain::all();
        return view('admin.complain', compact('complains'));
    }

    public function show(string $complain_id, string $enroll_number){

        $complain = Complain::find($complain_id);
        $student = Student::where('enroll_number', $enroll_number)->first();
        return view('admin.show-complain', compact('complain', 'student'));
    }

    public function resolvedComplain(Request $request, string $complain_id){
        
        $complain = Complain::find($complain_id);
        $complain->status = 0;
        $complain->save();

        if($complain){
            return redirect()->route('admin-complain')->with(['success' => 'Complain Resolved Successfully']);
        }
        else{
            return redirect()->route('admin-complain')->with(['error' => 'Something went wrong!']);
        }
    }
}

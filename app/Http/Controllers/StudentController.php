<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;
use App\Models\User;
use App\Models\Room;
use App\Models\Complain;
use App\Models\History;
use App\Mail\StudentRegistration;

class StudentController extends Controller
{   
    public function index(){
        
        $students = Student::all();
        return view("admin.student", compact('students'));
    }

    public function addStudent(){
        $courses = ['BCA', 'MCA','BSc', 'MSc'];
        return view('admin.add-student', compact('courses'));
    }

    function generatePassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
        return substr(str_shuffle($characters), 0, 8);
    }

    public function create(Request $request){

        $data = $request->validate([
            'course_name' => 'required|string',
            'name' => 'required|string',
            'enroll_number' => 'required|string|unique:students,enroll_number',
            'father_name' => 'required|string',
            'number' => 'required|digits:10',
            'father_number' => 'required|digits:10',
            'email' => 'required|email|unique:students,email',
            'city' => 'required|string',
            'address' => 'required|string'
        ]);

        $student = Student::create($data);
        $password = $this->generatePassword();

        User::create([
            'name' => $student->name,
            'email' => $student->email,
            'password' => $password,
            'role' => 'student'
        ]);

        $toemail = "ateeq0378@gmail.com";

        if($student){

            Mail::to($toemail)->send(new StudentRegistration(
                'Student Registration',
                $student->name,
                $student->enroll_number,
                $student->email,
                $password

            ));
            return redirect()->route('admin-student')->with(['success' => 'Student Added Successfully']);
        }
        else{
            return redirect()->route('admin-student')->with(['error' => 'Something went wrong!']);
        }
    }

    public function show(string $enroll_number){

        $student = Student::where('enroll_number', $enroll_number)->first();
        return view("admin.show-student", compact('student'));
    }

    public function edit(Student $student_id){

        $student = Student::find($student_id->id);
        return view("admin.edit-student", compact('student'));
    }

    public function update(Request $request, string $student_id){

        $request->validate([
            'course_name' => 'required|string',
            'name' => 'required|string',
            'enroll_number' => 'required|string|unique:students,enrolment_number,' . $student_id,
            'father_name' => 'required|string',
            'number' => 'required|digits:10',
            'father_number' => 'required|digits:10',
            'email' => 'required|email|unique:students,email,' . $student_id,
            'city' => 'required|string',
            'address' => 'required|string'
        ]);

        $student = Student::find($student_id);

        $student->name=$request->name;
        $student->enroll_number=$request->enroll_number;
        $student->father_name=$request->father_name;
        $student->number=$request->number;
        $student->father_number=$request->father_number;
        $student->city=$request->city;
        $student->address=$request->address;
        
        $student->save();
        
        if($student){
            return redirect()->route('admin-student')->with(['success' => 'Student Updated Successfully']);
        }
        else{
            return redirect()->route('admin-student')->with(['error' => 'Something went wrong!']);
        }
    }

    public function delete(string $email){

        $student = Student::where('email',$email)->firstOrFail();
        if($student->room_number){
            return redirect()->route('admin-student')->with('error', 'Before deleting the student, first cancel the allotment.');
        }
        else{
            $student->delete();
            User::where('email',$email)->delete();
            Complain::where('enroll_number',$student->enroll_number)->delete();
            History::where('enroll_number',$student->enroll_number)->delete();
            
            if($student){
                return redirect()->route('admin-student')->with(['success' => 'Student Deleted Successfully']);
            }
            else{
                return redirect()->route('admin-student')->with(['error' => 'Something went wrong!']);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Room;
use App\Models\Student;
use App\Models\History;
use App\Mail\allotmentmail;
use App\Mail\cancelationmail;

class RoomController extends Controller
{

    public function index(){

        $total = Room::count();
        $bed = Room::sum('capacity');
        $vacant = Room::sum('available_bed');
        $occupied = $bed - $vacant;

        $students = Student::whereNotNull('room_number')->get();

        return view('\admin\room', compact('students','total', 'vacant', 'occupied'));
    }

    public function add(Request $request){

        $request->validate([
            'capacity' => 'required|digits:1'
        ]);

        $room = Room::create([
            'capacity' => $request->capacity,
            'available_bed' => $request->capacity
        ]);

        if($room){
            return redirect()->route('admin-room')->with(['success' => 'Room Added Successfully']);
        }
        else{
            return redirect()->route('admin-room')->with(['error' => 'Something went wrong!']);
        }

    }

    public function show(string $enroll_number){

        $student = Student::where('enroll_number', $enroll_number)->first();
        return view('admin.show-room', compact('student'));
    }

    public function getStudentsForAllotment(Request $request){   

        if ($request->ajax()) {

            $student = Student::where('enroll_number', $request->enroll_number)->first();
            return response()->json(['student' => $student]);
        }

        $total = Room::count();
        $bed = Room::sum('capacity');
        $vacant = Room::sum('available_bed');
        $occupied = $bed - $vacant;

        $students = Student::whereNull('room_number')->get();
        $rooms = Room::where('available_bed', '>',0)->get();
        return view('admin.allotment', compact('students', 'rooms', 'total', 'vacant', 'occupied'));
    }

    public function roomAllotment(Request $request){

        $request->validate([
            'enroll_number' => 'required|string',
            'name' => 'required|string',
            'room_number' => 'required|digits:1',
        ]);

        $room = Room::find($request->room_number);
        $student = Student::where('enroll_number', $request->enroll_number)->first();

        $available = $room->available_bed;
        $room->available_bed = $available-1;
        
        $student->room_number = $request->room_number;
        $student->allotment_date = date('Y-m-d');

        $room->save();
        $student->save();

        $toemail = $student->email;

        if($room && $student){

            Mail::to($toemail)->send(new allotmentmail(
                'Room Allotment Notice',
                $student->name,
                $student->enroll_number,
                $student->room_number,
                $student->allotment_date

            ));

            return redirect()->route('admin-room')->with(['success' => 'Room Alloted Successfully']);
        }
        else{
            return redirect()->route('admin-room')->with(['error' => 'Something went wrong!']);
        }
    }

    public function getStudentsForCancelation(Request $request){

        if ($request->ajax()) {

            $student = Student::where('enroll_number', $request->enroll_number)->first();
            return response()->json(['student' => $student]);
        }

        $total = Room::count();
        $bed = Room::sum('capacity');
        $vacant = Room::sum('available_bed');
        $occupied = $bed - $vacant;

        $students = Student::whereNotNull('room_number')->get();
        return view('admin.cancelation', compact('students', 'total', 'vacant', 'occupied'));
    }

    public function roomCancelation(Request $request){

        $request->validate([
            'enroll_number' => 'required|string',
            'name' => 'required|string',
            'room' => 'required|digits:1',
        ]);

        $room = Room::find($request->allotedRoom);
        $student = Student::where('enrolment_number', $request->enroll)->first();

        $history = History::create([
            'enroll_number' => $student->enroll_number,
            'name' => $student->name,
            'room_number' => $room->id,
            'allotment_date' => $student->allotment_date,
            'cancelation_date' => date('Y-m-d')
        ]);

        $available = $room->available_bed;
        $room->available_bed = $available+1;

        $allotmentDate = $student->allotment_date;
        $roomNumber = $student->room_number;

        $student->allotment_date = null;
        $student->room_number = null;

        $room->save();
        $student->save();

        $toemail = $student->email;

        if($room && $student && $history){

            Mail::to($toemail)->send(new cancelationmail(
                'Room Cancellation Notice',
                $student->name,
                $student->enroll_number,
                $roomNumber,
                $allotmentDate,
                now()->format('Y-m-d')
            ));

            return redirect()->route('admin-room')->with(['success' => 'Room Canceled Successfully']);
        }
        else{
            return redirect()->route('admin-room')->with(['error' => 'Something went wrong!']);
        }
    }

}

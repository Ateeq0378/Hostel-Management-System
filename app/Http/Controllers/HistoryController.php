<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Room;
use App\Models\Student;

class HistoryController extends Controller
{
    public function history(){

        $total = Room::count();
        $bed = Room::sum('capacity');
        $vacant = Room::sum('available_bed');
        $occupied = $bed - $vacant;

        $histories = History::all();

        return view('admin.history', compact('histories', 'total', 'vacant', 'occupied'));
    }

    public function show(string $student_id, string $history_id){

        $history = History::find($history_id);
        $student = Student::where('enrolment_number', $student_id)->first();
        return view('admin.show-history', compact('student', 'history'));
    }
}

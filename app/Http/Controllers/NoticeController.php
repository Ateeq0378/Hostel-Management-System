<?php

namespace App\Http\Controllers;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    public function index(){
        $notices = Notice::all();
        return view("admin.notice", compact('notices'));
    }

    public function addNotice(){
        return view('admin.add-notice');
    }

    public function show(){
        $notices = Notice::all();
        return view("student.notice", compact('notices'));
    }
    
    public function create(Request $request){

        $request->validate([
            'role' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);
        
        $notice = Notice::create([
            'role' => $request->role,
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description,
        ]);
        
        if($notice){
            return redirect()->route('admin-notice')->with(['success' => 'Notice Added Successfully']);
        }

    }

    public function edit(Notice $notice_id){

        $notice = Notice::find($notice_id->id);
        return view("admin.edit-notice", compact('notice'));
    }

    public function update(Request $request, string $notice_id){

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $notice = Notice::find($notice_id);

        $notice->title = $request->title;
        $notice->description = $request->description;
        
        $notice->save();
        
        if($notice){
            return redirect()->route('admin-notice')->with(['success' => 'Notice Updated Successfully']);
        }
        else{
            return redirect()->route('admin-notice')->with(['error' => 'Something went wrong!']);
        }
    }

    public function delete(Notice $notice_id){

        $notice = Notice::find($notice_id->id);
        $notice->delete();
        
        if($notice){
            return redirect()->route('admin-notice')->with(['success' => 'Notice Deleted Successfully']);
        }
        else{
            return redirect()->route('admin-notice')->with(['error' => 'Something went wrong!']);
        }
    }

}

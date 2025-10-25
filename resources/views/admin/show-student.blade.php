@extends('admin.layout')

@section('title')
    show-student
@endsection

@section('content')

<!-- ======= Show Student ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Student Details
            </h2>
            <a href = "{{ route('admin-student') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>

        <hr>

        <div class="container mt-2 py-5 shadow-lg bg-white">
            <div class="row mb-3">
                <div class="col-6">
                    Room Number:
                </div>
                <div class="col-6">
                   {{$student->room_number ?? 'Not Alloted'}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Allotment Date:
                </div>
                <div class="col-6">
                    {{$student->allotment_date ?? 'N/A'}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Course name:
                </div>
                <div class="col-6">
                    {{$student->course_name}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Enrollment Number:
                </div>
                <div class="col-6">
                    {{$student->enroll_number}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Name:
                </div>
                <div class="col-6">
                    <b>{{$student->name}}</b>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Father Name:
                </div>
                <div class="col-6">
                    {{$student->father_name}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Mobile Number:
                </div>
                <div class="col-6">
                    {{$student->number}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Father Mobile Number:
                </div>
                <div class="col-6">
                    {{$student->father_number}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Gmail Id:
                </div>
                <div class="col-6">
                    {{$student->email}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Address:
                </div>
                <div class="col-6">
                    {{$student->city}}
                </div>
            </div>
        </div> 

    </div>            
</div>

<!-- =======End View Student ======= -->

</div>

@endsection
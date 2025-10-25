@extends('admin.layout')

@section('title')
    show-complain
@endsection

@section('content')

<!-- ======= Show Complain ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Complain Details
            </h2>
            <a href = "{{ route('admin-complain') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>
        <hr>
        <div class="container mt-2 py-3 shadow-lg bg-white">
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
                    Course:
                </div>
                <div class="col-6">
                    {{$student->course_name}}
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
                    {{$student->address}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    Complain Description:
                </div>
                <div class="col-6">
                    {{$complain->description}}
                </div>
            </div>
        </div> 

    </div>            
</div>

<!-- =======End View Complain ======= -->

</div>

@endsection
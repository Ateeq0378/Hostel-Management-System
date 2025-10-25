@extends('student.layout')

@section('title')
register-complain
@endsection

@php
    use App\Models\Student;
    use Illuminate\Support\Facades\Auth;

    if(Auth::check()){
        $email = Auth::user()->email;
        $student = Student::where('email',$email)->first();
    }
    $i = 0;
@endphp

@section('content')

<!-- ======= Register Complain ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Register Complain
            </h2>
            <a href="{{ route('student-complain') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>

        <hr>

        <div class="container mt-2 py-5 shadow-lg bg-white">
            <form action="{{ route('register-complain') }}" method="post" autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="name" value="{{$student->name}}" name="name" readonly="readonly">
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="enroll_number" class="form-label">Enrollment Number:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" class="form-control" id="enroll_number" value="{{$student->enroll_number}}" name="enroll_number" readonly="readonly">
                        <span class="text-danger">
                            @error('enroll_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="title" class="form-label">Title:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter Title" name="title">
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="description" class="form-label">Description:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ old('description') }}" class="form-control" id="description" placeholder="Enter Description" name="description">
                        <span class="text-danger">
                            @error('description')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-end">Submit</button>
            </form>
        </div>

    </div>
</div>

<!-- =======End Add Warden ======= -->

</div>

@endsection
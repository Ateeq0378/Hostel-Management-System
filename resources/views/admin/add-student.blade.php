@extends('admin.layout')

@section('title')
    add-course
@endsection

@section('content')

<!-- ======= Add Student ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Add Student
            </h2>
            <a href="{{ route('admin-student') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>

        <hr>

        <div class="container mb-2 py-5 shadow-lg bg-white">
            <form action="{{ route('student-create') }}" method="post" autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="course" class="form-label">Course Name:</label>
                    </div>
                    <div class="col-9">
                        <select name="course_name" id="course" class="form-control">
                            <option value="">Select Course</option>
                            @foreach ($courses as $course)
                            <option value="{{$course}}">{{$course}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('course_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ old('name') }}" class="form-control" id="name" placeholder="Enter Name" name="name">
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
                        <input type="text" value="{{ old('enroll_number') }}" class="form-control" id="enroll_number" placeholder="Enter Enrollment Number" name="enroll_number">
                        <span class="text-danger">
                            @error('enroll_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="father_name" class="form-label">Father Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ old('father_name') }}" class="form-control" id="f-name" placeholder="Enter Father Name" name="father_name">
                        <span class="text-danger">
                            @error('father_name')
                                {{ $message }}
                            @enderror
                        </span>   
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="number" class="form-label">Mobiel Number:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ old('number') }}" class="form-control" id="number" placeholder="Enter Mobile Number" name="number">
                        <span class="text-danger">
                            @error('number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="father_number" class="form-label">Father Mobile Number:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ old('father_number') }}" class="form-control" id="father-number"
                            placeholder="Enter Father Mobile Number" name="father_number">
                        <span class="text-danger">
                            @error('father_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="email" class="form-label">Gmail Id:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ old('email') }}" class="form-control" id="gmail" placeholder="Enter Gmail Id" name="email">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="city" class="form-label">City:</label>
                    </div>
                    <div class="col-9">
                        <input type="texta" value="{{ old('city') }}" class="form-control" id="city" placeholder="Enter City" name="city">
                        <span class="text-danger">
                            @error('city')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="address" class="form-label">Address:</label>
                    </div>
                    <div class="col-9">
                        <input type="textarea" value="{{ old('address') }}" class="form-control" id="address" placeholder="Enter Address" name="address">
                        <span class="text-danger">
                            @error('address')
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

<!-- =======End Add Course ======= -->

</div>

@endsection
@extends('admin.layout')

@section('title')
    edit-student
@endsection

@section('content')

<!-- ======= Edit Student ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Edit Student Details
            </h2>
            <a href = "{{ route('admin-student') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>

        <hr>

        <div class="container mt-2 py-5 shadow-lg bg-white">
            <form action="{{ url('student-update', $student->id) }}" method="post" autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{$student->name}}" class="form-control" id="name" placeholder="Enter Name" name="name">
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
                        <input type="text" value="{{$student->enroll_number}}" class="form-control" id="enroll_number" placeholder="Enter Enrollment Number" name="enroll_number" readonly="readonly">
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
                        <input type="text" value="{{$student->father_name}}" class="form-control" id="f-name" placeholder="Enter Father Name" name="father_name">
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
                        <input type="text" value="{{$student->number}}" class="form-control" id="number" placeholder="Enter Mobile Number" name="number">
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
                        <input type="text" value="{{$student->father_number}}" class="form-control" id="father-number" placeholder="Enter Father Mobile Number" name="father_number">
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
                        <input type="text" value="{{$student->email}}" class="form-control" id="gmail" placeholder="Enter Gmail Id" name="email" readonly="readonly">
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
                        <input type="text" value="{{$student->city}}" class="form-control" id="city" placeholder="Enter City" name="city">
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
                        <input type="textarea" value="{{$student->address}}" class="form-control" id="address" placeholder="Enter Address" name="address">
                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-end">Update</button>
            </form>
        </div> 

    </div>            
</div>

<!-- =======End Edit Provost ======= -->

</div>

@endsection
@extends('admin.layout')

@section('title')
    edit-warden
@endsection

@section('content')

<!-- ======= Edit Warden ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Edit Warden Details
            </h2>
            <a href = "{{ route('warden') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>

        <hr>

        <div class="container mt-2 py-5 shadow-lg bg-white">
            <form action="{{ route('warden-update', $warden->id) }}" method="post" autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="name" class="form-label">Name:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{$warden->name}}" class="form-control" id="name" placeholder="Enter Name" name="name">
                        <span class="text-danger">
                            @error('name')
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
                        <input type="text" value="{{$warden->number}}" class="form-control" id="number" placeholder="Enter Mobile Number" name="number">
                        <span class="text-danger">
                            @error('number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="gmail" class="form-label">Gmail Id:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{$warden->email}}" class="form-control" id="gmail" placeholder="Enter Gmail Id" name="email" readonly="readonly">
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
                        <input type="textarea" value="{{$warden->city}}" class="form-control" id="city" placeholder="Enter City" name="city">
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
                        <input type="textarea" value="{{$warden->address}}" class="form-control" id="address" placeholder="Enter Address" name="address">
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

<!-- =======End Edit Warden ======= -->

</div>

@endsection
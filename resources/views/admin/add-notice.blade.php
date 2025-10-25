@extends('admin.layout')

@section('title')
issue-notice
@endsection

@section('content')

<!-- ======= Issue Notice ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Issue Notice
            </h2>
            <a href="{{ route('admin-notice') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>

        <hr>

        <div class="container mb-2 py-5 shadow-lg bg-white">
            <form action="{{ route('notice-create') }}" method="post" autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="role" class="form-label">Role:</label>
                    </div>
                    <div class="col-9">
                        <input type="text" value="{{ Auth::user()->role }}" class="form-control" id="role" name="role" readonly="readonly">
                        <span class="text-danger">
                            @error('role')
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
                        <input type="text" value="{{ Auth::user()->email }}" class="form-control" id="email" name="email" readonly="readonly">
                        <span class="text-danger">
                            @error('email')
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

<!-- =======End Issue Notice ======= -->

</div>

@endsection
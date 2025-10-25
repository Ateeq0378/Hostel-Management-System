@extends('admin.layout')

@section('title')
    edit-notice
@endsection

@section('content')

<!-- ======= Edit Notice ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">

        <div class="clearfix mt-2">
            <h2 class="float-start">
                Edit Notice
            </h2>
            <a href = "{{ route('admin-notice') }}" class="btn btn-danger float-end">
                <i class="fa-solid fa-xmark"></i>
                <span>Close</span>
            </a>
        </div>

        <hr>

        <div class="container mt-2 py-5 shadow-lg bg-white">
            <form action="{{ url('notice-update', $notice->id) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="title" class="form-label">Title:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" value="{{$notice->title}}" class="form-control" id="title" placeholder="Enter Title" name="title">
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
                            <input type="text" value="{{$notice->description}}" class="form-control" id="description" placeholder="Enter Description" name="description">
                            <span class="text-danger">
                                @error('description')
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
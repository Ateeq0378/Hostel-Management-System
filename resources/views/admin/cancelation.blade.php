@extends('admin.layout')

@section('title')
    room-cancelation
@endsection

@section('content')

<!-- ======= Room Cancelation ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Room Cancelation
            </h2>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addRoom">
                <i class="fa-solid fa-plus"></i>
                <span>Add New</span>
            </button>
        </div>
        
        <hr>

        <div class="clearfix m-3">
            <a href="{{ route('allotment') }}" class="btn btn-success">Allotment</a>
            <a href="{{ route('cancelation') }}" class="btn btn-danger">Cancelation</a>
            <a href="{{ route('history') }}" class="btn btn-primary">History</a>
            <span class="btn btn-success">Available Bed : {{$vacant}}</span>
            <a href="{{ route('admin-room') }}" class="btn btn-danger">
                Occupied Bed : {{$occupied}}
            </a>
            <span class="btn btn-primary">Total Room : {{$total}}</span>
            <span class="float-end">Search: <input type="search" id="live_search"></span>
        </div>
        <div class="container py-3 shadow-lg bg-white">
            <form method="post" action="{{ route('room-canceled') }}">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <select class="form-control" id="enroll_number" name="enroll_number">
                            <option value="">Select Enrollment Number</option>
                            @forelse ($students as $student)
                                <option value="{{$student->enroll_number}}">{{$student->enroll_number}}</option>
                            @empty
                                <option value="">No Record Found!</option>
                            @endforelse
                        </select>
                        <span class="text-danger">
                            @error('enroll_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-3">
                        <select class="form-control" id="name" name="name">
                            <option value="">Select Name</option>
                            @forelse ($students as $student)
                                <option value="{{$student->name}}">{{$student->name}}</option>
                            @empty
                                <option value="">No Record Found!</option>
                            @endforelse
                        </select>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-3">
                        <select class="form-control" id="room_number" name="room_number">
                            <option value="">Select Room Number</option>
                            @forelse ($students as $student)
                                <option value="{{$student->room_number}}">{{$student->room_number}}</option>
                            @empty
                                <option value="">No Record Found!</option>
                            @endforelse
                        </select>
                        <span class="text-danger">
                            @error('room_number')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ======= End Room Cancelation ======= -->

<!-- Modal for Add New Room -->
<div class="modal fade" id="addRoom">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Room</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="{{ route('add-room') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="capacity" class="form-label">Capacity:</label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control" id="capacity" placeholder="Enter the capacity of Room" name="capacity">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

</div>

<!-- <script type="text/javascript">

    $(document).ready(function(){
        $("#enroll_number").on('change', function(){
            var enroll_number = $(this).val();
            $.ajax({
                url:"{{ route('cancelation') }}",
                type:"GET",
                data:{'enroll_number':enroll_number},
                success: function(data){
                    if (data.student) {
                        $('#name').val(data.student.name);
                        $('#allotedRoom').val(data.student.room_number ?? 'N/A');
                    }
                    else {
                        $('#name').val('');
                        $('#allotedRoom').val('');
                    }
                }
            });
        });
    });

</script> -->

@endsection

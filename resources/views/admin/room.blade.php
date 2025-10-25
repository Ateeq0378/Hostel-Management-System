@extends('admin.layout')

@section('title')
    room
@endsection

@section('content')

<!-- ======= Room ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Room Management
            </h2>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addRoom">
                <i class="fa-solid fa-plus"></i>
                <span>Add New</span>
            </button>
        </div>
        <hr>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
        <div class="container mt-2">
            <table class="table table-striped table-bordered table-hover" id="searchresult">
                <thead class="table-dark align-center">
                    <tr>
                        <th>Serial Number</th>
                        <th>Student Name</th>
                        <th>Enrollment Number</th>
                        <th>Room Number</th>
                        <th>Admission Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="align-center">
                    @php
                        $i = 0
                    @endphp
                    @forelse ($students as $student)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->enroll_number}}</td>
                            <td>{{$student->room_number}}</td>
                            <td>{{$student->allotment_date ?? 'N/A'}}</td>
                            <td>
                                <a href="{{ route('show-room', $student->enroll_number) }}" class="btn btn-success">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">Data Not Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ======= End Room ======= -->

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
                            <span class="text-danger">
                                @error('capacity')
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
</div>
<!-- End Modal -->

</div>

<script type="text/javascript">

    $(document).ready(function(){

        $("#live_search").keyup(function(){
            search_table($(this).val());    
        });

        function search_table(value){
            $('#searchresult tbody tr').each(function(){
                var found = 'false';
                $(this).each(function(){
                    if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0){
                        found = 'true';
                    }
                });
                if(found == 'true'){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
        }
    });

</script>

@endsection
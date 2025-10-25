@extends('admin.layout')

@section('title')
    student
@endsection

@section('content')

<!-- ======= Student ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Student Management
            </h2>
            <a href="{{ url('admin-add-student') }}" class="btn btn-primary float-end">
                <i class="fa-solid fa-plus"></i>
                <span>Add New</span>
            </a>
        </div>

        <hr>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="clearfix m-3">
            <span class="float-end">Search: <input type="search" id="live_search"></span>
        </div>
        <div class="container mt-2">
            <table class="table table-striped table-bordered table-hover" id="searchresult">
                <thead class="table-dark align-center">
                    <tr>
                        <th>Serial Number</th>
                        <th>Enrollment Number</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Gmail Id</th>
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
                            <td>{{$student->enroll_number}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->course_name}}</td>
                            <td>{{$student->email}}</td>
                            <td>
                                <a href="{{ url('show-student', $student->enroll_number) }}" class="btn btn-success">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ url('edit-student', $student->id) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="{{ url('student-delete', $student->email) }}" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                No Record Found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ======= End Student ======= -->

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
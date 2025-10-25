@extends('student.layout')

@section('title')
    student-complaint
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

<!-- ======= Complaint ======= -->

<div class="container mt-2 mb-2 d-flex">
    <div class="container shadow-lg bg-white">
        <div class="clearfix mt-2">
            <h2 class="float-start">
                Complain Management
            </h2>
            <a href="{{ url('register-complain') }}" class="btn btn-primary float-end">
                <i class="fa-solid fa-plus"></i>
                <span>Complain</span>
            </a>
        </div>

        <hr>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="clearfix">
            <span class="float-end">Search: <input type="search" id="live_search"></span>
        </div>
        <div class="container mt-2">
            <table class="table table-striped table-bordered table-hover" id="searchresult">
                <thead class="table-dark align-center">
                    <tr>
                        <th>Serial Number</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="align-center">
                    @forelse ($complains as $complain)
                        @if ($student->enrolment_number == $complain->enrolment_number)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$complain->title}}</td>
                                <td>{{$complain->description}}</td>
                                <td>{{$complain->complain_date}}</td>
                                <td>
                                    @if ($complain->status)
                                        <button class="btn btn-danger">
                                            <i class="fa-regular fa-flag"></i>
                                        </button>
                                    @else
                                        <button class="btn btn-success">
                                            <i class="fa-regular fa-circle-check"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">No Record Found!</td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5">No Record Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ======= End Complaint ======= -->

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
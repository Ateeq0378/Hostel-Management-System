@extends('student.layout')

@section('title')
    student-dashboard
@endsection

@section('content')
    
    <!-- ======= Dashbord ======= -->

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3 m-2 shadow-lg bg-white cards">
            <div class="card-body pt-2">
                <h4 class="card-title"><a href="{{ route('student-notice') }}" class="text-none">
                    <i class="fa-solid fa-list-ul"></i> &nbsp Notice</a>
                </h4>
                <hr>
                <p class="card-text"><strong></strong></p>
            </div>
        </div>
        <div class="col-md-3 m-2 shadow-lg bg-white cards">
            <div class="card-body pt-2">
                <h4 class="card-title"><a href="{{ route('student-complain') }}" class="text-none">
                    <i class="fa-solid fa-list-ul"></i> &nbsp Complain</a>
                </h4>
                <hr>
                <p class="card-text"><strong></strong></p>
            </div>
        </div>
    </div>
</div>

<!-- ======= End Dashbord ======= -->

</div>

@endsection
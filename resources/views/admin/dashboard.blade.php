@extends('admin.layout')

@section('title')
    admin-dashboard
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
        @if (Auth::user()->role == 'provost')
            <div class="col-md-2 m-2 shadow-lg bg-white cards">
                <div class="card-body pt-2">
                    <h4 class="card-title"><a href="{{ route('warden') }}" class="text-none">
                        <i class="fa-solid fa-user"></i>&nbsp Warden</a>
                    </h4>
                    <hr>
                    <p class="card-text"><strong></strong></p>
                </div>
            </div>
        @endif
        <div class="col-md-2 m-2 shadow-lg bg-white cards">
            <div class="card-body pt-2">
                <h4 class="card-title"><a href="{{ route('admin-student') }}" class="text-none">
                    <i class="fa-solid fa-users"></i></i> &nbsp Student</a>
                </h4>
                <hr>
                <p class="card-text"><strong></strong></p>
            </div>
        </div>
        <div class="col-md-2 m-2 shadow-lg bg-white cards">
            <div class="card-body pt-2">
                <h4 class="card-title"><a href="{{ route('admin-room') }}" class="text-none">
                    <i class="fa-regular fa-building"></i></i> &nbsp Room</a>
                </h4>
                <hr>
                <p class="card-text"><strong></strong></p>
            </div>
        </div>
        <div class="col-md-2 m-2 shadow-lg bg-white cards">
            <div class="card-body pt-2">
                <h4 class="card-title"><a href="{{ route('admin-notice') }}" class="text-none">
                    <i class="fa-solid fa-list-ul"></i> &nbsp Notice</a>
                </h4>
                <hr>
                <p class="card-text"><strong></strong></p>
            </div>
        </div>
        <div class="col-md-2 m-2 shadow-lg bg-white cards">
            <div class="card-body pt-2">
                <h4 class="card-title"><a href="{{ route('admin-complain') }}" class="text-none">
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
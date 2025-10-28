<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="assets/img/image.png" rel="icon">

    <!-- CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- JS File -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jQuery.js" async></script>
</head>

@php
    use App\Models\Student;
    use App\Models\Room;
    use Illuminate\Support\Facades\Auth;

    if(Auth::check()){
        $email = Auth::user()->email;
        $student = Student::where('email',$email)->first();
    }
@endphp

<body>

    <!-- ======= Header ======= -->

    <header class="sticky-top">
        <div class="logo">
            <img src="{{ asset('/assets/img/image.png') }}" alt="">
        </div>
        <div class="title">
            <a href="{{ route('student-dashboard') }}">
                <h1>
                    Homeify - One stop for all your hostel needs
                </h1>
            </a>
        </div>
        <div>
            <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#studentProfile">
                <i class="fa-solid fa-user"></i>
                <span>{{ Auth::user()->role }}</span>
            </a>
            <a href="{{ route('logout') }}" class="btn btn-info">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Log out</span>
            </a>
        </div>
    </header>

    <!-- Modal for Student Profile -->
    <div class="modal fade" id="studentProfile">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Student Profile</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-5">
                            Name:
                        </div>
                        <div class="col-7">
                            <b>{{$student->name}}</b>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Enrolmemt Number:
                        </div>
                        <div class="col-7">
                            {{$student->enroll_number}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Enrollmemt Number:
                        </div>
                        <div class="col-7">
                            {{$student->course_name}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Father Name:
                        </div>
                        <div class="col-7">
                            {{$student->father_name}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Gmail Id:
                        </div>
                        <div class="col-7">
                            {{$student->email}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Mobile Number:
                        </div>
                        <div class="col-7">
                            {{$student->number}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Father Mobile Number:
                        </div>
                        <div class="col-7">
                            {{$student->father_number}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Room Number:
                        </div>
                        <div class="col-7">
                            <b>{{$student->room_number ?? 'Not Alloted'}}</b>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Allotment Date:
                        </div>
                        <div class="col-7">
                            {{$student->allotment_date ?? 'N/A'}}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-5">
                            Address:
                        </div>
                        <div class="col-7">
                            {{$student->city}}
                        </div>
                    </div>
                    <a href="{{ url('change-password', Auth::user()->email) }}" class="btn btn-danger" style="text-decoration: none">
                        Change Password
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- ======= End Header ======= -->

    <!-- ======= Side Navigation ======= -->

    <div class="main">

        <div class="side-nav">
            <a class="btn {{ request()->is('student-dashboard') ? '' : 'active-sidebar' }}"
                href="{{ route('student-dashboard') }}">
                <i class="fa-solid fa-gauge-high">
                    <span>Dashboard</span>
                </i>
            </a>
            <a class="btn {{ request()->is('student-notice') ? '' : 'active-sidebar' }}"
                href="{{ route('student-notice') }}">
                <i class="fa-regular fa-circle">
                    <span>Notice</span>
                </i>
            </a>
            <a class="btn {{ request()->is('student-complain') ? '' : 'active-sidebar' }}"
                href="{{ route('student-complain') }}">
                <i class="fa-regular fa-circle">
                    <span>Complain</span>
                </i>
            </a>
        </div>

        <!-- ======= End Side Navigation ======= -->


        @yield('content')

        <!-- ======= Footer ======= -->

        <footer id="footer">

            <div class="footer-bottom clearfix">
                <div class="copyright float-start">
                    &copy; Copyright <strong><span>Homeify - One stop for all your hostel needs</span></strong>
                </div>
                <div class="credits float-end">
                    Designed & Developed by <a href="{{ route('student-dashboard') }}">Ateeq Ahmad</a>
                </div>
            </div>

        </footer>

        <!-- ======= End Footer ======= -->

</body>

</html>

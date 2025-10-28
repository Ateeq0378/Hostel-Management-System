<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Log In</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/image.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- CSS File -->
        <link href="assets/css/main.css" rel="stylesheet">
        <link href="assets/css/log-in.css" rel="stylesheet">

    </head>

    <body>

        <!-- ======= Header ======= -->

        <header id="header" class="fixed-top header-inner-pages">
            <div class="container d-flex align-items-center">
                <img src="{{ asset('/assets/img/image.png') }}" alt="" width="75px">
                <h1 class="logo me-auto"><a href="{{ route('home-page') }}">Homeify</a></h1>
            </div>
        </header>
        
        <!-- End Header -->


        <!-- ======= #main ======= -->

        <main id="main">
            <div class="box">
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
                {{-- <span class="borderLine"></span> --}}
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <h2>Log In</h2>
                    <div class="input-group">
                        {{-- <span class="input-group-text">Log In Type:</span> --}}
                        <select class="form-control" id="type" name="role">
                            <option value="">Select Log In Type</option>
                            <option value="student">Student</option>
                            <option value="warden">Warden</option>
                            <option value="provost">Provost</option>
                        </select>
                        <div class="container">
                            <span class="text-danger">
                                @error('role')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="inputBox">
                        <input type="text" value="{{ old('email') }}" name="email">
                        <span>Gmail Id</span>
                        <i></i>
                        <div class="container">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="inputBox">
                        <input type="password" value = "{{ old('password') }}" name="password">
                        <span>Password</span>
                        <i></i>
                        <div class="container">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <input type="submit" value="Login" name="submit">
                    <a href="{{ url('forgot-password-page') }}">Forgot Password</a>
                    <div class="container">
                        <span class="text-danger">
                            @error('status')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </form>
            </div>
        </main>
        
        <!-- End #main -->


        <!-- ======= Footer ======= -->

        <footer id="footer">

            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>Homeify</span></strong>
                </div>
                <div class="credits">
                    Designed & Developed by <a href="">Ateeq Ahmad</a>
                </div>
            </div>

        </footer>
    
        <!-- End Footer -->

    </body>

</html>

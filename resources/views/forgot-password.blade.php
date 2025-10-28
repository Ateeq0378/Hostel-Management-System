<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Forgot Password</title>
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
                {{-- <span class="borderLine"></span> --}}
                <form method="post" action="{{ url('forgot-password') }}">
                    @csrf
                    <h2>Forgot Password</h2>
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
                    <input type="submit" value="Submit" name="submit">
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

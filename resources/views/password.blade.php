<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Change Password</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/img/image.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

         <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        <!-- JS File -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- CSS File -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/log-in.css') }}" rel="stylesheet">
        <!-- <link href="assets/css/main.css" rel="stylesheet">
        <link href="assets/css/log-in.css" rel="stylesheet"> -->

    </head>

    <body>

        <!-- ======= Header ======= -->

        <header id="header" class="header-inner-pages">
            <div class="container d-flex align-items-center">
                <img src="{{ asset('/assets/img/image.png') }}" alt="" width="75px">
                <h1 class="logo me-auto"><a href="{{ route('show-dashboard', Auth::user()->email) }}">Homeify</a></h1>
            </div>
        </header>
        
        <!-- End Header -->


        <!-- ======= #main ======= -->

        <main id="main" class="container-fluid">
            <div class="container-sm mt-5 mb-5 col-lg-5 shadow-lg p-4 bg-white rounded">
                <h3 class="text-center">
                    Change Password
                </h3>
                <hr>
                <form method="post" action="{{ url('update-password') }}" autocomplete="off">
                    @csrf
                    {{-- Current Password --}}
                    <div class="mb-3">
                        <input type="email" value="{{$user_email}}" id="email" name="email">
                        <input type="password" class="form-control" id="current_password" placeholder="Enter Current Password" name="current_password">
                        <span class="text-danger">
                            @error('current_password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    {{-- New Password --}}
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Enter New Password" name="password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm New Password" name="password_confirmation">
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary">Change Password</button>
                    <a href="{{ route('show-dashboard', Auth::user()->email) }}" class="btn btn-danger">Cancle</a>
                    @error('status')
                        <div class="text-danger mt-3">{{ $message }}</div>
                    @enderror
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

    <script>
        $(document).ready(function() {
            $('#email').hide();
        });
    </script>

</html>

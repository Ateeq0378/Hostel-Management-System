<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Homeify</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/assets/img/image.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->

  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <img src="{{ asset('/assets/img/image.png') }}" alt="" width="75px">
      <h1 class="logo me-auto"><a href="">Homeify</a></h1>

      <!-- ======= .navbar ======= -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#administration">Administration</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="login scrollto" href="{{ route('login-page') }}">Log In</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  
  <!-- End Header -->


  <!-- ======= Hero Section ======= -->

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Welcome to our Homeify</h1>
          <h2 class="justify-content-justify">Welcome to Homeify — where your student journey begins with comfort, connection, and a sense of belonging. At Homeify, we’ve created a space where students feel right at home from day one. Whether you're moving away for the first time or looking for a more comfortable, social living experience, Homeify offers a supportive environment designed for student life. Here, you’ll find not just a place to stay, but a community to grow with — complete with cozy rooms, shared spaces to study and relax, and new friends from different backgrounds. </h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/hostel.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
  
  <!-- End Hero -->


  <!-- ======= #main ======= -->

  <main id="main">

    <!-- ======= About Us Section ======= -->

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2> 
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Homeify is more than just a student hostel — it’s a community built for comfort, connection, and convenience. We understand the challenges of university life, especially when living away from home for the first time. That’s why we’ve created a safe, welcoming space where students can thrive both academically and socially.
              We’re here to make your university experience smoother, more fun, and a little less overwhelming.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Located close to universities and essential amenities, Homeify offers fully furnished rooms, modern common areas, high-speed Wi-Fi, and dedicated study zones — everything you need to focus, relax, and feel at home. Whether you're hitting the books, hanging out with friends, or just enjoying some downtime, Homeify is designed to support every part of your student journey. At Homeify, you're not just renting a room — you're joining a home.
            </p>
          </div>
        </div>

      </div>
    </section>
    
    <!-- End About Us Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>At Homeify, we provide everything students need to live comfortably, study effectively, and feel truly at home. Our services are designed to make your life easier, so you can focus on what really matters — your university journey. To keep your stay hassle-free, we provide regular housekeeping, 24/7 security. Need help or have a question? Our friendly support team is always here for you. We also host community events and student meetups to help you make friends, settle quickly, and feel part of something bigger.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <h4><a href="">WiFi Facility</a></h4>
              <p>All hostel rooms have access to Wi-Fi facility with high speed internet.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <h4><a href="">Common Room</a></h4>
              <p>Common room equipped with TV, Sofa , Chairs and Indoor games like Chess, table tennis and carom board.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <h4><a href="">Reading Room</a></h4>
              <p>Reading Room with Air-Conditioned for self study.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <h4><a href="">Computer Lab</a></h4>
              <p>Computer Lab with Air-Conditioned and more than 100 computers.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    
    <!-- End Services Section -->


    <!-- ======= Administration Section ======= -->

    <section id="administration" class="administration section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Administration</h2>
          <p>At Homeify, our administration team is committed to creating a smooth, supportive, and well-managed living experience for every student. From your first inquiry to the day you move in our goal is to make sure everything runs efficiently, transparently, and with your comfort in mind. Our on-site management team is available to assist with room assignments, maintenance requests, and any questions related to your stay. We maintain clear communication with residents through regular updates and are always open to feedback to improve your experience.</p>
        </div>

        <div class="row">

          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{ asset('/assets/img/team/ateeq.png') }}" class="img-fluid"alt=""></div>
              <div class="member-info">
                <h4>Ateeq Ahmad</h4>
                <span>Provost</span>
                <p>Phone Number - 1234567890</p>
                <div class="social">
                  <a href="https://github.com/Ateeq0378" target="_blank">
                    <i class="ri-github-fill"></i>
                  </a>
                  <a href="mailto:ateeq0378@gmail.com? subject=Information about Modern Bank" target="_blank">
                    <i class="ri-mail-fill"></i>
                  </a>
                  <a href="https://www.instagram.com/ateeq0378/?next=%2F" target="_blank">
                    <i class="ri-instagram-fill"></i>
                  </a>
                  <a href="https://www.linkedin.com/in/ateeq-ahmad-1b52b628a" target="_blank">
                    <i class="ri-linkedin-box-fill"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="member d-flex align-items-start">
              <div class="pic"><img src="{{ asset('/assets/img/team/Shubam.jpg') }}" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Subam Kumar Singh</h4>
                <span>Warden</span>
                <p>Phone Number - 1234567890</p>
                <div class="social">
                  <a href="https://github.com/Ateeq0378" target="_blank">
                    <i class="ri-github-fill"></i>
                  </a>
                  <a href="mailto:ateeq0378@gmail.com? subject=Information about Modern Bank" target="_blank">
                    <i class="ri-mail-fill"></i>
                  </a>
                  <a href="https://www.instagram.com/ateeq0378/?next=%2F" target="_blank">
                    <i class="ri-instagram-fill"></i>
                  </a>
                  <a href="https://www.linkedin.com/in/ateeq-ahmad-1b52b628a" target="_blank">
                    <i class="ri-linkedin-box-fill"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
    
    <!-- End Administration Section -->


    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>We providing exceptional customer service and maintaining a strong connection with our valued users, we believe in making communication easy and efficient. Whether you have a question, feedback, or require assistance, our dedicated support team is here to help.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>123 ABC, Aligarh, 123456</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>homeify@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+91 1234567890</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3525.624261670347!2d78.07561517551682!3d27.91350157606505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3974a4e5bcbc4b51%3A0xdada713733d0e998!2sAligarh%20Muslim%20University!5e0!3m2!1sen!2sin!4v1755866191023!5m2!1sen!2sin" width="100%" height="290" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="" role="form" class="php-email-form" autocomplete="off">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="number">Your Phone Number</label>
                  <input type="text" class="form-control" name="number" id="number" required>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="text-center"><button type="submit" name="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
    
    <!-- End Contact Section -->

  </main>
  
  <!-- End #main -->


  <!-- ======= Footer ======= -->

  <footer id="footer">
    
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Homeify</h3>
            <p>
              123 ABC <br>
              Aligarh, 123456<br>
              Uttar Pradesh <br>
              <strong>Phone:</strong> +91 1234567890<br>
              <strong>Email:</strong> homeify@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#administration">Administration</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">WiFi Facility</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Common Room</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Reading Room</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Computer Lab</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Reach out to us via our social media platforms: (Twitter, Facebook, Instagram, Linkedin). Send us a direct message and we'll be sure to respond.</p>
            <div class="social-links mt-3">
              <a href="https://github.com/Ateeq0378" class="github" target="_blank">
                <i class="bx bxl-github"></i>
              </a>
              <a href="mailto:ateeq0378@gmail.com? subject=Information about Modern Bank" target="_blank">
                <i class="ri-mail-fill"></i>
              </a>
              <a href="https://www.instagram.com/ateeq0378/?next=%2F" class="instagram" target="_blank">
                <i class="bx bxl-instagram"></i>
              </a>
              <a href="https://www.linkedin.com/in/ateeq-ahmad-1b52b628a" class="linkedin" target="_blank">
                <i class="bx bxl-linkedin"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Homeify - One stop for all your hostel needs</span></strong>
      </div>
      <div class="credits">
        Designed & Developed by <a href="">Ateeq Ahmad</a>
      </div>
    </div>
  </footer>
  
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/assets/js/main.js') }}"></script>

</body>

</html>
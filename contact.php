<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'components/home_style.php' ?>
    </head>

    <body>
    <div class="wrap">
        <?php include 'components/home_header.php' ?>
    </div>
    <?php include 'components/navbar_contact.php' ?>
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2">
              <span class="mr-2"
                ><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a
              ></span>
              <span>Contact <i class="ion-ios-arrow-forward"></i></span>
            </p>
            <h1 class="mb-0 bread">Contact</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="wrapper">
              <div class="row no-gutters">
                <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                  <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Get in touch</h3>
                    <div id="form-message-warning" class="mb-4"></div>
                    <div id="form-message-success" class="mb-4">Your message was sent, thank you!</div>
                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="label" for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="label" for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="label" for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="label" for="#">Message</label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary" />
                            <div class="submitting"></div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                  <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                    <h3>Let's get in touch</h3>
                    <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                    <div class="dbox w-100 d-flex align-items-start">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-map-marker"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-phone"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-paper-plane"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                      </div>
                    </div>
                    <div class="dbox w-100 d-flex align-items-center">
                      <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-globe"></span>
                      </div>
                      <div class="text pl-3">
                        <p><span>Website</span> <a href="#">yoursite.com</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Embedded Google Map -->
    <div class="row gy-4 justify-content-center" data-aos="fade-up" data-aos-delay="600">
      <div class="col-12">
        <div class="map-responsive" style="overflow: hidden; padding-bottom: 56.25%; position: relative; height: 0">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1770.7030728629154!2d101.53267783590664!3d3.7236909949624337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cb89c69b82a3ab%3A0x7fa38dc86ca7823!2sKompleks%20Akademik%20UPSI!5e0!3m2!1sen!2smy!4v1749783925508!5m2!1sen!2smy"
            width="100%"
            height="450"
            style="border: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Kompleks Akademik UPSI"
          ></iframe>
        </div>
      </div>
    </div>
    <!-- End Embedded Google Map -->

    <footer class="footer">
        <?php include 'components/home_footer.php' ?>
    </footer>

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
            </svg>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/scrollax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="js/google-map.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>

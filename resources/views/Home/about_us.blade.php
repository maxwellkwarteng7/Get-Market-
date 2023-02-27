<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - About Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @include('Home.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>About Our Company</h2>
                        <span>Awesome, clean &amp; creative HTML5 Template</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** About Area Starts ***** -->
    <div class="about-us">
        <div class="container">
          @foreach($about_info->take(1) as $about)
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-image">
                        <img src="aboutimages/{{$about->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <h4>About Us &amp; Our Skills</h4>
                        <span>This is a sample information about our website, and this sample information is indicated below in the quotes </span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>{{$about->description}}</p>
                        </div>

                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
    <!-- ***** About Area Ends ***** -->

    <!-- ***** Our Team Area Starts ***** -->
    <section class="our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Amazing Team</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/team-member-01.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Ragnar Lodbrok</h4>
                            <span>Product Caretaker</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/team-member-02.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Ragnar Lodbrok</h4>
                            <span>Product Caretaker</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-item">
                        <div class="thumb">
                            <div class="hover-effect">
                                <div class="inner-content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <img src="assets/images/team-member-03.jpg">
                        </div>
                        <div class="down-content">
                            <h4>Ragnar Lodbrok</h4>
                            <span>Product Caretaker</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Our Team Area Ends ***** -->

    <!-- ***** Services Area Starts ***** -->
    <section class="our-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Services</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Synther Vaporware</h4>
                        <p>Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed do eiusmod temp incididunt ut labore, et dolore quis ipsum suspend.</p>
                        <img src="assets/images/service-01.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Locavore Squidward</h4>
                        <p>Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed do eiusmod temp incididunt ut labore, et dolore quis ipsum suspend.</p>
                        <img src="assets/images/service-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-item">
                        <h4>Health Gothfam</h4>
                        <p>Lorem ipsum dolor sit amet, consecteturti adipiscing elit, sed do eiusmod temp incididunt ut labore, et dolore quis ipsum suspend.</p>
                        <img src="assets/images/service-03.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
      @include('Home.subscribe')
    <!-- ***** Subscribe Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    @include('Home.footer')


    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>

  </body>

</html>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Detail Page</title>

    <base href="/public">
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
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>{{$product->name}}</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
          @include('sweetalert::alert')
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                    <img style="width:100%; height:410px;" src="products_images/{{$product->image}}"alt="">
                    @foreach($extra_images as $extra)
                    <img style="width:100%;height:410px;" src="extra_images/{{$extra->image}}" alt="">
                  @endforeach
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <h4>{{$product->name}}</h4>
                    <span class="price">Ghs {{$product->price}}</span>
                    <ul class="stars">
                        @for ($i=0; $i <$rate; $i++)
                            <li><i class="fa fa-star"></i></li>
                        @endfor
                    </ul>
                    <span>
                      <marquee style="font-size:35px;font-style:italic" direction="left">{{$product->name}} </marquee>
                    </span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i><p>{{$product->description}}</p>
                    </div>
                    <div style="">
                      <b style="font-family:verdana;">Quantity available: {{$product->quantity}} </b>
                    </div>
                    <div class="quantity-content">
                        <div class="left-content">
                            <h6>No. of Orders</h6>
                        </div>
                        <div class="right-content">
                            <div class="quantity buttons_added">
                              <form action="{{url('/add_to_cart',$product->id)}}" method="post">
                                @csrf
                                <input type="button" value="-" class="minus">

                                <input type="number" step="1" min="1" max="" name="quantity_ordered" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">

                                <input type="button" value="+" class="plus">
                                <div class="p-2">
                                  <input class="btn btn-outline-dark btn-rounded" type="submit" value="Add To Cart">
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                      {{-- rating form  --}}
                  
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

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
    <script src="assets/js/quantity.js"></script>

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

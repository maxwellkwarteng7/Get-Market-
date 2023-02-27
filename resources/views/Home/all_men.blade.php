<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Listing Page</title>


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
                        <h2>Check Our Products</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    {{-- search starts Here --}}
      <div style="" class="text-center p-3">
        <form class="" action="{{url('/search_men_products')}}" method="get">
          @csrf
          <input class="p-2" type="text" name="search" placeholder="search product">
          <input type="submit" class="btn btn-outline-dark btn-sm"  value="search">
        </form>
      </div>
      {{-- search end here --}}

    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Our Latest Men Products</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>


        {{-- product content --}}
        <div class="container">
            <div class="row">
              @if(count($all_men)>0)
              @foreach($all_men as $product)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{url('/view_product',$product->id)}}"><i class="fa fa-eye"></i></a></li>

                                    <li><a href="{{url('/view_product',$product->id)}}"><i class="fa fa-star"></i></a></li>

                                    <li><a href="{{url('/view_product',$product->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <img style="width:100%; height:320px;" src="products_images/{{$product->image}}" alt="">
                        </div>
                        <div class="down-content">
                            <h4>{{$product->name}}</h4>
                            <div style="display:flex">
                              @if($product->discount_price==null)
                             <div  class="p-2">
                              <span>Ghs {{$product->price}}</span>
                             </div>
                           @else
                             <div style="text-decoration:line-through" class="p-2">
                              <span>Ghs {{$product->price}}</span>
                             </div>

                             <div class="p-2">
                               <span>Ghs {{$product->discount_price}}</span>
                             </div>
                           @endif

                            </div>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
              @endforeach
            @else
              <div style="margin:auto;" class="text-center p-4">
                <h3 class="text-center">No match found</h3>
              </div>


            @endif
                {{-- product content end here --}}
                {{-- pagination --}}
                <div class="col-lg-12">
                  <div class="">
                      {{$all_men->links()}}
                  </div>
                </div>
                {{-- pagination end here --}}
            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->

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

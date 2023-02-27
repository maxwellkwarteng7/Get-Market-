<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Contact Page</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
          @include('sweetalert::alert')

            <div class="row" style="margin:auto">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Cart </h2>
                        <span>Awesome, clean &amp; creative HTML5 Template</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="margin:auto;" class="container">
      <div class="row col-lg-12">
        <div class="card" style="margin:auto;">
          <div class="card-body">
            <h3 class="card-title">Cart table </h3>
              <div class="table-responsive">
              <table class="table table-dark table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity ordered</th>
                    <th>Image</th>
                    <th>Remove</th>



                  </tr>

                </thead>
                <tbody>
                  <?php $total = 0 ?>
                  @foreach($user_cart as $cart)
                  <tr align="center">
                    <td class="p-3">{{$cart->product_name}}</td>

                    <td class="p-3">{{$cart->product_price}}</td>

                    <td class="p-3">{{$cart->quantity_ordered}}</td>

                    <td class="p-2"> <img style="width:100%;height:100px;" src="/products_images/{{$cart->product_image}}" alt=""></td>

                    <td> <a onclick="confirmation(event)" href="{{url('/delete_cart',$cart->id)}}" class="btn btn-outline-danger btn-rounded btn-sm">remove</a> </td>
                  </tr>
                  <?php $total+=$cart->product_price ?>
                @endforeach
                </tbody>
              </table>

              <div class="p-2">
                {{$user_cart->links()}}

              </div>
            </div>



          </div>

        </div>

      </div>
    </div>
    @if(count($user_cart)>0)
    <div  class="p-2 text-center">
      <b>Total order price :Ghs {{$total}}</b>
    </div>
    <div class="text-center p-2">
      <h3 class="p-3" style="font-family:verdana;">Proceed to order</h3>
     <a onclick="confirm(event)" href="{{url('/cash_on_delivery')}}" class="btn btn-outline-primary btn-sm">Cash on delivery</a>
     <a href="{{url('/card_payment',$total)}}" class="btn btn-outline-success btn-sm">pay with card</a>
    </div>
    @endif



    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Contact Area Starts ***** -->

    <!-- ***** Contact Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->

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
    <script type="text/javascript">
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log('urlToRedirect');
        swal({
          title:'Are you sure you want to delete ?',
          text: 'You will not be able to revert this .',
          icon:'warning',
          buttons:true,
          dangerMode:true

        })
        .then(
          (willCancel)=>{
            if(willCancel){
              window.location.href = urlToRedirect;
            }
          }


        );
      }



      function confirm(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log('urlToRedirect');
        swal({
          title:'Are you sure you want to order and pay with cash on delivery ?',
          text: 'You will not be able to revert this ',
          icon:'warning',
          buttons:true,
          dangerMode:true

        })
        .then(
          (willCancel)=>{
            if(willCancel){
              window.location.href = urlToRedirect;
            }
          }


        );
      }
    </script>

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

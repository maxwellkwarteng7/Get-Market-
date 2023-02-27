<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <base href="/public">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      @include('admin.navbar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
          @include('admin.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @include('sweetalert::alert')
            {{-- search starts here --}}


            <div class=" text-center p-4">
              <form  action="{{url('/search_orders')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Search order">
                <input type="submit" class="btn btn-outline btn-rounded btn-sm" value="search">
              </form>
            </div>



              {{-- search end here --}}
            @if(count($orders)>0)
              <div class="row col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <h3 class="card-title">Orders</h3>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Payment status</th>
                            <th>Delivery status</th>
                            <th>Delivered</th>
                            <th>Email customer</th>
                          </tr>
                        </thead>
                          <tbody>
                          @foreach($orders as $order)
                            <tr>
                              <td>{{$order->name}}</td>
                              <td>{{$order->phone}}</td>
                              <td>{{$order->email}}</td>
                              <td>{{$order->address}}</td>
                              <td>{{$order->product_name}}</td>
                              <td>{{$order->product_price}}</td>
                              <td>{{$order->quantity_ordered}}</td>
                              <td>
                                <img style="" src="/products_images/{{$order->product_image}}" alt="">
                              </td>
                              <td>
                                {{$order->payment_status}}</td>

                                <td>
                                  {{$order->delivery_status}}
                                </td>
                                @if($order->delivery_status=='processing')
                                <td>
                                  <a onclick="confirmation(event)" href="{{url('/delivered',$order->id)}}" class="btn btn-primary btn-rounded btn-sm">delivery</a>
                                </td>
                              @else
                                <td>
                                  <a class="btn btn-success btn-rounded btn-sm" >delivered</a>
                                </td>

                              @endif
                              <td>
                                <a class="btn btn-secondary btn-rounded btn-sm" href="{{url('/send_email',$order->id)}}">Send Email</a>
                              </td>

                            </tr>
                          @endforeach
                        </tbody>

                      </table>
                      <div class="p-2">
                        {{$orders->links()}}

                      </div>




                    </div>

                  </div>

                </div>

              </div>

        @else
          <div class="text-center p-5">
            <h3>No orders made!!</h3>
          </div>


        @endif





            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
     @include('admin.scripts')

     <script type="text/javascript">
       function confirmation(ev){
         ev.preventDefault();
         var urlToRedirect = ev.currentTarget.getAttribute('href');
         console.log('urlToRedirect');
         swal({
           title:'Are you sure order is delivered ?',
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
     </script>
    <!-- End custom js for this page -->
  </body>
</html>

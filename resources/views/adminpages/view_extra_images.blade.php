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
            @if(count($product_images)>0)
              <div class="table-responsive">
                <table style="margin:auto;">
                <tr>
                  <th class="p-2" >Image</th>
                  <th class="p-2">Action</th>
                </tr>
                @foreach($product_images as $product)

                <tr>
                  <td class="p-2"> <img style="width:70%;" src="/extra_images/{{$product->image}}" alt=""></td>
                  <td class="p-2"> <a href="{{url('/delete_extra_image',$product->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
              @endforeach

                </table>
                {{$product_images->links()}}

              </div>

        @else
          <div class="text-center p-5">
            <h3>No extra images have been added to this product</h3>
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
    <!-- End custom js for this page -->
  </body>
</html>

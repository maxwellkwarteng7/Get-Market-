
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
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <base href="/public" target="_blank">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico" />
    <style media="screen">
      label{
        margin:auto;
        width:100%;
      }
    </style>
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
            @include('inc.message')
            @include('sweetalert::alert')
            <div class="row col-lg-8" style="padding:30px;">
              <div class="card">
                <div class="card-body">
                  <h2 class="card-title">Add extra image</h2>
                  <form class="form-control-sm" action="{{url('/save_extra_image',$product->id)}}" method="post" enctype="multipart/form-data" target="_self">
                    @csrf
                    <div class=" p-2">
                      <label>Add image :</label>
                      <input type="file" name="extra_image" required>
                    </div>
                    <div class="p-2">
                      <input type="submit" class="btn btn-outline-primary btn-rounded" value="Add">
                    </div>

                  </form>
                </div>
              </div>
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

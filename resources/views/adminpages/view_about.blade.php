
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

            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">About information</h3>
                  <div class="p-2">
                    <h2 class="p-2">Description</h2>
                    <p>{{$about->description}}</p>
                  </div>
                  <div class="p-2">
                    <h2 class="p-2">Image</h2>
                    <img src="/aboutimages/{{$about->image}}" alt="" style="width:100%;">
                  </div>

                  <div class="p-2">
                   <a class="btn btn-outline-primary btn-rounded btn-sm" href="{{url('/add_about')}}">Go back</a>
                  </div>

                </div>

              </div>

            </div>


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

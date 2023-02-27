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

    <style media="screen">
      label{
        width:100px;
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
            @include('sweetalert::alert')

            <div class="row col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Email customer</h3>
                    <h2 class="p-3">Send mail to {{$contact->email}}</h2>
                    <form class="" action="{{url('send_contact_mail',$contact->id)}}" method="post">
                      @csrf
                      <div class="col-lg-5 p-2">
                          <label>Greeting</label>
                          <input type="text" name="greeting" placeholder="Greeting!!" required>
                      </div>

                      <div class="col-lg-5 p-2">
                          <label>Description</label>
                          <input type="text" name="description" placeholder="Enter mail description" required>
                      </div>

                      <div class="col-lg-5 p-2">
                          <label>Body</label>
                          <textarea name="body" rows="5" cols="30" required placeholder="Enter body of mail"></textarea>
                      </div>

                      <div class="col-lg-5 p-2">
                          <label>Button name</label>
                          <input type="text" name="button" placeholder="Enter last line" required>
                      </div>

                      <div class="col-lg-5 p-2">
                          <label>Link</label>
                          <input type="url" name="url" placeholder="eg: https//:youtube.com" required>
                      </div>

                      <div class="col-lg-5 p-2">
                          <label>Last line</label>
                          <input type="text" name="lastline" placeholder="Enter last line" required>
                      </div>

                      <div class="col-lg-5 p-2">
                          <input class="btn btn-outline-info btn-rounded btn-sm" type="submit" value="Send">
                      </div>

                    </form>


                  </div>

                </div>

            </div>




           {{-- the last part the todo and the users table --}}

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

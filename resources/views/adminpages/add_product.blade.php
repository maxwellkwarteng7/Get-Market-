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
                  <h2 class="card-title">Add product here</h2>
                  <form class="form-control-sm" action="{{url('/save_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" p-2">
                      <label>Name :</label>
                      <input type="text" name="name" placeholder="Enter product name" required>
                    </div>
                    <div class=" p-2">
                      <label>Price :</label>
                      <input type="number" name="price" placeholder="Price" required>
                    </div>
                    <div class=" p-2">
                      <label>Discount Price :</label>
                      <input type="number" name="discount_price" placeholder="Discount price">
                    </div>
                    <div class=" p-2">
                      <label>Quantity available :</label>
                      <input type="number" name="quantity" placeholder="Quantity available" required>
                    </div>
                    <div class=" p-2">
                      <label>Description :</label>
                      <input type="text" name="description" placeholder="description" required>
                    </div>
                    <div class=" p-2">
                      <label>Category :</label>
                      <select class="" name="product_category" required>
                        <option value="" selected="">choose category</option>
                        @foreach($categories as $category)
                          <option name="product_category">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="p-2">
                      <label>Image :</label>
                      <input type="file" name="image" required>
                    </div>
                    <div style="" class="p-2">
                    <input type="submit" class="btn btn-outline-primary btn-rounded" value="Add product">
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

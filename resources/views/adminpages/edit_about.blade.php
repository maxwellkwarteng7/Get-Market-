
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
      #color{
        color:crimson;
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
              {{--The about form  --}}
              <div class="col-lg-12 ">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Edit about information</h3>
                    <form  action="{{url('/save_edited_about',$about->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="p-2">
                        <label>Old image : </label>
                        <img src="/aboutimages/{{$about->image}}" style="width:200px; height:80px ;" alt="">
                      </div>

                      <div class="p-2">
                        <label>New image : </label>
                        <input type="file" name="image" >
                      </div>
                      <div class="p-2">
                        <label>Description :</label>
                        <textarea  name="description" rows="4" cols="32" placeholder="Enter description of company">{{$about->description}}</textarea>
                      </div>
                      <div class="">
                        <input type="submit" class="btn btn-outline-success btn-rounded btn-sm" value="update" >
                      </div>
                    </form>
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
    <script type="text/javascript">
      function confirm(ev){
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
    </script>
  </body>
</html>

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
                    <h3 class="card-title">Add about information</h3>
                    <form  action="{{url('/save_about')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="p-2">
                        <label>Firm image : </label>
                        <input type="file" name="image" >
                      </div>
                      <div class="p-2">
                        <label>Description :</label>
                        <textarea name="description" rows="4" cols="32" placeholder="Enter description of company"></textarea>
                      </div>
                      <div class="p-2">
                        <input type="submit" class="btn btn-outline-primary btn-rounded btn-sm" value="submit" >
                      </div>
                    </form>
                  </div>
                </div>

              </div>


              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">About information</h3>
                    <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Description</th>
                          <th>Image</th>
                          <th>View</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($about_info->take(1) as $about)
                        <tr>
                          <td>{{Illuminate\Support\Str::limit($about->description, 24 ,$end="...")}}</td>
                          <td>
                             <img style="border-radius:0px; height:80px; width:250px;"  src="aboutimages/{{$about->image}}" alt="">
                          </td>
                          <td> <a class="btn btn-outline-success btn-rounded btn-sm" href="{{url('/view_about',$about->id)}}">view</a> </td>
                          <td>
                             <a class="btn btn-outline-info btn-rounded btn-sm"  href="{{url('/edit_about',$about->id)}}">Edit</a>
                          </td>
                          <td>
                              <a onclick="confirm(event)" class="btn btn-outline-danger btn-rounded btn-sm"  href="{{url('/delete_about',$about->id)}}">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
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

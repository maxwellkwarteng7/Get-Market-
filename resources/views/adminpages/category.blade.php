<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Get Market Admin</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            @include('inc.message')
            @include('sweetalert::alert')
            {{-- form start --}}
            <div class="text-center p-3">
              <h3 class="p-2">Add category here </h3>
              <form class="" action="{{url('/save_category')}}" method="post">
                @csrf
                <div class="p-1">
                  <input class="p-3" type="text" name="name" placeholder="Enter category name">
                </div>
                <br>
                <div class="">
                  <input type="submit" class="btn btn-outline-primary btn-rounded btn-sm" value="Submit">
                </div>
              </form>
            </div>
            {{-- form end --}}

            {{-- A table to show all categories --}}
            <div class="row col-lg-6 " style="padding:30px">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Categories</h3>

                  <table class="table table-hover">

                    <thead>
                      <tr>
                        <th>category name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($categories as $category)
                      <tr>
                        <td>{{$category->name}}</td>
                        <td> <a onclick="confirmation(event)" href="{{url('delete_category',$category->id)}}" class="btn btn-outline-danger btn-rounded btn-lg">Delete</a> </td>
                      </tr>
                      <div class="">
                      @empty
                        <h2>No category added</h2>
                      </div>
                    @endforelse

                    </tbody>
                  </table>
                  <div class="p-2">
                     {{$categories->links()}}
                  </div>

                </div>

              </div>

            </div>


            {{-- Table end --}}


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
         title: 'Are you sure to delete this category?',
         text:'You will not be able to revert this!',
         icon:'warning',
         buttons:true,
         dangerMode:true
       })
       .then(
         (willCancel) => {
         if(willCancel){
           window.location.href = urlToRedirect;
         }
       });
     }
     </script>
    <!-- End custom js for this page -->
  </body>
</html>

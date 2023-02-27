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
            {{-- search starts here --}}


            <div class=" p-4">
              <form  action="{{url('/search_users')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Search user">
                <input type="submit" class="btn btn-outline btn-rounded btn-sm" value="search">
              </form>
            </div>



              {{-- search end here --}}


            {{-- A table to show all categories --}}
            <div class="row col-lg-6 " style="padding:30px">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Users</h3>
                  @if(count($users)>0)

                  <table class="table table-hover">

                    <thead>
                      <tr>
                        <th>User name</th>
                        <th>Email</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        @if($user->usertype==1)
                          <td >
                            <a class="btn btn-success btn-rounded btn-sm">Admin</a>
                          </td>
                        @else
                        <td> <a onclick="confirmation(event)" href="{{url('delete_user',$user->id)}}" class="btn btn-outline-danger btn-rounded btn-sm">Delete</a> </td>
                      @endif
                      </tr>

                    @endforeach


                    </tbody>
                  </table>
                @else

                  <div class="p-3 text-center">
                    <h3>No users</h3>
                  </div>

                @endif
                  <div class="p-2">
                     {{$users->links()}}
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
         title: 'Are you sure to delete this user?',
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

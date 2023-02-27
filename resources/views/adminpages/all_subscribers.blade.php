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


            <div class=" p-4">
              <form  action="{{url('/search_subscribers')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Search subscriber">
                <input type="submit" class="btn btn-outline btn-rounded btn-sm" value="search">
              </form>
            </div>



              {{-- search end here --}}

            <div class="row col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <h3 class="card-title">Subscribers</h3>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Send mail</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                         @if(count($subscribers)>0)
                           @foreach($subscribers as $subscriber)
                          <tr>
                            <td>{{$subscriber->name}}</td>
                            <td>{{$subscriber->email}}</td>
                            <td><a class="btn btn-info btn-rounded btn-sm" href="{{url('mail_subscriber',$subscriber->id)}}">Email</a> </td>
                            <td><a onclick="confirmation(event)" class="btn btn-danger btn-rounded btn-sm" href="{{url('/delete_subscriber',$subscriber->id)}}">delete</a></td>
                          </tr>
                        @endforeach
                        @else
                          <div class="text-center">
                             <h2>No subscribers</h2>
                          </div>
                        @endif
                        </tbody>

                      </table>
                      {{$subscribers->links()}}
                    </div>

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
    <script type="text/javascript">

      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log('urlToRedirect');
        swal({
          title:'Are you sure you want to delete ?',
          text:'You cannot revert this .',
          icon:'warning',
          buttons:true ,
          dangerMode:true

        }).then(
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

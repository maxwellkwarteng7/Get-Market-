
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
        width:150px;
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

            {{-- having the form here for the admin to send the email to the customer --}}
            <div class="row col-lg-8" style="display:inline;">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Send Customer an email </h3>

                  <h4 class="p-3">send mail to {{$order->email}}</h4>

                    <form style="display:inline;" action="{{url('/send_email_notification',$order->id)}}" method="post">
                      @csrf
                      <div class="p-2">
                        <label>Greeting :</label>
                            <input type="text" name="greeting" placeholder="Enter greeting here">
                      </div>

                      <div class="p-2">
                        <label>First line :</label>
                            <input type="text" name="first_line" placeholder="Enter first line here">
                      </div>

                      <div class="p-2">
                        <label>Email body :</label>

                        <input type="text" name="body" placeholder="Enter the body of the email">
                      </div>

                      <div class="p-2">
                        <label>Button name :</label>

                        <input type="text" name="button_name" value="click me">
                      </div>

                      <div class="p-2">
                        <label>Url :</label>

                        <input type="url" name="url" placeholder="Enter the url">
                      </div>

                        <div class="p-2">
                          <label>Last line :</label>

                            <input type="text" name="last_line" placeholder="Enter last line">
                        </div>

                      <div class="p-3" style="padding-left:40px;">
                        <input type="submit" class="btn btn-outline-primary btn-rounded btn-sm"  value="send">
                      </div>

                    </form>


                </div>

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

     <script type="text/javascript">
       function confirmation(ev){
         ev.preventDefault();
         var urlToRedirect = ev.currentTarget.getAttribute('href');
         console.log('urlToRedirect');
         swal({
           title:'Are you sure order is delivered ?',
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
    <!-- End custom js for this page -->
  </body>
</html>

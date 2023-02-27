<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Get Market Admin</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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


            <div class="text-center p-4">
              <form  action="{{url('/search_products')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="Search product">
                <input type="submit" class="btn btn-outline btn-rounded btn-sm" value="search">
              </form>
            </div>



              {{-- search end here --}}
            <div class="row col-lg-12">
              <div class="card">
                <div class="card body">
                  <h3 class="card-title">All products</h3>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Discount price</th>
                          <th>Quantity</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Extra images</th>
                          <th>View extra images</th>
                          <th>Delete</th>
                          <th>Edit</th>

                        </tr>
                      </thead>
                      <tbody>
                        @forelse($products as $product)
                        <tr>
                          <td>{{$product->name}}</td>
                          <td>{{$product->price}}</td>

                          @if($product->discount_price!=null)
                          <td>{{$product->discount_price}}</td>
                          @else
                          <td> <p>null</p> </td>
                          @endif

                          <td>{{$product->quantity}}</td>
                          <td>{{$product->category}}</td>
                          <td>{{Illuminate\Support\str::limit($product->description,20,$end='...')}}</td>
                          <td> <img src="/products_images/{{$product->image}}" alt=""></td>
                          <td>
                            <a class="btn btn-success btn-rounded btn-sm" href="{{url('/add_images',$product->id)}}">Add</a>
                          </td>
                           <td>
                            <a href="{{url('/view_extra_images',$product->id)}}" class="btn btn-info btn-rounded btn-sm">view</a>
                          </td>

                          <td> <a onclick="confirmation(event)" class="btn btn-outline-danger btn-rounded btn-sm" href="{{url('/delete_product',$product->id)}}">Delete</a> </td>

                          <td> <a class="btn btn-outline-secondary btn-rounded btn-sm" href="{{url('/edit_product',$product->id)}}">Edit</a> </td>


                        </tr>
                      @empty
                        <div class="text-center p-3">
                          <h3>No match found</h3>
                        </div>
                      @endforelse
                      </tbody>
                    </table>
                    <div  class="p-3">
                     <span>  {{$products->links()}}</span>

                    </div>

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
    <!-- End custom js for this page -->
    <script type="text/javascript">
      function confirmation(ev){
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

<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
      <i class="mdi mdi-home"></i>
    </span> Dashboard
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
      </li>
    </ul>
  </nav>
</div>
<div class="row">
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder text-white">
      <div class="card-body">
        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Orders <i class="mdi mdi-chart-line mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5 " style="font-size:30px;">{{$orderCount}}</h2>
        <h2 class="p-2">Delivered : {{$delivered}}</h2>
        <h2 class="p-2">Processing : {{$processing}}</h2>

      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
      <div class="card-body">
        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Products <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5" style="font-size:30px;">{{$products}}</h2>






        <h6 class="card-text p-1">Men    : {{$men}}</h6>
        <h6 class="card-text p-1">Women  : {{$women}}</h6>
        <h6 class="card-text p-1">Kids   : {{$kids}}</h6>
        <h6 class="card-text p-1">Acces..: {{$accessories}}</h6>


      </div>
    </div>
  </div>
  <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5" style="font-size:30px;">{{$visitors}}</h2>
        <h6 class="card-text p-2">Subscribers : {{$subscribers}}</h6>

        <h6 class="card-text p-2">Contacts : {{$contacts}}</h6>
      </div>
    </div>
  </div>
</div>

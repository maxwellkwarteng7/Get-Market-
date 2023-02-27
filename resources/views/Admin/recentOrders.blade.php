<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Recent Orders</h4>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th> Name </th>
                <th> Phone </th>
                <th> Price </th>
                <th> Image </th>
                <th> Quantity </th>
                <th>Payment Status</th>
                <th>Delivery Status</th>

              </tr>
            </thead>
            <tbody>
              @foreach($recent_orders->take(6) as $order)
              <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_price}}</td>
                <td>
                  <img src="/products_images/{{$order->product_image}}" alt="">
                </td>

                <td>{{$order->quantity_ordered}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
              </tr>
            @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

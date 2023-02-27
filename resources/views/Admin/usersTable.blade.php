<div class="col-md-7 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Recent Users</h4>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th> Email </th>
              <th>Usertype</th>
              <th> created at </th>
            </tr>
          </thead>
          <tbody>
            @foreach($users->take(5) as $user)
            <tr>
              <td> {{$user->name}} </td>
              <td> {{$user->email}}</td>

              @if($user->usertype==1)
                <td>
                  <a class="btn btn-success btn-rounded btn-sm">Admin</a>
                </td>
              @else
                <td>
                  <a class="btn btn-dark btn-rounded btn-sm">User</a>
                </td>

              @endif


              <td> {{$user->created_at}}</td>

            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

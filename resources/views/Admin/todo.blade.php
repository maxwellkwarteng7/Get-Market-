<div class="col-md-5 grid-margin stretch-card">
  @include('sweetalert::alert')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Todo</h4>
      <form class="" action="{{url('/save_todo')}}" method="post">
        @csrf
        <div class="add-items d-flex">
        <label style="margin-right:10px; padding-top:7.5px;"> <a class="btn btn-primary btn-sm ">Todo</a> </label>
        <input type="text" name="todo" placeholder="Enter something to do">

        <input class=" btn btn-outline-success btn-sm" type="submit" value="Save">
        </div>

      </form>

      <div class="list-wrapper">
        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
          @foreach($todos->take(5) as $todo)
          <li>
            <div class="form-check">
              <label class="form-check-label">
                <input class="checkbox" type="checkbox"> {{$todo->todo}} </label>
            </div>
            <span >
              <a style="margin-left:70px;" href="{{url('/delete_todo',$todo->id)}}"><i class="remove mdi mdi-close-circle-outline"></i>
            </li></a>
          </span>

        @endforeach
        </ul>

      </div>

    </div>
  </div>
</div>

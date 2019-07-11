
@extends('layouts.backend_layouts')

@section('my_backend_section')

<h1 class="text-center">All Menu List</h1>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Menu
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ url('menu/insert') }}" enctype="multipart/form-data" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Menu Name</label>
            <input type="text" name="menu_name" class="form-control" placeholder="Enter Menu Name">
          </div>
          <div class="form-group">
            <label>Menu Details</label>
            <textarea name="menu_details" rows="5" cols="62"></textarea>
          </div>
          <div class="form-group">
            <label>Menu Photo</label>
            <input type="file" name="menu_photo" class="form-control">
          </div>
          <div class="form-group">
            <label>Menu Price</label>
            <input type="number" name="menu_price" class="form-control" placeholder="Enter Menu Price">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>






























@endsection

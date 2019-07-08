
@extends('layouts.backend_layouts')

@section('my_backend_section')


<h2 class="text-center">All Slider List</h2>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Slider
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

        <form action="{{ url('slider/insert') }}" enctype="multipart/form-data" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Slider Name</label>
            <input type="text" name="slider_name" class="form-control" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label>Slider Details</label>
            <textarea name="slider_details" rows="5" cols="62"></textarea>
          </div>
          <div class="form-group">
            <label>Slider Photo</label>
            <input type="file" name="slider_photo" class="form-control">
          </div>
          <div class="form-group">
            <label>Button Name</label>
            <input type="text" name="button_name" class="form-control" placeholder="Enter Button">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </div>
</div>



<br>
<br>

  @if (Session::has('deleted_msg'))
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('deleted_msg') }}
    </div>
  @endif
  @if (Session::has('success_msg'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('success_msg') }}
    </div>
  @endif
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Slider Name</th>
        <th>Slider Details</th>
        <th>Slider Photo</th>
        <th>Button Name</th>
        <th width="150px">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($all_sliders as $all_slider)
        <tr>
          <td>{{ $all_slider->id }}</td>
          <td>{{ $all_slider->slider_name }}</td>
          <td>{{ str_limit($all_slider->slider_details, 50) }}</td>
          <td><img src="{{ asset('uploads/slider_photos') }}/{{ $all_slider->slider_photo }}" height="50" width="50"></td>
          <td><button>{{ $all_slider->button_name }}</button></td>
          <td>
            <a href="{{ url('slider/delete') }}/{{ $all_slider->id }}" class="btn btn-sm btn-danger" type="submit">Delete</a>
            <a href="{{ url('slider/edit') }}/{{ $all_slider->id }}" class="btn btn-sm btn-info" type="submit">Edit</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>








@endsection

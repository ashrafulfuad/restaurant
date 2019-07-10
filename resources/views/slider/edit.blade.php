@extends('layouts.backend_layouts')

@section('my_backend_section')



<h3>Slider Edit of <span style="color:blue;">{{ $edit_slider->slider_name }}</span></h3>

@if (Session::has('deleted_msg'))
  <div class="alert alert-info alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ Session::get('deleted_msg') }}
  </div>
@endif

<form action="{{ url('edit/slider/insert') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label>Slider Name</label>
    <input type="hidden" class="form-control" name="slider_id" placeholder="Enter Starting Price" value="{{ $edit_slider->id }}">
    <input type="text" class="form-control" name="slider_name" placeholder="Enter Slider Name" value="{{ $edit_slider->slider_name }}">
  </div>
  <div class="form-group">
    <label>Slider Details</label><br>
    <textarea name="slider_details" rows="8" cols="105" value="">{{ $edit_slider->slider_details }}</textarea>
  </div>
  <div class="form-group">
    <label>Slider Photo</label>
    <input type="file" class="form-control" name="slider_photo" value="{{ $edit_slider->slider_photo }}">
  </div>
  <div class="form-group">
  <label>Button Name</label>
    <input type="text" class="form-control" name="button_name" placeholder="Enter Button Name" value="{{ $edit_slider->button_name }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection


@extends('layouts.backend_layouts')

@section('my_backend_section')

  <h1 class="text-center">Individual Admins Profile</h1>
  <hr>


<div class="row justify-content-center">
  <div class="col-lg-12">
    <table class="">
      <tr height="30px">
        <th width="200px">Name</th>
        <td>:   {{ $user_view->name }}</td>
      </tr>
      <tr height="30px">
        <th>E-mail</th>
        <td>:   {{ $user_view->email }}</td>
      </tr>
      <tr height="30px">
        <th>Created At</th>
        <td>:   {{ $user_view->created_at->diffForHumans() }}</td>
      </tr>
    </table>
  </div>
</div>









































@endsection

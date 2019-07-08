
@extends('layouts.backend_layouts')

@section('my_backend_section')




<h1 class="text-center">User Profile</h1>




<div class="row d-flex justify-content-center">
  {{-- <div class="col-lg-4">

  </div> --}}
  <div class="col-lg-8 justify-content-center">
    <table class="table table-borderless">
      <tr>
        <th class="text-right">Name</th>
        <td>{{ $user_profile->name }}</td>
      </tr>
      <tr>
        <th class="text-right">E-mail</th>
        <td>{{ $user_profile->email }}</td>
      </tr>
      <tr>
        <th class="text-right">Created At</th>
        <td>{{ $user_profile->created_at->diffForHumans() }}</td>
      </tr>
    </table>
  </div>
</div>








@endsection

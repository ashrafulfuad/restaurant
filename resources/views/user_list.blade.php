@extends('layouts.backend_layouts')

@section('my_backend_section')


      <h2 class="text-center">Admin List</h2>

      @if (Session::has('deleted_msg'))
      	<div class="alert alert-danger alert-dismissible" role="alert">
      		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		{{ Session::get('deleted_msg') }}
      	</div>
      @endif
      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>E-mail Address</th>
            <th>Createtd At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_users as $all_user)
            <tr>
              <td>{{ $all_user->id }}</td>
              <td>{{ $all_user->name }}</td>
              <td>{{ $all_user->email }}</td>
              <td>{{ $all_user->created_at }}</td>
              <td>
                <a href="{{ url('user/delete') }}/{{ $all_user->id }}" class="btn btn-sm btn-danger" type="submit">Delete</a>
                <a href="{{ url('user/view') }}/{{ $all_user->id }}" class="btn btn-sm btn-info" type="submit">View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>


@endsection


@extends('layouts.backend_layouts')

@section('my_backend_section')









<h1 class="text-center">You are logged in</h1>
<hr>
<h3 class="text-center">Admin Dashboard</h3>
<h4 class="text-center" style="color:green">{{ Auth::user()->name }}</h4>
















@endsection

@extends('layouts.app')

@section('content')

@if(auth()->user()->is_admin == 0)

@include('dashboard-user')

@else

@include('dashboard-admin')

@endif

@endsection

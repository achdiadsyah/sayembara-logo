@extends('layouts.app')

@section('content')

@if(auth()->user()->is_admin == 0)

@include('_users.dashboard-user')

@else

@include('_admin.dashboard-admin')

@endif

@endsection

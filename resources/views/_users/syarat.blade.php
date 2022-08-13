@extends('layouts.app')

@section('content')
<div class="caontainer">
    <div class="row">
        <div class="col-md-8 mx-auto pb-3">
            <div class="card card-flush">
                <div class="card-body">
                    @include('_users.list-syarat')
                    <hr>
                    <div class="text-center">
                        <a href="{{route('karya')}}" class="btn btn-primary">Upload Karya Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
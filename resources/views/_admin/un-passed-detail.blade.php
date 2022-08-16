@extends('layouts.app')

@section('content')
<div class="caontainer">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-flush">
                <div class="card-body">
                    <div class="text-center fs-4 fw-bold">Form Unggahan Karya</div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <p class="lead">Karya Unggahan :</p>
                                <a data-magnify="gallery" data-caption="{{ $user->name }}"
                                    href="{{ asset('storage/'.$user->document->file) }}">
                                    <img src="{{ asset('storage/'.$user->document->file) }}" class="img-thumbnail" width="200px" alt="Karya">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="text-center">
                                <p class="lead">Penjelasan Karya :</p>
                                <textarea class="form-control" rows="15" disabled>{{$user->document->description}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
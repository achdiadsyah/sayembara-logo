@extends('layouts.app')

@section('content')
<div class="caontainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush">
                <div class="card-body">
                    <div class="row">
                        @if($user)
                        <div class="col-12 text-center">
                            <h3>JUARA UTAMA</h3>
                            <hr>
                            <h5>Atas Nama : {{ $user->name }}</h5>
                            <h5>Sebagai : {{ $user->registered_as}} - {{ $user->registered_as_info}}</h5>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <p class="lead">Karya :</p>
                                <a data-magnify="gallery" data-caption="{{ $user->name }}"
                                    href="{{ asset('storage/'.$user->document->file) }}">
                                    <img src="{{ asset('storage/'.$user->document->file) }}" class="img-thumbnail" width="200px" alt="Karya">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="text-center">
                                <p class="lead">Penjelasan Karya :</p>
                                <textarea class="form-control" rows="15" disabled>{{$user->document->description}}</textarea>
                            </div>
                        </div>
                        @else
                        <div class="col-12 text-center">
                            <h3>Belum Ada Juara Utama</h3>
                            <hr>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
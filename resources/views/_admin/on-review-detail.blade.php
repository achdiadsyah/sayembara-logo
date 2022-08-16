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
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#modalReject">Reject</button>
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalAccept">Luluskan Sebagai Finalis</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalReject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div class="fs-4 fw-bold">Anda yakin ingin menolak karya ini ?</div>
                    <hr>
                    <p class="lead">
                        Nama : {{$user->name}}
                        <br>
                        {{$user->registered_as}} - {{$user->registered_as_info}}
                    </p>
                    <hr>
                    <form action="{{route('need-review-update')}}" class="d-none" method="post" id="form-reject">
                        @csrf
                        <input type="text" name="id" value="{{$user->id}}">
                        <input type="text" name="slug" value="unpassed">
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onClick="$('#form-reject').submit(); this.disabled=true; this.innerText ='Saving Data...'; ">Reject File</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAccept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div class="fs-4 fw-bold">Anda yakin ingin meluluskan karya ini sebagai finalis ?</div>
                    <hr>
                    <p class="lead">
                        Nama : {{$user->name}}
                        <br>
                        {{$user->registered_as}} - {{$user->registered_as_info}}
                    </p>
                    <hr>
                    <form action="{{route('need-review-update')}}" class="d-none" method="post" id="form-accept">
                        @csrf
                        <input type="text" name="id" value="{{$user->id}}">
                        <input type="text" name="slug" value="assesment">
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onClick="$('#form-accept').submit(); this.disabled=true; this.innerText ='Saving Data...'; ">Accept File</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
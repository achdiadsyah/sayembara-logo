@extends('layouts.app')

@section('content')
<div class="caontainer">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card card-flush">
                <div class="card-body">
                    <div class="text-center fs-4 fw-bold">Form Unggah Karya Anda</div>
                    <hr>
                    @if(empty($document))
                    <form action="{{route('karya-create')}}" method="post" id="form-karya" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Upload File Anda</label>
                            <input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file" id="file" accept="image/*" required>
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Jelaskan tentang karya anda secara detail</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="10" required></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#showSyarat">
                                Save Document
                            </button>
                        </div>
                    </form>
                    @else
                        @if (session('status'))
                            <div class="alert alert-{{ session('status') }}" role="alert">
                                {{ session('text') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <p class="lead">Karya Anda :</p>
                                    <a data-magnify="gallery" data-caption="{{ auth()->user()->name }}"
                                        href="{{ asset('storage/'.auth()->user()->document->file) }}">
                                        <img src="{{ asset('storage/'.auth()->user()->document->file) }}" class="img-thumbnail" width="200px" alt="Karya">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="text-center">
                                    <p class="lead">Penjelasan Anda :</p>
                                    <textarea class="form-control" rows="15" disabled>{{auth()->user()->document->description}}</textarea>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showSyarat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <div class="fs-4 fw-bold">User Agreement</div>
                    <hr>
                    <p class="lead">
                        Dengan ini saya menyatakan telah bersedia mengikuti seluruh persyaratan yang telah di sebutkan oleh panitia penyelenggara.
                        <br>
                        <br>
                        Bila terjadi pelanggaran di kemudian hari, saya bersedia di gugurkan dari kategori peserta, finalis, atau dalam bentuk apapun.
                        <br>
                        <br>
                    </p>
                    <p>
                        Pastikan anda telah membaca seluruh persyaratan dari link berikut.
                        <a href="{{route('syarat')}}" target="_blank">Lihat Persyaratan</a>
                    </p>
                    <hr>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onClick="$('#form-karya').submit(); this.disabled=true; this.innerText ='Uploading Data...'; ">Accept Agreement & Upload</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('foot-script')
<script>    
$(function(){
    const inputElement = document.querySelector('#file');
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.create(inputElement, {
        storeAsFile: true,
        maxFiles: 1,
        allowBrowse: true,
        allowFileEncode: true,
        labelIdle: 'Drag & Drop your files or <span class="filepond--label-action"> Browse </span><br>Allowed : .jpg .jpeg .png<br>Max Size : 2MB<br>Resolution : 800px X 600px'
    });
});
</script>
@endpush
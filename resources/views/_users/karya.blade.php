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
                    <form action="{{route('karya-create')}}" method="post" enctype="multipart/form-data">
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
                            <button type="submit" class="btn btn-primary" onClick="this.form.submit(); this.disabled=true; this.innerText ='Uploading...'; ">Save Document</button>
                        </div>
                    </form>
                    @else
                        @if (session('status'))
                            <div class="alert alert-{{ session('status') }}" role="alert">
                                {{ session('text') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <p class="lead">Karya Anda :</p>
                                    <img src="{{ asset('storage/'.auth()->user()->document->file) }}" class="img-thumbnail" width="200px" onclick="window.open(this.src)" alt="Karya">
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

@endsection

@push('foot-script')
<script>    
$(function(){
    const inputElement = document.querySelector('#file');
    FilePond.create(inputElement, {
        storeAsFile: true,
        maxFiles: 1,
        allowBrowse: true,
        allowFileEncode: true,
        labelIdle: 'Drag & Drop your files or <span class="filepond--label-action"> Browse </span><br>Allowed : .jpg .jpeg .png<br>Max Size : 2MB'
    });
});
</script>
@endpush
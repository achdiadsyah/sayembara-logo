@extends('layouts.auth')

@section('content')
<div class="col-lg-6">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-2">Please Complete Your Data</h1>
            <p class="mb-4">Before proceeding to dashboard</p>
        </div>
        <form class="d-inline" method="POST" action="{{route('completing-data')}}">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ? old('name') : auth()->user()->name }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik">ID Number / KTP</label>
                <input id="nik" type="number" minlength="16" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') ? old('nik') : auth()->user()->nik }}" required>
                @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                    <input id="phone" type="number" minlength="10" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ? old('phone') : auth()->user()->phone }}" required>
                </div>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
              <label for="registered_as">Register As ?</label>
                <select class="form-control" name="registered_as" id="registered_as" required>
                    <option value="">--Please Select--</option>
                    <option value="teacher">Guru / Staff / Civitas</option>
                    <option value="alumni">Alumni</option>
                    <option value="student">Santriwan / Santriwati (AKTIF)</option>
                </select>
            </div>

            <div class="form-group d-none" id="registered_as_info_group">
                <label for="registered_as_info" id="registered_as_info_label"></label>
                <input id="registered_as_info" type="text" class="form-control @error('registered_as_info') is-invalid @enderror" name="registered_as_info" value="{{ old('registered_as_info') }}" required>
                @error('registered_as_info')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-user btn-block" onClick="this.form.submit(); this.disabled=true; this.innerText ='Sending…'; ">
                Save Data
            </button>
        </form>
        <hr>
        <button class="btn btn-danger btn-user btn-block" type="button" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Or Logout
        </button>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Logout</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('foot-script')
<script>
$("#registered_as").on("change", function() {
    $('#registered_as_info').val('');
    if($(this).val() == 'teacher'){
        $('#registered_as_info_group').removeClass('d-none');
        $('#registered_as_info_label').html('Menjabat Sebagai ?');
        $('#registered_as_info').get(0).type = 'text';
        
    } else if($(this).val() == 'alumni'){
        $('#registered_as_info').val();
        $('#registered_as_info_group').removeClass('d-none');
        $('#registered_as_info_label').html('Tahun Tamat ?');
        $('#registered_as_info').get(0).type = 'number';
        $('#registered_as_info').attr('min','1990');
        $('#registered_as_info').attr('max','2022');
        
    } else if($(this).val() == 'student'){
        $('#registered_as_info_group').removeClass('d-none');
        $('#registered_as_info_label').html('Kelas Saat ini?');
        $('#registered_as_info').get(0).type = 'text';
    } else {
        $('#registered_as_info_group').addClass('d-none');
        $('#registered_as_info').val('');
    }
})
</script>
@endpush


<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2 ml-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            New Register</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800 pb-2" id="totalNew">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <a href="{{route('peserta-baru')}}" class="btn btn-sm btn-primary">See All</a>
                    </div>
                    <div class="col-auto mr-2 mr-2">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2 ml-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Users Need Review</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800 pb-2" id="totalNeedReview">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <a href="{{route('need-review')}}" class="btn btn-sm btn-secondary">See All</a>
                    </div>
                    <div class="col-auto mr-2">
                        <i class="fas fa-pen fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2 ml-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Users Reviewed</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800 pb-2" id="totalReviewed">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <a href="{{route('on-review')}}" class="btn btn-sm btn-danger">See All</a>
                    </div>
                    <div class="col-auto mr-2">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2 ml-2">
                        <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                            Get to Final</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800 pb-2" id="totalAssesment">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <a href="{{route('assesment')}}" class="btn btn-sm btn-success">See All</a>
                    </div>
                    <div class="col-auto mr-2">
                        <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                @include('_users.list-syarat')
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Setting Jadwal Perlombaan
                </div>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-{{ session('status') }}" role="alert">
                        {{ session('text') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form action="{{route('home-data-update')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Tanggal Buka Pendaftaran</label>
                      <input type="date" class="form-control" name="open_register" value="{{$config->open_register}}" required>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Tutup Pendaftaran</label>
                      <input type="date" class="form-control" name="close_register" value="{{$config->close_register}}" required>
                    </div>
                    <div class="form-group">
                      <label>Maksimal Jam Pendaftaran</label>
                      <input type="time" class="form-control" name="close_register_time" value="{{$config->close_register_time}}" required>
                    </div>
                    <div class="form-group">
                      <label>Pengumuman</label>
                      <input type="date" class="form-control" name="annoucement" value="{{$config->annoucement}}" required>
                    </div>
                    <button type="submit" class="btn btn-primary" onClick="this.form.submit(); this.disabled=true; this.innerText ='Saving Setting...'; ">Save Setting</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('foot-script')
<script>
    $( document ).ready(function() {
        $.ajax({
            url: "{{route('home-data')}}",
            }).done(function(res) {
            $('#totalNew').html(res.totalNew + " Peserta");
            $('#totalNeedReview').html(res.totalNeedReview + " Peserta");
            $('#totalReviewed').html(res.totalReviewed + " Peserta");
            $('#totalAssesment').html(res.totalAssesment + " Peserta");
        });
    });
</script>
    
@endpush
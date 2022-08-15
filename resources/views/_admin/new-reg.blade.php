@extends('layouts.app')

@section('content')
<div class="caontainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush">
                <div class="card-header">
                    <div class="card-title">Peserta Baru</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>NIK</th>
                                    <th>Phone</th>
                                    <th>Registered As</th>
                                    <th>Registered Info</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('foot-script')
<script type="text/javascript">
$(document).ready(function() {
    $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('peserta-baru') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'nik', name: 'nik'},
                {data: 'phone', name: 'phone'},
                {data: 'registered_as', name: 'registered_as'},
                {data: 'registered_as_info', name: 'registered_as_info'},
                {render: function (data, type, row) {                    
                    return `<a href=""" class="btn btn-success btn-sm">Details</a>`;
                }},
            ]
    });
});    
</script>
@endpush
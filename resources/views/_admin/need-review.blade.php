@extends('layouts.app')

@section('content')
<div class="caontainer">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush">
                <div class="card-header">
                    <div class="card-title">Need Review</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>See File</th>
                                    <th style="width: 10%">Description</th>
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
            ajax: "{{ route('need-review') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'document.file', name: 'document.file', render: function (data, type, row) {
                    return `<a class="btn btn-sm btn-primary" data-magnify="gallery" data-caption="{{asset('storage')}}/${row.document.file}" href="${row.document.file}">See File
                                <img src="{{asset('storage')}}/${row.document.file}" class="img-thumbnail" width="200px" alt="Karya">
                            </a>`;
                }},
                {data: 'document.description', name: 'document.description'},
                {render: function (data, type, row) {                    
                    return `<button class="btn btn-danger btn-sm">Delete</button>`;
                }},
            ]
    });
});    
</script>
@endpush
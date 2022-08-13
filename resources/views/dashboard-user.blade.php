<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Your Timeline</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush">
                <div class="card-body">
                    <div class="col-12">
                        @foreach ($journeys as $item)
                        @if($latest_journey[0]->id == $item->id)
                        <div class="tl-item active">
                        @else
                        <div class="tl-item">
                        @endif
                            <div class="tl-dot b-warning"></div>
                            <div class="tl-content">
                                <div class="fs-5 fw-bold">{{$item->journey->name}}</div>
                                <div class="tl-date"><i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y | h:i:s')}}</div>
                                <div class="tl-description text-muted py-1">{{$item->journey->description}}</div>
                                @if($item->journey->slug == "new")
                                <a href="" class="btn btn-sm btn-warning">Lihat Syarat</a>
                                <a href="" class="btn btn-sm btn-primary">Upload Karya Anda</a>
                                @endif
                                @if($item->journey->slug == "need-review")
                                <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#showUploaded">
                                    Lihat Karya Anda
                                </button>
                                @endif
                                @if($item->journey->slug == "passed")
                                <a href="" class="btn btn-sm btn-success">Upload File Asli</a>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="showUploaded" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
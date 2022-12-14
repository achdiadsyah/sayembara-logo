<div class="container">
    <h1 class="h3 mb-4 text-gray-800">Your Timeline</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-flush">
                <div class="card-body">
                    <div class="col-12">
                        @foreach ($journeys->sortByDesc('order_number') as $item)
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
                                <a href="{{route('syarat')}}" class="btn btn-sm btn-warning">Lihat Syarat</a>
                                    @if(empty($document))
                                        <a href="{{route('karya')}}" class="btn btn-sm btn-primary">Upload Karya Anda</a>
                                    @endif
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

@if(!empty($document))
<div class="modal fade" id="showUploaded" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <p class="lead">Karya Anda :</p>
                    <a data-magnify="gallery" data-caption="{{ auth()->user()->name }}"
                        href="{{ asset('storage/'.auth()->user()->document->file) }}">
                        <img src="{{ asset('storage/'.auth()->user()->document->file) }}" class="img-thumbnail" width="300px" alt="Karya">
                    </a>
                    <hr>
                    <p class="lead">Penjelasan Anda :</p>
                    <textarea class="form-control" rows="15" disabled>{{auth()->user()->document->description}}</textarea>
                    <hr>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
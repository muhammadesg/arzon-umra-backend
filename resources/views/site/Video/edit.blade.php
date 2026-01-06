@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1>Video ma'alumotini o'zgartirish </h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-info btn-sm" href="{{ route('videos.index') }}">Bosh sahifa</a>
    </div>
    <div class="col-12">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('videos.update', $video->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="video_link">Video havolasi</label>
                            <input type="text" value="{{ $video->video_link }}" id="video_link"
                                class="form-control @error('video_link') is-invalid @enderror" name="video_link"
                                placeholder="Video havolasini yangilash" />
                            <span class="text-danger">
                                @error('video_link')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning mr-1">O'zgartirish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

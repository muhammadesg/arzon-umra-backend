@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1>Video sharx qo'shish</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{ route('videos.index') }}">Bosh sahifa</a>
    </div>
    <div class="col-12">
        <div  class="card-body">
            <form class="form form-vertical" action="{{ route('videos.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="video_link">Video havola</label>
                            <input type="text" value="{{ old('video_link') }}" id="video_link"
                                class="form-control @error('video_link') is-invalid @enderror" name="video_link"
                                placeholder="Video linkini kiriting" />
                            <span class="text-danger">
                                @error('video_link')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" onclick="this.disabled = true; this.form.submit();" class="btn btn-success mr-1">Qo'shish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

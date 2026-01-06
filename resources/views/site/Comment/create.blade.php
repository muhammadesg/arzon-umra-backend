@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1 class="text-success">Yangi izoh qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-2">
        <a href="{{ route('comments.index') }}" class="btn btn-success btn-sm">Ortga</a>
    </div>

    <div class="col-12">
        <form class="row" action="{{ route('comments.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-1 col-12">
                <label class="form-label" for="name">Ismi</label>
                <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text"
                    id="name" name="name" placeholder="Ism kiriting" required>
                <p class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-1 col-12">
                <label>Rasmi</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" required>
                    <label class="custom-file-label" for="image">Tanlash</label>
                </div>
                <span class="text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="comment">Izohi</label>
                <input value="{{ old('comment') }}" class="form-control @error('comment') is-invalid @enderror"
                    type="text" id="comment" name="comment" placeholder="Izoh kiriting" required>
                <p class="text-danger">
                    @error('comment')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="col-12 mb-3">
                <button type="submit" onclick="this.disabled = true; this.form.submit();" class="btn btn-success btn-sm">Qo'shish</button>
            </div>


        </form>
    </div>
@endsection

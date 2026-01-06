@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1 class="text-success">Hamkor'ning ma'lumotlarini yangilash</h1>
    </div>

    <div class="col-12 text-right mb-2">
        <a href="{{ route('brands.index') }}" class="btn btn-success btn-sm">Ortga</a>
    </div>

    <div class="col-12">
        <form class="row" action="{{ route('brands.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-1 col-12">
                <label class="form-label" for="link">Link</label>
                <input value="{{ $brand->link }}" class="form-control @error('link') is-invalid @enderror" type="text"
                    id="link" name="link" placeholder="Havola kiriting">
                <p class="text-danger">
                    @error('link')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-1 col-12">
                <label>Rasmi</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label @error('image') is-invalid @enderror" for="image">Tanlash</label>
                </div>
                <span class="text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-warning btn-sm">Yangilash</button>
            </div>
        </form>
    </div>
@endsection

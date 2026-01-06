@extends('site.layouts.site')
@section('content')
<div class="col-12 text-center">
    <h1 class="text-success">Yangi hamkor qo'shish</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{ route('companies.index') }}" class="btn btn-success btn-sm">Ortga</a>
</div>

<div class="col-12">
    <form class="row" action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-12">
            <div class="form-group">
                <label for="type">Turi</label>
                <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                    <option value="" selected="false" disabled>Tanlang</option>
                    <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>Avia</option>
                    <option value="0" {{ old('type') == 0 ? 'selected' : '' }}>Tur</option>
                </select>
                <span class="text-danger">@error('type') {{ $message }} @enderror</span>
            </div>
        </div>
        <div class="mb-1 col-12">
            <label class="form-label" for="name">Nomi</label>
            <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text"
                id="name" name="name" placeholder="Nomini kiriting" required>
            <p class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>

        <div class="mb-1 col-12">
            <label for="logo">Logo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="logo" name="logo" required>
                <label class="custom-file-label" for="logo">Tanlash</label>
            </div>
            <span class="text-danger">
                @error('logo')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col-12 mb-3">
            <button type="submit" onclick="this.disabled = true; this.form.submit();"class="btn btn-success btn-sm">Qo'shish</button>
        </div>


    </form>
</div>
@endsection

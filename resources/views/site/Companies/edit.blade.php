@extends('site.layouts.site')
@section('content')
<div class="col-12 text-center">
    <h1 class="text-success">Hamkor'ning ma'lumotlarini yangilash</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{ route('companies.index') }}" class="btn btn-success btn-sm">Ortga</a>
</div>

<div class="col-12">
    <form class="row" action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12">
            <div class="form-group">
                <label for="type">Turi</label>
                <select name="type" class="form-control @error('type') is-invalid @enderror" id="type">
                    <option value="" selected="false" disabled>Tanlang</option>
                    <option value="1" {{ $company->type == 1 ? 'selected' : '' }}>Avia</option>
                    <option value="0" {{  $company->type == 0 ? 'selected' : '' }}>Tur</option>
                </select>
                <span class="text-danger">@error('type') {{ $message }} @enderror</span>
            </div>
        </div>
        <div class="mb-1 col-12">
            <label class="form-label" for="name">Nomi</label>
            <input value="{{ $company->name }}" class="form-control @error('name') is-invalid @enderror" type="text"
                id="name" name="name" placeholder="Havola kiriting">
            <p class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-1 col-12">
            <label>Logosi</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="logo" name="logo">
                <label class="custom-file-label @error('logo') is-invalid @enderror" for="logo">Tanlash</label>
            </div>
            <span class="text-danger">
                @error('logo')
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
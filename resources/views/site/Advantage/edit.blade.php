@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1>Avzallikni o'zgartirish</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-info btn-sm" href="{{ route('advantages.index') }}">Bosh sahifa</a>
    </div>
    <div class="col-12">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('advantages.update', $advantage->id) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-1 col-12">
                        <label>Rasm</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="icon_name" name="icon_name" >
                            <label class="custom-file-label" for="icon_name">Rasm yuklash uchun bosing</label>
                        </div>
                        <span class="text-danger">@error('icon_name') {{ $message }} @enderror</span>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name">Avzallik nomi</label>
                            <input type="text" value="{{ $advantage->name }}" id="name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Avzallik nomini yangilash" />
                            <span class="text-danger">
                                @error('name')
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

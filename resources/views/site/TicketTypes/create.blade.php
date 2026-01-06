@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1 class="text-success">Chipta turini qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-2">
        <a href="{{ route('ticket_types.index') }}" class="btn btn-success btn-sm">Ortga</a>
    </div>

    <div class="col-12">
        <form action="{{ route('ticket_types.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-1">
                <label class="form-label" for="name">Nomi</label>
                <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text"
                    id="name" name="name" placeholder="Chipta nomini kiriting" required>
                <p class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-3">
                <button type="submit" onclick="this.disabled = true; this.form.submit();" class="btn btn-success btn-sm">Create</button>
            </div>


        </form>
    </div>
@endsection

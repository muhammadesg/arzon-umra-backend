@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1 class="text-success">Yangi buyurtma qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-2">
        <a href="{{ route('orders.index') }}" class="btn btn-success btn-sm">Ortga</a>
    </div>

    <div class="col-12">
        <form class="row" action="{{ route('orders.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="mb-1 col-12">
                <label class="form-label" for="package_id">Paketni tanlang</label>
                <select name="package_id" id="package_id" class="form-control @error('package_id') is-invalid @enderror" required>
                    <option value="">-- Paketni tanlang --</option>
                    @foreach ($packages as $package)
                        <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>
                            {{ $package->name }}
                        </option>
                    @endforeach
                </select>
                <p class="text-danger">
                    @error('package_id')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="mb-1 col-12">
                <label class="form-label" for="name">Ism</label>
                <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text"
                    id="name" name="name" placeholder="Ism kiriting" required>
                <p class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="mb-1 col-12">
                <label class="form-label" for="phone">Telefon raqami</label>
                <input value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" type="text"
                    id="phone" name="phone" placeholder="+998 xx xxx xx xx" required>
                <p class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="mb-1 col-12">
                <label class="form-label" for="count">Miqdori</label>
                <input value="{{ old('count') }}" class="form-control @error('count') is-invalid @enderror" type="number"
                    id="count" name="count" placeholder="Miqdorini kiriting" required>
                <p class="text-danger">
                    @error('count')
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

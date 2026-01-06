@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1 class="text-success">{{ $order->name }}'ning buyurtmasini yangilash</h1>
    </div>

    <div class="col-12 text-right mb-2">
        <a href="{{ route('orders.index') }}" class="btn btn-success btn-sm">Ortga</a>
    </div>

    <div class="col-12">
        <form class="row" action="{{ route('orders.update', $order->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="col-12">
                <label class="form-label" for="name">Ism</label>
                <input value="{{ $order->name }}" class="form-control @error('name') is-invalid @enderror" type="text"
                    id="name" name="name" placeholder="Ismni kiriting">
                <p class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="col-12">
                <label class="form-label" for="phone">Telefon raqam</label>
                <input value="{{ $order->phone }}" class="form-control @error('phone') is-invalid @enderror" type="text"
                    id="phone" name="phone" placeholder="+998901234567 ko‘rinishida kiriting">
                <p class="text-danger">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="col-12">
                <label class="form-label" for="package_id">Paket tanlang</label>
                <select class="form-control @error('package_id') is-invalid @enderror" id="package_id" name="package_id">
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}" {{ $order->package_id == $package->id ? 'selected' : '' }}>
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

            <div class="col-12">
                <label class="form-label" for="count">Soni</label>
                <input value="{{ $order->count }}" class="form-control @error('count') is-invalid @enderror" type="number"
                    id="count" name="count" placeholder="Buyurtma soni" min="1">
                <p class="text-danger">
                    @error('count')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            {{-- <div class="col-12">
                <label class="form-label" for="status">Holati</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Kutilmoqda</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Yakunlandi</option>
                    <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Bekor qilindi</option>
                </select>
                <p class="text-danger">
                    @error('status')
                        {{ $message }}
                    @enderror
                </p>
            </div> --}}

            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-warning btn-sm">Yangilash</button>
            </div>
        </form>
    </div>
@endsection

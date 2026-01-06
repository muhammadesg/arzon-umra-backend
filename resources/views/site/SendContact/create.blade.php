@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1>Yangi kontakt qo'shish</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{ route('send_contact.index') }}">Bosh sahifa</a>
    </div>
    <div class="col-12">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('send_contact.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="fullname">To'liq ism</label>
                            <input type="text" value="{{ old('fullname') }}" id="fullname"
                                class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                placeholder="To'liq ism va familiyangizni kiriting" required />
                            <span class="text-danger">
                                @error('fullname')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="phone">Telefon raqam</label>
                            <input type="text" value="{{ old('phone') }}" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                placeholder="Telefon raqamingizni kiriting" required />
                            <span class="text-danger">
                                @error('phone')
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

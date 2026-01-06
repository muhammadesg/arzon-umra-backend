@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1>contact ma'alumotini o'zgartirish </h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-info btn-sm" href="{{ route('send_contact.index') }}">Bosh sahifa</a>
    </div>
    <div class="col-12">
        <div class="card-body">
            <form class="form form-vertical" action="{{ route('send_contact.update', $contact->id) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="fullname">To'liq ismi</label>
                            <input type="text" value="{{ $contact->fullname }}" id="fullname"
                                class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                placeholder="To'liq ismini yangilash" />
                            <span class="text-danger">
                                @error('fullname')  
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="phone">Telefon raqami</label>
                            <input type="text" value="{{ $contact->phone }}" id="phone"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                placeholder="Telefon raqamini yangilash" />
                            <span class="text-danger">
                                @error('phone')
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

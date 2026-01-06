@extends('site.layouts.site')
@section('content')

<div class="col-12 text-center">
    <h1 class="text-success">{{ $ticket_types->name }}'ni yangilash</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{route('ticket_types.index')}}" class="btn btn-success btn-sm">Bosh sahifa</a>
</div>

<div class="col-12">
    <form action="{{route('ticket_types.update', $ticket_types->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-1">
            <label class="form-label" for="name">Nomi</label>
            <input value="{{$ticket_types->name}}" class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Enter Name" required>
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-warning btn-sm">Yangilash</button>
        </div>


    </form>
</div>


@endsection

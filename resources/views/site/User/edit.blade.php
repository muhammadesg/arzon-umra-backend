@extends('site.layouts.site')
@section('content')

<div class="col-12 text-center">
    <h1 class="text-success">{{ $user->name }}'ni yangilash</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{route('users.index')}}" class="btn btn-success btn-sm">Back</a>
</div>

<div class="col-12">
    <form action="{{route('users.update', $user->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-1">
            <label class="form-label" for="name">Ismi</label>
            <input value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Enter Name" required>
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="email">Email</label>
            <input value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" placeholder="Enter email" required>
            <p class="text-danger">@error('email') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="password">Parol</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Enter password">
            <p class="text-danger">@error('password') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="password_confirmation">Parolni takrorlang</label>
            <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
            <p class="text-danger">@error('password_confirmation') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="roles">Rolini o'zgartirish</label>
            <select class="form-control @error('roles') is-invalid @enderror" name="roles" id="roles" required>
                <option selected="false" disabled >Tanlash</option>
                @foreach ($roles as $role)
                <option @if (!empty($user->roles) && count($user->roles) > 0 && $role->name == $user->roles[0]['name']) selected @endif value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
            <p class="text-danger">@error('roles') {{$message}} @enderror</p>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-warning btn-sm">Yangilash</button>
        </div>


    </form>
</div>


@endsection

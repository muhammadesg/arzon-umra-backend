@extends('site.layouts.site')
@section('content')

<div class="col-12 text-center">
    <h1 class="text-success">User qo'shish</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{route('users.index')}}" class="btn btn-success btn-sm">Ortga</a>
</div>

<div class="col-12">
    <form action="{{route('users.store')}}" method="post">
        @csrf
        @method('POST')
        <div class="mb-1">
            <label class="form-label" for="name">Ismi</label>
            <input value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Enter Name" required>
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>
        <div class="mb-1">
            <label class="form-label" for="email">Email</label>
            <input value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" placeholder="Enter email" required>
            <p class="text-danger">@error('email') {{$message}} @enderror</p>
        </div>
        <div class="mb-1">
            <label class="form-label" for="password">Parol</label>
            <input value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Enter password" required>
            <p class="text-danger">@error('password') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="password_confirmation">Parolni takrorlang</label>
            <input value="{{old('password_confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" placeholder="confirm password" required>
            <p class="text-danger">@error('password_confirmation') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="roles">Rol tanlash</label>
            <select class="form-control @error('roles') is-invalid @enderror" name="roles" id="roles">
                <option selected="false" disabled>Tanlash</option>
                @foreach ($roles as $role)
                <option @if ($role->name == 'client') selected @endif value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
            <p class="text-danger">@error('roles') {{$message}} @enderror</p>
        </div>

        <div class="mb-3">
            <button type="submit" onclick="this.disabled = true; this.form.submit();" class="btn btn-success btn-sm">Create</button>
        </div>


    </form>
</div>


@endsection

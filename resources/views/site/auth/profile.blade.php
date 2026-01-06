@extends('site.layouts.site')

@section('content')

@if(session('status'))

{{session('status')}}

@endif

{{-- @dd(auth()->user()->image) --}}

<div class="media mb-2">
    <img src="{{ asset('/storage/' . auth()->user()->image) }}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90">
    <div class="media-body mt-50">
        <h4>{{ auth()->user()->name }}</h4>
        <form action="{{ route('updateImage') }}" method="post" enctype="multipart/form-data" id="update-image-form">
            @csrf
            @method('patch')
            <div class="col-12 d-flex mt-1 px-0">
                <label class="btn btn-primary mr-75 mb-0 waves-effect waves-float waves-light" for="change-picture">
                    <span class="d-none d-sm-block">O'zgartirish</span>
                    <input class="form-control" type="file" id="change-picture" name="image" hidden="" accept="image/png, image/jpeg, image/jpg">
                </label>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('change-picture').addEventListener('change', function() {
        document.getElementById('update-image-form').submit();
    });

</script>


<form action="{{ route('profile.update') }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username">Ism</label>
                <input type="text" class="form-control" placeholder="Username" value="{{auth()->user()->name}}" name="name" id="username" aria-invalid="false">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" placeholder="Email" value="{{auth()->user()->email}}" name="email" id="email">
            </div>
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column">
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-float waves-light">O'zgartirish</button>
        </div>
    </div>
</form>

<form class="mt-4" action="{{ route('password.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="current_password">Joriy parol</label>
                <input type="password" required class="form-control" placeholder="Oldingi parolni kiriting" name="current_password" id="current_password" aria-invalid="false">
                <p class="text-danger">@error('current_password') {{$message}} @enderror</p>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="password">Yangi parol</label>
                <input type="password" required class="form-control" placeholder="Yangi parolni kiriting" name="password" id="password">
                <p class="text-danger">@error('password') {{$message}} @enderror</p>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="password_confirmation">Yangi parol takrorlang</label>
                <input type="password" required class="form-control" placeholder="Yangi parolni qayta kiriting" name="password_confirmation" id="password_confirmation">
                <p class="text-danger">@error('password_confirmation') {{$message}} @enderror</p>
            </div>
        </div>

        <div class="col-12 d-flex flex-sm-row flex-column">
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-float waves-light"> Parolni yangilash</button>
        </div>
    </div>
</form>

@endsection

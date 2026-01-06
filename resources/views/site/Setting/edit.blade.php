@extends('site.layouts.site')
@section('content')

<div class="col-12 text-center">
    <h1 class="text-success">Sozlamalar</h1>
</div>


<div class="col-12">
    <form action="{{route('settings.update', $setting->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-1">
            <label class="form-label" for="title">Sarlavha</label>
            <input value="{{$setting->title}}" class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" placeholder="Sarlavha kiriting" required>
            <p class="text-danger">@error('title') {{$message}} @enderror</p>
        </div>
        <div class="mb-1">
            <div class="form-group">
                <label>Saytning rasmini yuklang</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="logo">
                    <label class="custom-file-label" for="customFile">Rasm tanlash</label>
                </div>
                <p class="text-danger">@error('logo') {{$message}} @enderror</p>
            </div>
        </div>

        <div class="mb-1">
            <label class="form-label" for="brand_name">Kompaniya nomi</label>
            <input value="{{$setting->brand_name}}" class="form-control @error('brand_name') is-invalid @enderror" type="text" id="brand_name" name="brand_name" placeholder="Enter brand Name" required>
            <p class="text-danger">@error('brand_name') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="description">Kompaniya ma'lumoti</label>
            <input value="{{$setting->description}}" class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" placeholder="Enter description" required>
            <p class="text-danger">@error('description') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="author">Kompaniya egasining ismi</label>
            <input value="{{$setting->author}}" class="form-control @error('author') is-invalid @enderror" type="text" id="author" name="author" placeholder="Enter author" required>
            <p class="text-danger">@error('author') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="keywords">Kalit so'zlari</label>
            <input value="{{$setting->keywords}}" class="form-control @error('keywords') is-invalid @enderror" type="text" id="keywords" name="keywords" placeholder="Enter keywords" required>
            <p class="text-danger">@error('keywords') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="address">Manzil</label>
            <input value="{{$setting->address}}" class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" placeholder="Manzil kiriting" required>
            <p class="text-danger">@error('address') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="email">Email</label>
            <input value="{{$setting->email}}" class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="Manzil kiriting" required>
            <p class="text-danger">@error('email') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="phone">Telefon raqam</label>
            <input value="{{$setting->phone}}" class="form-control @error('phone') is-invalid @enderror" type="tel" id="phone" name="phone" placeholder="Telefon raqam kiriting" required>
            <p class="text-danger">@error('phone') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="facebook_link">Facebook havola</label>
            <input value="{{$setting->facebook_link}}" class="form-control @error('facebook_link') is-invalid @enderror" type="text" id="facebook_link" name="facebook_link" placeholder="Facebook havolasini kiritng" required>
            <p class="text-danger">@error('facebook_link') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="instagram_link">Instagram havola</label>
            <input value="{{$setting->instagram_link}}" class="form-control @error('instagram_link') is-invalid @enderror" type="text" id="instagram_link" name="instagram_link" placeholder="Instagram havolasini kiritng" required>
            <p class="text-danger">@error('instagram_link') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="youtube_link">You tube havola</label>
            <input value="{{$setting->youtube_link}}" class="form-control @error('youtube_link') is-invalid @enderror" type="text" id="youtube_link" name="youtube_link" placeholder="You tube havolasini kiritng" required>
            <p class="text-danger">@error('youtube_link') {{$message}} @enderror</p>
        </div>

        <div class="mb-1">
            <label class="form-label" for="telegram_link">Telegram havola</label>
            <input value="{{$setting->telegram_link}}" class="form-control @error('telegram_link') is-invalid @enderror" type="text" id="telegram_link" name="telegram_link" placeholder="Telegram havolasini kiritng" required>
            <p class="text-danger">@error('telegram_link') {{$message}} @enderror</p>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-warning btn-sm">Yangilash</button>
        </div>
    </form>
</div>


@endsection

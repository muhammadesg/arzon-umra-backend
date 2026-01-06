@extends('site.layouts.site')
@section('content')
    <div class="col-12 text-center">
        <h1 class="text-success">"Biz haqimizda" ma'lumot qo'shish</h1>
    </div>

    <div class="col-12 text-right mb-2">
        <a href="{{ route('abouts.index') }}" class="btn btn-success btn-sm">Ortga</a>
    </div>

    <div class="col-12">
        <form class="row" action="{{ route('abouts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-1 col-12">
                <label for="image">Rasm yuklang</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" required>
                    <label class="custom-file-label" for="image">Tanlash</label>
                </div>
                <span class="text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="name">Nom:</label>
                <input value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" type="text"
                    id="name" name="name" placeholder="Nom kiriting" required>
                <p class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="info">Ma'lumot:</label>
                <input value="{{ old('info') }}" class="form-control @error('info') is-invalid @enderror" type="text"
                    id="info" name="info" placeholder="Ma'lumot kiriting" required>
                <p class="text-danger">
                    @error('info')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="goal_info">Maqsad haqida:</label>
                <input value="{{ old('goal_info') }}" class="form-control @error('goal_info') is-invalid @enderror" type="text"
                    id="goal_info" name="goal_info" placeholder="Maqsad haqida ma'lumot yozing" required>
                <p class="text-danger">
                    @error('goal_info')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="story_info">Tarixmiz haqida:</label>
                <input value="{{ old('story_info') }}" class="form-control @error('story_info') is-invalid @enderror" type="text"
                    id="story_info" name="story_info" placeholder="Tarix haqida ma'lumot yozing" required>
                <p class="text-danger">
                    @error('story_info')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="advantages_info">Avzallik haqida:</label>
                <input value="{{ old('advantages_info') }}" class="form-control @error('advantages_info') is-invalid @enderror" type="text"
                    id="advantages_info" name="advantages_info" placeholder="Avzallik haqida ma'lumot yozing" required>
                <p class="text-danger">
                    @error('advantages_info')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div class="mb-1 col-12">
                <label class="form-label" for="brand">Hamkorlar soni:</label>
                <input value="{{ old('brand') }}" class="form-control @error('brand') is-invalid @enderror" type="number"
                    id="brand" name="brand" placeholder="Hamkorlarni sonini kiriting" required>
                <p class="text-danger">
                    @error('brand')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="mb-1 col-12">
                <label class="form-label" for="hotel">Mexmonxonalar soni:</label>
                <input value="{{ old('hotel') }}" class="form-control @error('hotel') is-invalid @enderror" type="number"
                    id="hotel" name="hotel" placeholder="Mexmonxona sonini kiriting" required>
                <p class="text-danger">
                    @error('hotel')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="mb-1 col-12">
                <label class="form-label" for="customer">Baxtli ziyoratchilar soni:</label>
                <input value="{{ old('customer') }}" class="form-control @error('customer') is-invalid @enderror" type="number"
                    id="customer" name="customer" placeholder="Ziyoratchilarni sonini kiriting" required>
                <p class="text-danger">
                    @error('customer')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="mb-1 col-12">
                <label class="form-label" for="follower">Obunachilar soni:</label>
                <input value="{{ old('follower') }}" class="form-control @error('follower') is-invalid @enderror" type="number"
                    id="follower" name="follower" placeholder="Obunachilarni sonini kiriting" required>
                <p class="text-danger">
                    @error('follower')
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

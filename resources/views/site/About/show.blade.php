@extends('site.layouts.site')
@section('content')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>To'liq ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{ route('abouts.index') }}">Bosh sahifa</a>
    </div>

    <div class="col-12">
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{$about->id}}</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>{{$about->name}}</td>
            </tr>
            <tr>
                <th>Ma'lumot</th>
                <td>{{$about->info}}</td>
            </tr>
            <tr>
                <th>Maqsad haqida</th>
                <td>{{$about->goal_info}}</td>
            </tr>
            <tr>
                <th>Avzallik haqida</th>
                <td>{{$about->advantages_info}}</td>
            </tr>
            <tr>
                <th>Tarix haqida</th>
                <td>{{$about->story_info}}</td>
            </tr>
            <tr>
                <th>Hamkorlar</th>
                <td>{{$about->brand}}</td>
            </tr>
            <tr>
                <th>Mexmonxonalar</th>
                <td>{{$about->hotel}}</td>
            </tr>
            <tr>
                <th>Ziyoratchilar</th>
                <td>{{$about->customer}}</td>
            </tr>
            <tr>
                <th>Obunachilar</th>
                <td>{{$about->follower}}</td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($about->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($about->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
    <div class="col-6 text-center">
        @if($about->image == null)
        <img height="400" class="card-img-top mx-auto" src="{{asset('public/images/m.png')}}" alt="Tanlanmagan">
        @else
        <img height="400" class="card-img-top mx-auto" src="{{asset('/storage/' .$about->image)}}" alt="Tanlanmagan">
        @endif
    </div>


</div>
@endsection

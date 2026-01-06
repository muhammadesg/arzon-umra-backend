@extends('site.layouts.site')
@section('content')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>Hamkor haqida batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{ route('brands.index') }}">Bosh sahifa</a>
    </div>
    <div class="col-6">
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{$brand->id}}</td>
            </tr>
            <tr>
                <th>Link</th>
                <td>{{$brand->link}}</td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($brand->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($brand->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
    <div class="col-6 text-center">
        @if($brand->image == null)
        <img class="img-fluid" src="{{asset('public/images/m.png')}}" alt="Tanlanmagan">
        @else
        <img class="img-fluid" src="{{asset('/storage/' .$brand->image)}}" alt="Tanlanmagan">
        @endif
    </div>


</div>
@endsection

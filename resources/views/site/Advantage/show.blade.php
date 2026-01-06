@extends('site.layouts.site')
@section('content')
@include('site.layouts.message')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>Avzallik haqida batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{route('advantages.index')}}">Bosh sahifa</a>
    </div>
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{$advantage->id}}</td>
            </tr>
            <tr>
                <th>Ikonka nomi</th>
                <td>{{$advantage->icon_name}}</td>
            </tr>
            <tr>
                <th>Avzallik nomi</th>
                <td>{{$advantage->name}}</td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($advantage->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($advantage->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
</div>
@endsection

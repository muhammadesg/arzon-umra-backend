@extends('site.layouts.site')
@section('content')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>{{$role->name}} haqida batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{route('roles.index')}}">Bosh sahifa</a>
    </div>
    <div class="col-12">
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{$role->id}}</td>
            </tr>
            <tr>
                <th>Nomi</th>
                <td>{{$role->name}}</td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($role->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection

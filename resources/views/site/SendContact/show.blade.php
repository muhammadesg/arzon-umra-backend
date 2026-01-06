@extends('site.layouts.site')
@section('content')
@include('site.layouts.message')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>Batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{route('send_contact.index')}}">Bosh sahifa</a>
    </div>
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{$contact->id}}</td>
            </tr>
            <tr>
                <th>To'liq ismi</th>
                <td>{{$contact->fullname ?? "Mavjud emas"}}</td>
            </tr>
            <tr>
                <th>Telefon raqami</th>
                <td>{{$contact->phone}}</td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($contact->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
</div>
@endsection

@extends('site.layouts.site')
@section('content')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>{{$company->name}} haqida batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{ route('companies.index') }}">Bosh sahifa</a>
    </div>
    <div class="col-6">
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{$company->id}}</td>
            </tr>
            <tr>
                <th>Nomi</th>
                <td>{{$company->name}}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>@if($company->type == 1) Avia @else Tur @endif</td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($company->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($company->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
    <div class="col-6 text-center">
        @if($company->logo == null)
        <img class="img-fluid" src="{{asset('public/images/m.png')}}" alt="Tanlanmagan">
        @else
        <img class="img-fluid" src="{{asset('/storage/' .$company->logo)}}" alt="Tanlanmagan">
        @endif
    </div>
</div>
@endsection

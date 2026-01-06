@extends('site.layouts.site')
@section('content')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>{{$user->name}} haqida batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="javascript:history.back()">Bosh sahifa</a>
    </div>
    <div class="col-6">
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{$user->id}}</td>
            </tr>
            <tr>
                <th>Ismi</th>
                <td>{{$user->name}}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    @foreach ($user->roles as $role)
                    {{$role->name}}
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>Qo'shilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($user->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
    <div class="col-6">
        @if($user->image == null)
        <img height="400" class="card-img-top" src="{{asset('public/images/m.png')}}" alt="Tanlanmagan">
        @else
        <img height="400" class="card-img-top" src="{{asset('/storage/' .$user->image)}}" alt="Tanlanmagan">
        @endif
    </div>


</div>
@endsection

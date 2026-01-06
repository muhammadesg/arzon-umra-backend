@extends('site.layouts.site')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('front/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection


@section('content')
@include('site.layouts.message')

<div class="col-12 text-center">
    <h1 class="text-success">Userlar ro'yxati</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{route('users.create')}}" class="btn btn-success btn-sm">Qo'shish</a>
</div>

<div class="col-12">
    <table id="myTable" class="table table-bordered text-center display">
        <thead>
            <tr>
                <th>№</th>
                <th>Ism</th>
                <th>Email</th>
                <th>Role</th>
                <th>Ko'rish</th>
                <th>O'zgartirish</th>
                <th>O'chirish</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name ?? ''}}</td>
                <td>{{$user->email ?? ''}}</td>
                <td>
                    @foreach ($user->roles as $role)
                    {{ $role->name }}
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('users.show',$user->id)}}">Batafsil</a>
                </td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{route('users.edit',$user->id)}}">O'zgartirish</a>
                </td>
                <td>
                    @if (auth()->user() && auth()->user()->id != $user->id)
                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                    @else
                    <button disabled class="btn btn-danger btn-sm">O'chirish</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection




@section('js')
<script src="{{asset('front/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('front/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

</script>
@endsection

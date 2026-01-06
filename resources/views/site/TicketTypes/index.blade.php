@extends('site.layouts.site')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('front/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')

<div class="col-12 text-center">
    <h1 class="text-success">Chipta turlari ro'yxati</h1>
</div>
@include('site.layouts.message')

<div class="col-12 text-right mb-2">
    <a href="{{route('ticket_types.create')}}" class="btn btn-success btn-sm">Qo'shish</a>
</div>

<div class="col-12">
    <table id="myTable" class="table table-bordered text-center display">
        <thead>
            <tr>
                <th>№</th>
                <th>Nomi</th>
                <th>Ko'rish</th>
                <th>O'zgartirish</th>
                <th>O'chirish</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ticket_types as $ticket_type)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$ticket_type->name ?? ''}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('ticket_types.show',$ticket_type->id)}}">Batafsil</a>
                </td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{route('ticket_types.edit',$ticket_type->id)}}">O'zgartirish</a>
                </td>
                <td>
                    <form action="{{route('ticket_types.destroy', $ticket_type->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
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

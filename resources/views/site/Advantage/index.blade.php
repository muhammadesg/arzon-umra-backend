@extends('site.layouts.site')
@section('content')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('front/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@include('site.layouts.message')

<div class="col-12 text-center">
    <h1>Avzalliklar</h1>
</div>
<div class="col-12 text-right mb-2">
    <a class="btn btn-success btn-sm" href="{{route('advantages.create')}}">Qo'shish</a>
</div>
<div class="col-12">
    <table id="myTable" class="table table-bordered text-center display">
        <thead>
            <tr>
                <th>№</th>
                <th>Rasm</th>
                <th>Nomi</th>
                <th>Ko'rish</th>
                <th>O'zgartirish</th>
                <th>O'chirish</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($advantages as $advantage)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>
                    <img width="50" height="40" src="{{ asset('/storage/' . $advantage->icon_name) }}" alt="img error">
                </th>
                <th>{{$advantage->name ?? "Mavjud emas"}}</th>
                </th>
                <th>
                    <a class="btn btn-info btn-sm" href="{{route('advantages.show', $advantage->id)}}">Ko'rish</a>
                </th>
                <th>
                    <a class="btn btn-warning btn-sm" href="{{route('advantages.edit', $advantage->id)}}">O'zgartirish</a>
                </th>
                <th>
                    <form action="{{route('advantages.destroy',$advantage->id )}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Tasdiqlash!')" type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </th>
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

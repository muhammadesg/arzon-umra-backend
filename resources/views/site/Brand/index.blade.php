@extends('site.layouts.site')


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('front/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('site.layouts.message')

<div class="col-12 text-center">
    <h1 class="text-success">Hamkorlar ro'yxati</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{route('brands.create')}}" class="btn btn-success btn-sm">Qo'shish</a>
</div>

<div class="col-12">
    <table id="myTable" class="table table-bordered text-center display">
        <thead>
            <tr>
                <th>№</th>
                <th>Havola</th>
                <th>Rasm</th>
                <th>Ko'rish</th>
                <th>O'zgartirish</th>
                <th>O'chirish</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$brand->link ?? "Mavjud emas"}}</th>
                <td>
                    <img width="80" height="50" src="{{ $brand->image ? asset('/storage/' . $brand->image) : asset('images/m.png') }}" alt="img error">
                </td>
                </th>
                <th>
                    <a class="btn btn-info btn-sm" href="{{route('brands.show', $brand->id)}}">Ko'rish</a>
                </th>
                <th>
                    <a class="btn btn-warning btn-sm" href="{{route('brands.edit', $brand->id)}}">O'zgartirish</a>
                </th>
                <th>
                    <form action="{{route('brands.destroy',$brand->id )}}" method="post">
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

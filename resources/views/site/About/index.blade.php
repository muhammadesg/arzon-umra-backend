@extends('site.layouts.site')


@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('front/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')
@include('site.layouts.message')

<div class="col-12 text-center">
    <h1 class="text-success">Ma'lumotlar ro'yxati</h1>
</div>

<div class="col-12 text-right mb-2">
    <a href="{{route('abouts.create')}}" class="btn btn-success btn-sm">Qo'shish</a>
</div>

<div class="col-12">
    <table id="myTable" class="table table-bordered text-center display">
        <thead>
            <tr>
                <th>№</th>
                <th>Nom</th>
                <th>Rasm</th>
                <th class="text-center">Ma'lumot</th>
                <th>Ko'rish</th>
                <th>O'zgartirish</th>
                <th>O'chirish</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($abouts as $about)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$about->name ?? "Mavjud emas"}}</th>
                <td>
                    <img width="40" height="40" src="{{ $about->image ? asset('/storage/' . $about->image) : asset('images/m.png') }}" alt="img error">
                </td>
                <th>{{Str::limit($about->info, 100) ?? "Mavjud emas"}}</th>
                </th>
                <th>
                    <a class="btn btn-info btn-sm" href="{{route('abouts.show', $about->id)}}">Ko'rish</a>
                </th>
                <th>
                    <a class="btn btn-warning btn-sm" href="{{route('abouts.edit', $about->id)}}">O'zgartirish</a>
                </th>
                <th>
                    <form action="{{route('abouts.destroy',$about->id )}}" method="post">
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


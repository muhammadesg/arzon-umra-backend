@extends('site.layouts.site')
@section('content')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>{{ $order->name }} buyurtmasi haqida batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{ route('orders.index') }}">Orqaga qaytish</a>
    </div>
    <div class="col-12">
        <table class="table table-bordered text-center">
            <tr>
                <th>ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Ism</th>
                <td>{{ $order->name }}</td>
            </tr>
            <tr>
                <th>Telefon raqami</th>
                <td>{{ $order->phone }}</td>
            </tr>
            <tr>
                <th>Paket</th>
                <td>{{ $order->package->name ?? 'Paket topilmadi' }}</td>
            </tr>
            <tr>
                <th>Soni</th>
                <td>{{ $order->count }}</td>
            </tr>
            <tr>
                <th>Yaratilgan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Yangilangan vaqti</th>
                <td>{{ \Carbon\Carbon::parse($order->updated_at)->format('d.m.Y H:i:s') }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection

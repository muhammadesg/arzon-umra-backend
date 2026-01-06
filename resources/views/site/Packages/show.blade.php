@extends('site.layouts.site')
@section('content')
@include('site.layouts.message')
<div class="row align-items-center">
    <div class="col-12 text-center">
        <h1>To'plam haqida batafsil ma'lumot</h1>
    </div>
    <div class="col-12 text-right mb-2">
        <a class="btn btn-warning btn-sm" href="{{route('packages.index')}}">Bosh sahifa</a>
    </div>

    <div class="col-md-12">
        <h2>{{ $package->name }} paketi haqida ma'lumot</h2>
        <hr>

        <div class="row">
            <!-- Paket nomi -->
            <div class="col-md-6">
                <p><strong>Paket nomi:</strong> {{ $package->name }}</p>
            </div>

            <!-- Narxi -->
            <div class="col-md-6">
                <p><strong>Narxi: </strong> ${{ number_format($package->price) }}</p>
            </div>

            <!-- Davomiyligi -->
            <div class="col-md-6">
                <p><strong>Davomiyligi:</strong> {{ $package->total_duration }} kun</p>
            </div>

            <!-- Borish va Qaytish sanasi -->
            <div class="col-md-6">
                <p><strong>Borish sanasi:</strong> {{ $package->departure_time }}</p>
                <p><strong>Qaytish sanasi:</strong> {{ $package->arrival_time }}</p>
            </div>

            <!-- Shaharlar va viza -->
            <div class="col-md-6">
                <p><strong>Viza turi:</strong> {{ $package->visa_type }}</p>
                <p><strong>Ketish shahri:</strong> {{ $package->origin_city }}</p>
                <p><strong>To'xtash shaharlar:</strong> {{ $package->stopover_cities }}</p>
                <p><strong>Yetib borish shahri:</strong> {{ $package->destination_city }}</p>
            </div>

            <!-- Mehmonxona -->
            <div class="col-md-12">
                <p><strong>Mehmonxona nomi:</strong> {{ $package->hotel_name }}</p>
                <p><strong>Mehmonxona masofasi:</strong> {{ $package->hotel_distance }} km</p>
                <p><strong>Yulduz soni:</strong> {{ $package->hotel_star_count }}</p>
                <p><strong>Mehmonxona haqida:</strong> {{ $package->hotel_info }}</p>
                <p><strong>Mehmonxona rasmlari:</strong></p>
                <div class="row">
                    <div class="col-4">
                        <img style="height: 200px;" src="{{ asset('/storage/' . $package->hotel_image1) }}" alt="Hotel Image 1" class="img-fluid mb-2">
                    </div>
                    <div class="col-4">
                        <img style="height: 200px;" src="{{ asset('/storage/' . $package->hotel_image2) }}" alt="Hotel Image 2" class="img-fluid mb-2">
                    </div>
                    <div class="col-4">
                        <img style="height: 200px;" src="{{ asset('/storage/' . $package->hotel_image3) }}" alt="Hotel Image 3" class="img-fluid mb-2">
                    </div>
                </div>
            </div>

            <!-- Xizmatlar -->
            <div class="col-md-6">
                <p><strong>Taomlanish:</strong> {{ $package->food }}</p>
                <p><strong>Tibbiyot xizmati:</strong> {{ $package->ambulance }}</p>
                <p><strong>Transport xizmati:</strong> {{ $package->taxi_service }}</p>
                <p><strong>Sovg'alar:</strong> {{ $package->gift }}</p>
            </div>

            <!-- Paket haqida -->
            <div class="col-md-12">
                <p><strong>Paket haqida batafsil ma'lumot:</strong></p>
                <p>{{ $package->package_info }}</p>
            </div>

            <!-- Avzalliklari -->
            <div class="col-md-12">
                <p><strong>Avzalliklari:</strong></p>
                <ul>
                    @foreach ($advantages as $advantage)
                    <li>
                        {{ $advantage ?? "Mavjud emas"}}
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Rasm -->
            <div class="col-md-12">
                <p><strong>Paket rasmi:</strong></p>
                <img style="height: 200px;" src="{{ asset('/storage/' . $package->photo) }}" alt="photo" class="img-fluid mb-2">
            </div>

            <!-- Kompaniya va Avia -->
            <div class="col-md-6">
                <p><strong>Kompaniya nomi:</strong> {{ $package->company->name ?? "Mavjud emas" }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Avia nomi:</strong> {{ $package->avia->name ?? "Mavjud emas" }}</p>
            </div>

            <!-- Chiptalar soni -->
            <div class="col-md-6">
                <p><strong>Bilet soni:</strong> {{ $package->count }}</p>
            </div>
        </div>
    </div>

</div>
@endsection

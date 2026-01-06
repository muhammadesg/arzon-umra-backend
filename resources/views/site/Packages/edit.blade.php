@extends('site.layouts.site')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('front/app-assets/vendors/css/forms/select/select2.min.css')}}">
<style>
    .select2-container {
        width: 100% !important;
    }
</style>
@endsection
@section('content')
<div class="col-12 text-center">
    <h1>To'plam ma'lumotini o'zgartirish</h1>
</div>
<div class="col-12 text-right mb-2">
    <a class="btn btn-info btn-sm" href="{{ route('packages.index') }}">Bosh sahifa</a>
</div>
<div class="col-12">
    <div class="card-body">
        <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Paket nomi -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Nomi</label>
                        <input type="text" value="{{ old('name',$package->name) }}" id="name"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="To'plam nomini kiriting" />
                        <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                    </div>
                </div>
                <!-- Photo -->
                <div class="mb-1 col-6">
                    <label>Rasm</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo">Tanlang</label>
                    </div>
                    <span class="text-danger">@error('photo') {{ $message }} @enderror</span>
                </div>


                <!-- Kompaniya -->
                <div class="col-4">
                    <div class="form-group">
                        <label for="company_id">Tour Kompaniya</label>
                        <select name="company_id" id="company_id"
                            class="form-control @error('company_id') is-invalid @enderror">
                            <option value="">Tanlang</option>
                            @foreach ($tour_companies as $company)
                            <option value="{{ $company->id }}" {{ $package->company_id == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('company_id') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Avia -->
                <div class="col-4">
                    <div class="form-group">
                        <label for="avia_id">Avia</label>
                        <select name="avia_id" id="avia_id" class="form-control @error('avia_id') is-invalid @enderror">
                            <option value="">Tanlang</option>
                            @foreach ($avia_companies as $avia)
                            <option value="{{ $avia->id }}" {{ $package->avia_id == $avia->id ? 'selected' : '' }}>
                                {{ $avia->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('avia_id') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Ticket Type -->
                <div class="col-4">
                    <div class="form-group">
                        <label for="ticket_type_id">Chipta Turi</label>
                        <select name="ticket_type_id" id="ticket_type_id"
                            class="form-control @error('ticket_type_id') is-invalid @enderror">
                            <option value="">Tanlang</option>
                            @foreach ($ticket_types as $ticket)
                            <option value="{{ $ticket->id }}" {{ $package->ticket_type_id == $ticket->id ? 'selected' : '' }}>
                                {{ $ticket->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('ticket_type_id') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Narxi -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="price">Narxi</label>
                        <input type="number" value="{{ old('price',$package->price) }}" id="price"
                            class="form-control @error('price') is-invalid @enderror" name="price"
                            placeholder="Narxini kiriting" />
                        <span class="text-danger">@error('price') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Davomiyligi -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="total_duration">Davomiyligi</label>
                        <input type="number" value="{{ old('total_duration', $package->total_duration) }}" id="total_duration"
                            class="form-control @error('total_duration') is-invalid @enderror" name="total_duration"
                            placeholder="Davomiyligini kiriting (kunlarda)" />
                        <span class="text-danger">@error('total_duration') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Borish va Qaytish sanasi -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="departure_time">Borish sanasi</label>
                        <input type="date" value="{{ old('departure_time', $package->departure_time) }}" id="departure_time"
                            class="form-control @error('departure_time') is-invalid @enderror" name="departure_time" />
                        <span class="text-danger">@error('departure_time') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="arrival_time">Qaytish sanasi</label>
                        <input type="date" value="{{ old('arrival_time', $package->arrival_time) }}" id="arrival_time"
                            class="form-control @error('arrival_time') is-invalid @enderror" name="arrival_time" />
                        <span class="text-danger">@error('arrival_time') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Vizalar va Shaharlar -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="visa_type">Viza turi</label>
                        <input type="text" value="{{ old('visa_type', $package->visa_type) }}" id="visa_type"
                            class="form-control @error('visa_type') is-invalid @enderror" name="visa_type"
                            placeholder="Viza turini kiriting" />
                        <span class="text-danger">@error('visa_type') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="origin_city">Ketish shahri</label>
                        <input type="text" value="{{ old('origin_city', $package->origin_city) }}" id="origin_city"
                            class="form-control @error('origin_city') is-invalid @enderror" name="origin_city"
                            placeholder="Ketish shahrini kiriting" />
                        <span class="text-danger">@error('origin_city') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="destination_city">Yetib borish shahri</label>
                        <input type="text" value="{{ old('destination_city', $package->destination_city) }}" id="destination_city"
                            class="form-control @error('destination_city') is-invalid @enderror" name="destination_city"
                            placeholder="Yetib borish shahrini kiriting" />
                        <span class="text-danger">@error('destination_city') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="stopover_cities">To'xtash shaharlar</label>
                        <input type="text" value="{{ old('stopover_cities', $package->stopover_cities) }}" id="stopover_cities"
                            class="form-control @error('stopover_cities') is-invalid @enderror" name="stopover_cities"
                            placeholder="To'xtash shaharlarni kiriting" />
                        <span class="text-danger">@error('stopover_cities') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="food">Taomlanish</label>
                        <input type="text" value="{{ old('food', $package->food) }}" id="food"
                            class="form-control @error('food') is-invalid @enderror" name="food"
                            placeholder="Taomlanish haqida ma'lumot kiriting" />
                        <span class="text-danger">@error('food') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="ambulance">Tibbiyot xizmati</label>
                        <input type="text" value="{{ old('ambulance', $package->ambulance) }}" id="ambulance"
                            class="form-control @error('ambulance') is-invalid @enderror" name="ambulance"
                            placeholder="Tibbiyot xizmati haqida ma'lumot kiriting" />
                        <span class="text-danger">@error('ambulance') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="taxi_service">Transport xizmati</label>
                        <input type="text" value="{{ old('taxi_service', $package->taxi_service) }}" id="taxi_service"
                            class="form-control @error('taxi_service') is-invalid @enderror" name="taxi_service"
                            placeholder="Transport xizmati haqida ma'lumot kiriting" />
                        <span class="text-danger">@error('taxi_service') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="gift">Sovg'alar</label>
                        <input type="text" value="{{ old('gift', $package->gift) }}" id="gift"
                            class="form-control @error('gift') is-invalid @enderror" name="gift"
                            placeholder="Sovg'alar haqida ma'lumot kiriting" />
                        <span class="text-danger">@error('gift') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="package_info">Paket haqida ma'lumot</label>
                        <textarea rows="10" id="package_info" class="form-control @error('package_info') is-invalid @enderror" name="package_info"
                            placeholder="Paket haqida batafsil ma'lumot kiriting">{{ old('package_info', $package->package_info) }}</textarea>
                        <span class="text-danger">@error('package_info') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Mehmonxona haqida -->
                <div class="col-4">
                    <div class="form-group">
                        <label for="hotel_name">Mehmonxona nomi</label>
                        <input type="text" value="{{ old('hotel_name', $package->hotel_name) }}" id="hotel_name"
                            class="form-control @error('hotel_name') is-invalid @enderror" name="hotel_name"
                            placeholder="Mehmonxona nomini kiriting" />
                        <span class="text-danger">@error('hotel_name') {{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="hotel_distance">Mehmonxona masofasi (km)</label>
                        <input type="number" value="{{ old('hotel_distance', $package->hotel_distance) }}" id="hotel_distance"
                            class="form-control @error('hotel_distance') is-invalid @enderror" name="hotel_distance"
                            placeholder="Masofani kiriting" />
                        <span class="text-danger">@error('hotel_distance') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="hotel_star_count">Mehmonxona yulduz soni</label>
                        <input type="number" value="{{ old('hotel_star_count', $package->hotel_star_count) }}" id="hotel_star_count"
                            class="form-control @error('hotel_star_count') is-invalid @enderror" name="hotel_star_count"
                            placeholder="Yulduz sonini kiriting" />
                        <span class="text-danger">@error('hotel_star_count') {{ $message }} @enderror</span>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="hotel_info">Mehmonxona haqida ma'lumot</label>
                        <textarea rows="10" id="hotel_info" class="form-control @error('hotel_info') is-invalid @enderror" name="hotel_info"
                            placeholder="Mehmonxona haqida batafsil ma'lumot kiriting">{{ old('hotel_info', $package->hotel_info) }}</textarea>
                        <span class="text-danger">@error('hotel_info') {{ $message }} @enderror</span>
                    </div>
                </div>


                <!-- Photo -->
                <div class="mb-1 col-4">
                    <label>Mehmonxona rasmi 1</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="hotel_image1" name="hotel_image1">
                        <label class="custom-file-label" for="hotel_image1">Tanlang</label>
                    </div>
                    <span class="text-danger">@error('hotel_image1') {{ $message }} @enderror</span>
                </div>
                <!-- Photo -->
                <div class="mb-1 col-4">
                    <label>Mehmonxona rasmi 2</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="hotel_image2" name="hotel_image2">
                        <label class="custom-file-label" for="hotel_image2">Tanlang</label>
                    </div>
                    <span class="text-danger">@error('hotel_image2') {{ $message }} @enderror</span>
                </div>

                <!-- Photo -->
                <div class="mb-1 col-4">
                    <label>Mehmonxona rasmi 3</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="hotel_image3" name="hotel_image3">
                        <label class="custom-file-label" for="hotel_image3">Tanlang</label>
                    </div>
                    <span class="text-danger">@error('hotel_image3') {{ $message }} @enderror</span>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="advantages">Afzalliklar</label>
                        <select id="advantages" class="form-control select2 @error('advantages') is-invalid @enderror" name="advantages[]" multiple>
                            @foreach($advantages as $advantage)
                            <option value="{{ $advantage->id }}"
                                {{ in_array($advantage->id, old('advantages', json_decode($package->advantages, true) ?? [])) ? 'selected' : '' }}>
                                {{ $advantage->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('advantages') {{ $message }} @enderror</span>
                    </div>
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label for="count">Bilet soni</label>
                        <input type="number" value="{{ old('count', $package->count) }}" id="count" class="form-control @error('count') is-invalid @enderror" name="count" placeholder="Bilet sonini kiriting" />
                        <span class="text-danger">@error('count') {{ $message }} @enderror</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-success mr-1">Qo'shish</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


@section('js')
<script src="{{asset('front/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('front/app-assets/js/scripts/forms/form-select2.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "  Afzallik tanlang",
            allowClear: true,
        });
    });
</script>
@endsection

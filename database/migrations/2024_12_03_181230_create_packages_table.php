<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->nullable(); // Kompaniya nomi
            $table->integer('avia_id')->nullable(); // Avia nomi
            $table->string('photo'); // Rasmi
            $table->integer('ticket_type_id'); // chipta turi : Ekonom va hk
            $table->integer('price'); // narxi
            $table->string('name'); // paket nomi
            $table->integer('total_duration'); // davomiyligi
            $table->string('departure_time'); // borish sanasi
            $table->string('arrival_time'); // qaytish sanasi
            $table->string('visa_type'); // viza turi: umra
            $table->string('origin_city'); // ketish shahri
            $table->string('stopover_cities')->nullable(); // to'xtash
            $table->string('destination_city'); // yetib borish shahri
            $table->string('food'); // Taomlanish
            $table->string('ambulance'); // Tibbiyot xizmati
            $table->string('taxi_service'); // Transport xizmati
            $table->string('gift'); // Sovg'alar
            $table->text('package_info'); // Ziyorat haqida
            $table->string('hotel_name'); // mehmonxona nomi
            $table->integer('hotel_distance'); // mehmonxona masofasi
            $table->integer('hotel_star_count'); // mehmonxona yulduz soni
            $table->text('hotel_info'); // mehmonxona haqida
            $table->string('hotel_image1'); // mehmonxona rasmi
            $table->string('hotel_image2'); // mehmonxona rasmi
            $table->string('hotel_image3'); // mehmonxona rasmi
            $table->json('advantages'); // avzalliklari
            $table->integer('count'); // Bilet soni
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};

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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name');
            $table->text('info');
            $table->text('goal_info');
            $table->text('advantages_info');
            $table->text('story_info');
            $table->integer('brand');
            $table->integer('hotel');
            $table->integer('customer');
            $table->integer('follower');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
    
};
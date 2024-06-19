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
        Schema::create('log_pintu_masuks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('berat_muat');
            $table->foreignID('truk_id')->references('id')->on('truks')->onDelete('CASCADE');
            $table->foreignID('user_id')->references('id')->on('tb_users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_pintu_masuks');
    }
};

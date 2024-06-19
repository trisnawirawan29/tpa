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
        Schema::create('histori_armadas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignID('armada_id')->references('id')->on('truks')->onDelete('CASCADE');
            $table->foreignID('user_id')->references('id')->on('tb_users')->onDelete('CASCADE');
            $table->text('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_armadas');
    }
};

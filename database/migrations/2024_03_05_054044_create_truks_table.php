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
        Schema::create('truks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('plat_no',10);
            $table->string('nama_kontak');
            $table->string('tlp_kontak');
            $table->string('jenis_truk');
            $table->double('kapasitas');
            $table->foreignID('kab_id')->references('id')->on('kabupatens')->onDelete('CASCADE');
            $table->foreignID('user_id')->references('id')->on('tb_users')->onDelete('CASCADE');
            $table->boolean('status');
            $table->text('token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truks');
    }
};

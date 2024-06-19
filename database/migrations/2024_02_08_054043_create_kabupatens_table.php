<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\kabupaten;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kabupatens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kode');
            $table->string('nama_kab');
        });

        $kab = new kabupaten;
        $kab->kode = "5171";
        $kab->nama_kab = "Kota Denpasar";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5101";
        $kab->nama_kab = "Kabupaten Jembrana";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5102";
        $kab->nama_kab = "Kabupaten Tabanan";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5103";
        $kab->nama_kab = "Kabupaten Badung";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5104";
        $kab->nama_kab = "Kabupaten Gianyar";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5105";
        $kab->nama_kab = "Kabupaten Klungkung";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5106";
        $kab->nama_kab = "Kabupaten Bangli";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5107";
        $kab->nama_kab = "Kabupaten Karangasem";
        $kab->save();

        $kab = new kabupaten;
        $kab->kode = "5108";
        $kab->nama_kab = "Kabupaten Buleleng";
        $kab->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupatens');
    }
};

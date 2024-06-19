<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\tb_user;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username');
            $table->text('password');
            $table->string('nama');
            $table->boolean('status');
            $table->string('role');
            $table->foreignID('kab_id')->references('id')->on('kabupatens')->onDelete('CASCADE');
            
        });

        $user = new tb_user;
        $user->username = 'super';
        $user->password = md5('super');
        $user->nama = 'Super User';
        $user->kab_id = '1';
        $user->status = '1';
        $user->role = 'Super';
        $user->save();

        $user = new tb_user;
        $user->username = 'admin';
        $user->password = md5('admin');
        $user->nama = 'Admin Pengelola';
        $user->kab_id = '1';
        $user->status = '1';
        $user->role = 'Admin';
        $user->save();

        $user = new tb_user;
        $user->username = 'denpasar';
        $user->password = md5('denpasar123');
        $user->nama = 'User Denpasar';
        $user->kab_id = '1';
        $user->status = '1';
        $user->role = 'User';
        $user->save();

        $user = new tb_user;
        $user->username = 'badunf';
        $user->password = md5('badung123');
        $user->nama = 'User Badung';
        $user->kab_id = '1';
        $user->status = '1';
        $user->role = 'User';
        $user->save();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_users');
    }
};

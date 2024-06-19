<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Models\truk;
use App\Models\kabupaten;
use App\Models\histori_armada;
use App\Models\log_pintu_masuk;


class C_dashboard extends Controller
{
    function index(){
        $data['jumlah_total'] = truk::all()->count();
        $data['jumlah_aktif'] = truk::where('status','=','1')->get()->count();
        $data['jumlah_menunggu'] = truk::where('status','=','0')->get()->count();
        $data['jumlah_ditangguhkan'] = truk::where('status','=','2')->get()->count();
        $data['jumlah_sampah'] = log_pintu_masuk::whereDate('created_at',now()->today())->sum('berat_muat');
        $data['jumlah_truk'] = log_pintu_masuk::whereDate('created_at',now()->today())->count();

        $data['truk_update'] = log_pintu_masuk::
        select('truks.plat_no','kabupatens.nama_kab','log_pintu_masuks.*')
        ->join('truks','truks.id','=','log_pintu_masuks.truk_id')
        ->join('tb_users','tb_users.id','=','truks.user_id')
        ->join('kabupatens','kabupatens.id','=','tb_users.kab_id')
        ->whereDate('log_pintu_masuks.created_at',now()->today())
        ->orderBy('created_at','DESC')
        ->get();

        $data['jumlah_sampah_kab'] = log_pintu_masuk::
        selectRaw('kabupatens.nama_kab,sum(log_pintu_masuks.berat_muat) as beban')
        ->join('truks','truks.id','=','log_pintu_masuks.truk_id')
        ->join('tb_users','tb_users.id','=','truks.user_id')
        ->join('kabupatens','kabupatens.id','=','tb_users.kab_id')
        ->whereDate('log_pintu_masuks.created_at',now()->today())
        ->groupBy('kabupatens.nama_kab')
        ->orderBy('beban','DESC')
        ->get();

        return view('dashboard.utama',$data);
    }
}

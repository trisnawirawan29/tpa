<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\truk;
use App\Models\kabupaten;
use App\Models\histori_armada;
use App\Models\log_pintu_masuk;
use Session;

class LaporanController extends Controller
{
    public function index(){
        $data['status'] = "kosong";
        return view('laporan.utama_laporan',$data);
    }

    public function aksi_cek_laporan(Request $request){
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $data['tahun'] = $request->tahun;
        $data['bulan'] = $request->bulan;
        $data['status'] = "isi";
        $data['truk_update'] = log_pintu_masuk::
        select('truks.plat_no','kabupatens.nama_kab','log_pintu_masuks.*')
        ->join('truks','truks.id','=','log_pintu_masuks.truk_id')
        ->join('tb_users','tb_users.id','=','truks.user_id')
        ->join('kabupatens','kabupatens.id','=','tb_users.kab_id')
        ->whereMonth('log_pintu_masuks.created_at',$bulan)
        ->whereYear('log_pintu_masuks.created_at',$tahun)
        ->orderBy('created_at','DESC')
        ->get();

        $data['jumlah_sampah_kab'] = log_pintu_masuk::
        selectRaw('kabupatens.nama_kab,sum(log_pintu_masuks.berat_muat) as beban')
        ->join('truks','truks.id','=','log_pintu_masuks.truk_id')
        ->join('tb_users','tb_users.id','=','truks.user_id')
        ->join('kabupatens','kabupatens.id','=','tb_users.kab_id')
        ->whereMonth('log_pintu_masuks.created_at',$bulan)
        ->whereYear('log_pintu_masuks.created_at',$tahun)
        ->groupBy('kabupatens.nama_kab')
        ->orderBy('beban','DESC')
        ->get();

        return view('laporan.utama_laporan',$data);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoretpaRequest;
use App\Http\Requests\UpdatetpaRequest;
use App\Models\tpa;
use App\Models\truk;
use App\Models\tb_user;
use App\Models\log_pintu_masuk;
use Session;

class TpaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tpa.dashboard_tpa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretpaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tpa $tpa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tpa $tpa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetpaRequest $request, tpa $tpa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tpa $tpa)
    {
        //
    }

    public function scan(){
        return view('tpa.scan_pintu');
    }

    public function aksi_cek_token(Request $request){
        $data['armada'] = truk::select('truks.*','kabupatens.nama_kab')->join('kabupatens','kabupatens.id','=','truks.kab_id')->where('token','=',$request->token)->first();
        return view('tpa.cek_informasi',$data);
    }

    public function aksi_simpan_kedatangan_armada(Request $request){
        $data = new log_pintu_masuk;
        $data->truk_id = $request->id_truk;
        $data->berat_muat = $request->berat_muat;
        $data->user_id = Session::get('id');
        $data->save();
        return redirect('scan');
    }

    public function cetak_qr($token){
        $data['token'] = $token;
        $data['armada'] = truk::join('kabupatens','kabupatens.id','=','truks.kab_id')->where('token','=',$token)->first();
        return view('tpa.qrcode',$data);
    }

    public function aktifkan_armada($token){
        $armada = truk::where('token','=',$token)->first();
        $armada->status = 1;
        if($armada->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data truk berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('truk');
    }

    public function nonaktifkan_armada($token){
        $armada = truk::where('token','=',$token)->first();
        $armada->status = 0;
        if($armada->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data truk berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('truk');
    }

    public function tangguhkan_armada($token){
        $armada = truk::where('token','=',$token)->first();
        $armada->status = 2;
        if($armada->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data truk berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('truk');
    }

    public function hapus_armada($token){
        $armada = truk::where('token','=',$token)->first();
        if($armada->delete()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data truk berhasil dihapus');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal dihapus');
        }
        return redirect('truk');
    }

    public function regis_armada(){
        $data['kabupaten'] = tb_user::join('kabupatens','kabupatens.id','=','tb_users.kab_id')->where('tb_users.id','=',Session('id'))->first();
        $data['armada'] = truk::join('kabupatens','kabupatens.id','=','truks.kab_id')->where('truks.kab_id','=',Session('kab_id'))->get();
        return view('tpa.regis_armada',$data);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoretrukRequest;
use App\Http\Requests\UpdatetrukRequest;
use App\Models\truk;
use App\Models\kabupaten;
use App\Models\histori_armada;
use Session;

class TrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['truk'] = truk::join('kabupatens','kabupatens.id','=','truks.kab_id')->get();
        return view('tpa.truk.daftar_truk',$data);
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
    public function store(StoretrukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(truk $truk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(truk $truk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetrukRequest $request, truk $truk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(truk $truk)
    {
        //
    }

    public function regis_truk(){
        $data['kab'] = kabupaten::all();
        return view('tpa.truk.regis_truk',$data);
    }

    public function aksi_regis_truk(Request $request){
        $token = md5($request->nama_kontak . $request->plat_no . Rand(10,1000000));
        $data = new truk;
        $data->nama_kontak = $request->nama_kontak;
        $data->tlp_kontak = $request->tlp_kontak;
        $data->plat_no = $request->plat_no;
        $data->jenis_truk = $request->jenis_truk;
        $data->kapasitas = $request->kapasitas;
        $data->kab_id = Session::get('kab_id');
        $data->user_id = Session::get('id');
        $data->token = $token;
        $data->status = 0;
        if($data->save()){

            $armada = truk::select('truks.*','tb_users.nama')->join('tb_users','tb_users.id','truks.user_id')->where('token','=',$token)->first();
            $h = new histori_armada;
            $h->armada_id = $armada->id;
            $h->user_id = Session::get('id');
            $h->keterangan = "Armada ".$armada->plat_no." diregister pada ".$armada->created_at." Oleh ".$armada->nama;
            $h->save();

            Session::flash('status','sukses');
            Session::flash('pesan','Data armada berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data armada disimpan');
        }
        return redirect('/regis_armada');
    }

    public function edit_armada($token){
        $data['token'] = $token;
        $data['kab'] = kabupaten::all();
        $data['armada'] = truk::join('kabupatens','kabupatens.id','=','truks.kab_id')->where('token','=',$token)->first();
        return view('tpa.truk.edit_armada',$data);
    }

    public function aksi_edit_armada(Request $request){
        $token = $request->token;
        $armada = truk::where('token','=',$token)->first();
        $armada->nama_kontak = $request->nama_kontak;
        $armada->tlp_kontak = $request->tlp_kontak;
        $armada->plat_no = $request->plat_no;
        $armada->kapasitas = $request->kapasitas;
        $armada->kab_id = $request->kabupaten;
        if($armada->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data armada berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('regis_armada');
    }

    public function riwayat_armada($token){
        $data['token'] = $token;
        $data['armada'] = truk::where('token','=',$token)->first();
        $data['riwayat'] = histori_armada::
        select('histori_armadas.*','tb_users.nama')
        ->join('truks','truks.id','=','histori_armadas.armada_id')
        ->join('tb_users','tb_users.id','=','histori_armadas.user_id')
        ->where('truks.token','=',$token)
        ->orderBy('histori_armadas.created_at','DESC')
        ->get();

        return view('tpa.history_armada',$data);
    }

    public function aksi_tambah_keterangan(Request $request)
    {
        $keterangan  = new histori_armada;
        $keterangan->armada_id = $request->armada_id;
        $keterangan->user_id = Session('id');
        $keterangan->keterangan = $request->keterangan;
        $token = $request->token;
        if($keterangan->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data keterangan berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return $this->riwayat_armada($token);
        
    }

    
}

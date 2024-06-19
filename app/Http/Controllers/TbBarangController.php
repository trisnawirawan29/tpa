<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Storetb_barangRequest;
use App\Http\Requests\Updatetb_barangRequest;
use App\Models\tb_barang;
use Session;

class TbBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barang'] = tb_barang::orderby('stok','ASC')->get();
        return view('barang.list_barang',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah_barang(Request $request)
    {
        $barang = new tb_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        if($barang->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Barang '.$request->nama_barang.' berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetb_barangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tb_barang $tb_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tb_barang $tb_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetb_barangRequest $request, tb_barang $tb_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tb_barang $tb_barang)
    {
        //
    }

    public function hapus_barang($id){
        $barang = tb_barang::find($id);
        if($barang->delete()){
            Session::flash('status','sukses');
            Session::flash('pesan','Barang '.$barang->nama_barang.' berhasil dihapus');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal dihapus');
        }
        return redirect('barang');
    }

    public function edit_barang($id){
        $data['barang'] = tb_barang::find($id);
        return view('barang.edit_barang',$data);
    }

    public function aksi_edit_barang(Request $request){
        $barang = tb_barang::find($request->id_barang);
        $barang->nama_barang = $request->nama_barang;
        $barang->stok = $request->stok;
        if($barang->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Perubahan barang '.$barang->nama_barang.' berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('barang');
    }

    public function barang_masukan(){
        return view('barang.barang_masukan');
    }

    public function aksi_barang_keluar(Request $request){
        $barang = tb_barang::find($request->id_barang);
        $jumlah = $request->jumlah_barang;
        $sisa = $barang->stok - $jumlah;
        $barang->stok = $sisa;
        if($barang->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Perubahan barang '.$barang->nama_barang.' berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('barang');
    }
}

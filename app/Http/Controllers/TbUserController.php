<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Storetb_userRequest;
use App\Http\Requests\Updatetb_userRequest;
use App\Models\tb_user;
use App\Models\kabupaten;
use Session;

class TbUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = tb_user::select('tb_users.*','kabupatens.nama_kab')->join('kabupatens','kabupatens.id','=','tb_users.kab_id')->get();
        $data['kabupaten'] = kabupaten::all();
        return view('pengguna.daftar_pengguna',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = new tb_user;
        $user->nama = $request->nama;
        $user->kab_id = $request->kab_id;
        $user->role = $request->role;
        $user->password = md5($request->password);
        $user->username = $request->username;
        $user->status = 1;
        if($user->save()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data Pengguna berhasil disimpan');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal disimpan');
        }
        return redirect('pengguna');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetb_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tb_user $tb_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tb_user $tb_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatetb_userRequest $request, tb_user $tb_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $user = tb_user::find($id);
        if($user->delete()){
            Session::flash('status','sukses');
            Session::flash('pesan','Data Pengguna berhasil dihapus');
        } else {
            Session::flash('status','gagal');
            Session::flash('pesan','Data gagal dihapus');
        }
        return redirect('pengguna');
    }
}

@extends('master')

@section('judul','Pengguna')

@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Pengguna</li>
    </ol>
@endsection

@section('konten')


<div class="card">
    <div class="card-header">
        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-regis-pengguna"><i class="fa fa-plus mr-2"></i>Register Pengguna</button>
    </div>
    <div class="card-body">
        <table class="table table-hover" id="example2">
            <thead class="text-center">
                <th>No</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Kabupaten</th>
                <th>Status</th>
                <th>Register Pada</th>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($user as $u)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary btn-sm">Aksi</button>
                                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                                </button>
                               
                                <div class="dropdown-menu" role="menu" style="">
                                    <a class="dropdown-item" href="#">Edit Pengguna</a>
                                    <a class="dropdown-item" href="#">Ganti Password</a>
                                    <a class="dropdown-item" href="#">Aktifkan Pengguna</a>
                                    <a class="dropdown-item" href="#">Non-Aktifkan Pengguna</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item bg-danger" href="{{url('hapus_pengguna')}}/{{$u->id}}" onclick="return confirm('Yakin akan menghapus pengguna {{$u->nama}} ?')"><i class="fa fa-trash mr-2"></i>Hapus Pengguna</a>
                                </div>
                             
                            </div>
                        </td>
                        <td class="text-left">{{$u->nama}}</td>
                        <td>{{$u->username}}</td>
                        <td>{{$u->nama_kab}}</td>
                        <td>
                            @if ($u->status == 1)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                 <span class="badge bg-warning">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>{{$u->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- MODAL TAMBAH PENGGUNA --}}
<div class="modal fade" id="modal-regis-pengguna">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Formulir Registrasi Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{url('aksi_tambah_pengguna')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kabupaten / Kota</label>
                        <select name="kab_id" id="" class="form-control" required>
                            <option value="0" selected disabled>Silahkan Pilih</option>
                        @foreach ($kabupaten as $k)
                            <option value="{{$k->id}}">{{$k->nama_kab}}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" id="" class="form-control" required> 
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <small><span class="text">Masukan username yang akan digunakan untuk login</span></small> 
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input id="pass" type="password" name="password" class="form-control" required onchange="cek_pass()">
                    </div>
                    <div class="form-group">
                        <label for="">Konfirmasi Password</label>
                        <input id="konfirmasi_pass" type="password" name="konfirmasi_password" class="form-control" required onchange="cek_pass()">
                        <small><span class="badge bg-success" id="text_pass_benar" hidden><i class="fa fa-check mr-2"></i>Password Sesuai</span></small>
                        <small><span class="badge bg-warning" id="text_pass_salah" hidden><i class="fa fa-times mr-2"></i>Password Tidak Sesuai</span></small>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                    <button id="submit_btn" type="submit" class="btn btn-primary" disabled>Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>


<script>
    function cek_pass(){
        var a = document.getElementById('pass').value;
        var b = document.getElementById('konfirmasi_pass').value;
        var btn = document.getElementById('submit_btn');
        var text_benar = document.getElementById('text_pass_benar');
        var text_salah = document.getElementById('text_pass_salah');
        if (a == b) {
            btn.disabled = false;
            text_benar.hidden = false; 
            text_salah.hidden = true; 
        } else {
            btn.disabled = true;
            text_benar.hidden = true; 
            text_salah.hidden = false; 
        }
    }
</script>

@endsection
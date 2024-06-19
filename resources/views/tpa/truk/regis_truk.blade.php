@extends('master')
@section('judul','Register Pengangkut')

@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('truk')}}">Daftar Pengangkut</a></li>
        <li class="breadcrumb-item active">Registrasi</li>
    </ol>
@endsection

@section('konten')

<div class="card">
    <div class="card-header bg-danger">
        Formulir Pendaftaran Kendaraan
    </div>
    <div class="card-body"> 
        <form action="{{url('aksi_regis_truk')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label for="">Nama Kontak</label>
                    <input type="text" name="nama_kontak" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Telepon Kontak</label>
                    <input type="text" name="tlp_kontak" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Plat Kendaraan</label>
                    <input type="text" name="plat_no" id="plat_no" class="form-control" required>
                    <small><span class="text">* Masukan plat kendaraan termasuk angka, huruf, tanpa spasi maksimal 10 karakter,<br> Contoh : DK1234AAA</span></small>
                </div>
                <div class="form-group">
                    <label for="">Kapasitas</label>
                    <input type="text" name="kapasitas" class="form-control" required>
                    <small><span class="text">* Masukan kapasitas maksimal truk dalam satuan Ton Contoh : 8</span></small>
                </div>
                <div class="form-group">
                    <label for="">Jenis Truk</label>
                    <select name="jenis_truk" required>
                        <option value="Truk Kayu">Truk Kayu</option>
                        <option value="Dump Truk">Dump Truk</option>
                    </select>
                    <small><span class="text">* Silahkan pilih jenis truk </span></small>
                </div>
                <div class="form-group">
                    <label for="">Kabupaten/Kota</label>
                    <select name="kabupaten" class="form-control" required>
                        @foreach ($kab as $k )
                            <option value="{{$k->id}}">{{$k->nama_kab}} ({{$k->kode}})</option>
                        @endforeach
                    </select>
                    <small><span class="text">* Kabupaten/Kota pengelola truk</span></small>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="alert alert-warning">
                    <b>Ketentuan :</b> <br>
                    Truk yang telah didaftarkan harus menunggu persetujuan pengelola untuk dapat masuk ke TPA Regional Sarbagita, bukti persetujuan berupa QR-Code yang nantinya dapat ditempelkan pada kendaraan dan akan di scan pada lokasi pintu masuk ke areal TPA Regional Sarbagita.
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection
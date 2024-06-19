@extends('master')
@section('judul','Edit Armada')
@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('regis_armada')}}">Register Armada</a></li>
        <li class="breadcrumb-item active">Edit Armada</li>
    </ol>
@endsection
@section('konten')

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body"> 
                <form action="{{url('aksi_edit_armada')}}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="">Nama Kontak</label>
                            <input type="text" name="nama_kontak" class="form-control" required value="{{$armada->nama_kontak}}">
                        </div>
                        <div class="form-group">
                            <label for="">Telepon Kontak</label>
                            <input type="text" name="tlp_kontak" class="form-control" required value="{{$armada->tlp_kontak}}">
                        </div>
                        <div class="form-group">
                            <label for="">Plat Kendaraan</label>
                            <input type="text" name="plat_no" id="plat_no" class="form-control" required value="{{$armada->plat_no}}">
                            <small><span class="text">* Masukan plat kendaraan termasuk angka, huruf, tanpa spasi maksimal 10 karakter,<br> Contoh : DK1234AAA</span></small>
                        </div>
                        <div class="form-group">
                            <label for="">Kapasitas</label>
                            <input type="text" name="kapasitas" class="form-control" required value="{{$armada->kapasitas}}">
                            <small><span class="text">* Masukan kapasitas maksimal truk dalam satuan Ton Contoh : 8</span></small>
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten/Kota</label>
                            <select name="kabupaten" class="form-control" required>
                                <option @readonly(true) value="{{$armada->kab_id}}" selected>{{$armada->nama_kab}} ({{$armada->kode}})</option>
                            </select>
                            <small><span class="text">* Kabupaten/Kota pengelola truk</span></small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="alert alert-warning">
            <b>Ketentuan :</b> <br>
            <ol>
                <li>Tuliskan nama kontak dengan lengkap dan jelas sehingga memudahkan pengelola untuk melakukan konfirmasi jika diperlukan</li>
                <li>Tuliskan no kontak (whatsapp) secara lengkap sehingga memudahkan pengelola untuk dapat menghubungi</li>
                <li>Plat No kendaraan dituliskan menggunakan huruf besar tanpa spasi <b>contoh : DK1234AAS</b></li>
                <li>Kapasitas armada ditulis dengan menggunakan angka dalam ton tanpa satuan berat, <b>contoh : 8</b></li>
                <li>Pilih daftar Kabupaten/Kota sesuai dengan kepemilikan armada</li>
                <li>Truk yang telah didaftarkan harus menunggu persetujuan pengelola untuk dapat masuk ke TPA Regional Sarbagita, bukti persetujuan berupa QR-Code yang nantinya dapat ditempelkan pada kendaraan dan akan di scan pada lokasi pintu masuk ke areal TPA Regional Sarbagita.</li>
                <li>Klik simpan untuk menyimpan perubahan yang telah dilakukan</li>
            </ol>
            
        </div>
        
    </div>
</div>


@endsection
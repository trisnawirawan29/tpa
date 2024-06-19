@extends('master')
@section('judul')
    Armada {{ $kabupaten->nama_kab }}
@endsection
@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Armada</li>
    </ol>
@endsection
@section('konten')

<div class="position-relative p-2  pr-5 bg-gray mb-2">
    <div class="ribbon-wrapper ribbon-lg">
        <div class="ribbon bg-danger">
            PENTING
        </div>
    </div>
    Informasi : <br>
    <small>
        <ul>
            <li>Status <span class="badge bg-info">Menunggu Persetujuan</span> merupakan kondisi dimana informasi truk sedang direview oleh pengelolan untuk mendapatkan persetujuan</li>
            <li>Status <span class="badge bg-warning">Ditangguhkan</span> merupakan kondisi dimana pengelola memutuskan untuk menonaktifkan ijin memasuki TPA Regional karena alasan tertentu, silahkan hubungi pengelola untuk mendapatkan informasi selengkapnya</li>
            <li>Status <span class="badge bg-success">Aktif</span> merupakan kondisi dimana truk telah memiliki ijin untuk memasuki kawasan TPA dengan menunjukan QR-Code yang telah disediakan</li>
        </ul>
    </small>
</div>

<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-regis-armada"><i class="fa fa-plus mr-2"></i>Register Armada</button>
    </div>
    <div class="card-body">
        <table id="example2" class="table table-striped table-sm">
            <thead class="text-center">
                <th style="width: 5%">No</th>
                <th>Aksi</th>
                <th>Plat No</th>
                <th>Kontak</th>
                <th>Kabupaten</th>
                <th>Kapasitas (Ton)</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>QR Code</th>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($armada as $t)
                    <tr class="text-center">              
                        <td>{{$no++}}</td>
                        <td>
                            @if ($t->status == 1)
                            <span class="badge bg-danger"><i class="fa fa-lock mr-1"></i>Terkunci</span>
                            @else   
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm">Aksi</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" style="">
                                    <a class="dropdown-item" href="{{url('edit_armada')}}/{{$t->token}}"><i class="fa fa-edit mr-2"></i>Edit Armada</a>
                                    <a class="dropdown-item" href="{{url('riwayat_armada')}}/{{$t->token}}"><i class="fa fa-history mr-2"></i>Riwayat Armada</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item bg-danger" href="{{url('hapus_armada')}}/{{$t->token}}" onclick="return confirm('Yakin Menghapus Armada {{$t->plat_no}} ?')"><i class="fa fa-trash mr-2"></i>Hapus</a>
                                </div>
                            </div> 
                            @endif
                            
                        </td>
                        <td class="text-left">{{$t->plat_no}}</td>
                        <td class="text-left">{{$t->nama_kontak}} ({{$t->tlp_kontak}})</td>
                        <td>{{$t->nama_kab}}</td>
                        <td>{{$t->kapasitas}}</td>
                         <td>{{$t->jenis_truk}}</td>
                        @if ($t->status == 0)
                            <td><span class="badge bg-info">Menunggu Persetujuan</span></td>
                        @elseif ($t->status == 1)
                            <td><span class="badge bg-success">Disetujui</span></td>
                        @else
                            <td><span class="badge bg-warning">Ditangguhkan</span></td>
                        @endif
                        @if ($t->status == 1)
                        <td>
                            <a href="{{url('cetak_qr')}}/{{$t->token}}" target="_blank">
                                <button class="btn btn-primary btn-xs"><i class="fa fa-barcode mr-2"></i>QR Code</button>
                            </a>
                        </td>
                        @else
                        <td>-</td>
                        @endif
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-regis-armada">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Formulir Pencatatan Barang Kaluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{url('aksi_tambah_armada')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kontak</label>
                        <input type="text" name="nama_kontak" class="form-control" required>
                        <small><span class="text">Masukan nama penanggung jawab armada</span></small>
                    </div>
                    <div class="form-group">
                        <label for="">Telepon Kontak</label>
                        <input type="text" name="tlp_kontak" class="form-control" required placeholder="081222333444">
                        <small><span class="text">Masukan nomor telepon (whatsapp) penanggung jawab armada yang dapat dihubungi, contoh : 0822223333123</span></small>
                    </div>
                    <div class="form-group">
                        <label for="">Plat Kendaraan</label>
                        <input type="text" name="plat_no" id="plat_no" class="form-control" required placeholder="DK1234AAS">
                        <small><span class="text">Masukan plat kendaraan termasuk angka, huruf, tanpa spasi maksimal 10 karakter. Contoh : DK1234AAA</span></small> 
                    </div>
                    <div class="form-group">
                        <label for="">Kapasitas</label>
                        <input type="number" step="0.1" name="kapasitas" class="form-control" required placeholder="1,2">
                        <small><span class="text">Masukan kapasitas maksimal truk dalam satuan Ton Contoh : 8</span></small>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Truk</label>
                        <select name="jenis_truk" class="form-control" required>
                            <option value="Truk Kayu">Truk Kayu</option>
                            <option value="Dump Truk">Dump Truk</option>
                        </select>
                        <small><span class="text">* Silahkan pilih jenis truk </span></small>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection
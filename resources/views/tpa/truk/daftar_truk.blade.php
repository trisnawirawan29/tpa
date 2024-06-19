@extends('master')
@section('judul','Validasi Armada')
@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Validasi Armada</li>
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
    <div class="card-body">
        <table id="example2" class="table table-striped table-sm">
            <thead class="text-center">
                <th style="width: 5%">No</th>
                <th>Aksi</th>
                <th>Plat No</th>
                <th>Kontak</th>
                <th>Kabupaten</th>
                <th>Kapasitas (Ton)</th>
                <th>Jenis Truk</th>
                <th>Status</th>
                <th>QR Code</th>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($truk as $t)
                    <tr class="text-center">              
                        <td>{{$no++}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Aksi</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu" style="">
                                    <a class="dropdown-item" href="{{url('edit_armada')}}/{{$t->token}}"><i class="fa fa-edit mr-2"></i>Edit Armada</a>
                                    <a class="dropdown-item" href="{{url('riwayat_armada')}}/{{$t->token}}"><i class="fa fa-history mr-2"></i>Riwayat Armada</a>
                                    <a class="dropdown-item" href="{{url('aktifkan_armada')}}/{{$t->token}}" onclick="return confirm('Yakin Mengaktifkan Armada {{$t->plat_no}} ?')"><i class="fa fa-check-circle mr-2"></i>Aktifkan</a>
                                    <a class="dropdown-item" href="{{url('nonaktifkan_armada')}}/{{$t->token}}" onclick="return confirm('Yakin Non Aktifkan Armada {{$t->plat_no}} ?')"><i class="fa fa-times-circle mr-2"></i>Non Aktifkan</a>
                                    <a class="dropdown-item" href="{{url('tangguhkan_armada')}}/{{$t->token}}" onclick="return confirm('Yakin Menangguhkan Armada {{$t->plat_no}} ?')"><i class="fa fa-lock mr-2"></i>Tangguhkan</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item bg-danger" href="{{url('hapus_armada')}}/{{$t->token}}" onclick="return confirm('Yakin Menghapus Armada {{$t->plat_no}} ?')"><i class="fa fa-trash mr-2"></i>Hapus</a>
                                </div>
                            </div>
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



@endsection
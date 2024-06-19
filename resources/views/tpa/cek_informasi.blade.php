<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCAN | TPA REGIONAL</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
</head>
<body>

    <div class="row m-2">
        <div class="col">
            <div class="card">
                <div class="card-header bg-success text-center">
                    <h4>TPA REGIONAL SARBAGITA</h4>
                    <small>
                        UPTD. PENGELOLAAN SAMPAH <br> DINAS KEHUTANAN DAN LINGKUNGAN HIDUP PROVINSI BALI
                    </small>
                </div>
                <div class="card-body">

                    @if (!empty($armada) && $armada->status == 1)
                    <form action="{{url('aksi_simpan_kedatangan_armada')}}" method="POST">
                        @csrf
                        <input type="text" name="id_truk" id="" value="{{$armada->id}}" hidden>
                        <div class="form-group">
                            <label for="">Plat Kendaraan Terdaftar</label>
                            <input type="text" value="{{$armada->plat_no}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Kontak</label>
                            <input type="text" value="{{$armada->nama_kontak}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Kabupaten</label>
                            <input type="text" value="{{$armada->nama_kab}}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Berat Muat</label>
                            <input type="number" step="0.1" class="form-control" placeholder="3" required name="berat_muat">
                            <span><small>* masukan berat muatan hanya angka dalam satuan Ton, <b>contoh : 8</b></small></span>
                        </div>
                        <button type="submit" class="btn btn-info btn-block mb-2">Simpan</button>
                    </form>
                    @elseif (!empty($armada)) 
                    <div class="alert alert-info text-center">
                        <span class="badge badge-warning">AKSES DITOLAK</span><br>
                        Kendaraan <b>BELUM</b> mendapatkan persetujuan pengelola / <b>DITANGGUHKAN</b> untuk memasuki TPA Regional.
                    </div>
                    @else
                    <div class="alert alert-danger text-center">
                        <span class="badge badge-warning">AKSES DITOLAK</span><br>
                        Data Tidak Ditemukan, Kendaraan dilarang untuk memasuki TPA Regional Sarbagita
                    </div>
                    @endif
                    <a href="{{url('scan')}}">
                        <button type="button" class="btn btn-danger btn-block">Kembali</button>
                    </a>
                </div>
                <div class="card-footer">
                    <i class="float-left">{{Date('d-m-Y H:i:s')}}</i>
                    <i class="float-right">Dinas Kehutanan dan Lingkungan Hidup Provinsi Bali - 2024</i>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
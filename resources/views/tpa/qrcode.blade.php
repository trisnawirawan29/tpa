<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCAN | KADUNG LAYAH</title>
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

    <div class="row text-center">
        <div class="col text-right">
            <img src="{{asset('asset/denpasar.png')}}" alt="" style="width: 100%">
        </div>
         <div class="col text-right">
            <img src="{{asset('asset/bali.png')}}" alt="" style="width: 100%">
        </div>
        <div class="col text-left">
            <img src="{{asset('asset/badung.png')}}" alt="" style="width: 100%">
        </div>
    </div>
    <div class="row m-2">
        <div class="col">
            <div class="card">
                {{-- <div class="card-header bg-success text-center">
                    
                    <b><h4>TPA REGIONAL SARBAGITA</h4></b>
                    <small>
                        UPTD. PENGELOLAAN SAMPAH <br> DINAS KEHUTANAN DAN LINGKUNGAN HIDUP PROVINSI BALI
                    </small>
                </div> --}}
                <div class="card-body text-center">
                    {!! QrCode::size(800)->generate($token) !!}
                    <hr class="mt-2">
                    PLAT KENDARAAN <br>
                    <h1>{{$armada->plat_no}}</h1>
                    <h4>{{$armada->nama_kab}}</h4>
                </div>
                <div class="card-footer text-center bg-info">
                    <h1>- KADUNG LAYAH -</h1>
                    <i class="float-center">Dinas Kehutanan dan Lingkungan Hidup Provinsi Bali - 2024</i>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    window.print();
</script>

</html>
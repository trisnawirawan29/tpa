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
                    <div id="reader" width="600px"></div>
                    <hr>
                    <form action="{{url('aksi_cek_token')}}" method="POST" name="cek_info">
                    @csrf
                    <div class="form-group">
                        <label for="">Token Kendaraan :</label>
                        <input name="token" id="token_kendaraan" type="text" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cek Informasi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <i class="float-left">{{Date('d-m-Y H:i:s')}}</i>
                    <i class="float-right">Dinas Kehutanan dan Lingkungan Hidup Provinsi Bali - 2024</i>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
    // handle the scanned code as you like, for example:
    console.log(`Code matched = ${decodedText}`, decodedResult);
    var a = document.getElementById('token_kendaraan');
    a.value = decodedText;
    document.cek_info.submit();
    }

    function onScanFailure(error) {
    // handle scan failure, usually better to ignore and keep scanning.
    // for example:
    console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: {width: 250, height: 250} },
    /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

</html>
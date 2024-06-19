@extends('master')
@section('judul','Laporan')

@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Laporan</li>
    </ol>
@endsection

@section('konten')

<div class="card">
    {{-- <div class="card-header">Laporan Bulanan Pengelolaan Sampah</div> --}}
    <div class="card-body">
        <form action="{{url('aksi_cek_laporan')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Tahun</label>
                    <select name="tahun" id="" class="form-control">
                        <option value="2023">2023</option>
                        <option value="2024" selected>2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="">Bulan</label>
                    <select name="bulan" id="" class="form-control">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-search mr-2"></i>Lihat Laporan</button>
            </div>
        </div>
        </form>
    </div>
</div>

@if ($status == "isi")
@php
    $text_bulan = "";
    if ($bulan == 1) {
        $text_bulan = "JANUARI";
    } elseif ($bulan == 2) {
        $text_bulan = "FEBRUARI";
    } elseif ($bulan == 3) {
        $text_bulan = "MARET";
    } elseif ($bulan == 4) {
        $text_bulan = "APRIL";
    } elseif ($bulan == 5) {
        $text_bulan = "MEI";
    } elseif ($bulan == 6) {
        $text_bulan = "JUNI";
    } elseif ($bulan == 7) {
        $text_bulan = "JULI";
    } elseif ($bulan == 8) {
        $text_bulan = "AGUSTUS";
    } elseif ($bulan == 9) {
        $text_bulan = "SEPTEMBER";
    } elseif ($bulan == 10) {
        $text_bulan = "OKTOBER";
    } elseif ($bulan == 11) {
        $text_bulan = "NOVEMBER";
    } elseif ($bulan == 12) {
        $text_bulan = "DESEMBER";
    }
@endphp

<div class="card">
    <div class="card-header text-center bg-info">
        LAPORAN JUMLAH SAMPAH KABUPATEN/KOTA <br> BULAN {{$text_bulan}} TAHUN {{$tahun}} 
    </div>
    <div class="card-body">
       <table id="example4" class="table table-striped table-sm">
            <thead class="text-center">
                <th>No</th>
                <th>Kabupaten</th>
                <th>Jumlah Sampah <small>(Ton)</small></th>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($jumlah_sampah_kab as $t)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td class="text-left">{{$t->nama_kab}}</td>
                        <td>{{$t->beban}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header text-center bg-info">
        LAPORAN KEDATANGAN ARMADA  <br> BULAN {{$text_bulan}} TAHUN {{$tahun}} 
    </div>
    <div class="card-body">
       <table id="example0" class="table table-striped table-sm">
            <thead class="text-center">
                <th>No</th>
                <th>Plat No</th>
                <th>Kabupaten</th>
                <th>Jumlah Muat <small>(Ton)</small></th>
                <th>Jam Kedatangan</th>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($truk_update as $t)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td>{{$t->plat_no}}</td>
                        <td>{{$t->nama_kab}}</td>
                        <td>{{$t->berat_muat}}</td>
                        <td>{{$t->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endif


@endsection
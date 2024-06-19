@extends('master')

@section('judul','Beranda')

@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Beranda</li>
    </ol>
@endsection

@section('konten')

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Armada Aktif</span>
                <span class="info-box-number">
                    @if ($jumlah_total != 0)
                        {{$jumlah_aktif}} <small>Armada</small> / {{$jumlah_aktif / $jumlah_total * 100}}
                         <small>%</small>
                    @else
                        0
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Menunggu Persetujuan</span>
                <span class="info-box-number">
                    @if ($jumlah_total != 0)
                        {{$jumlah_menunggu}} <small>Armada</small> / {{$jumlah_menunggu/ $jumlah_total * 100}}
                        <small>%</small>
                    @else
                        0
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-lock"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Armada Ditangguhkan</span>
                <span class="info-box-number">
                   @if ($jumlah_total != 0)
                        {{$jumlah_ditangguhkan}} <small>Armada</small> / {{$jumlah_ditangguhkan/ $jumlah_total * 100}}
                         <small>%</small>
                    @else
                        0
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chart-line"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Volume Sampah Hari Ini</span>
                <span class="info-box-number">
                {{$jumlah_sampah}}
                <small>Ton</small> / 
                {{$jumlah_truk}}
                <small>Armada</small>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-7">
        <div class="card">
            <div class="card-header bg-info">Update Kedatangan Armada <span class="badge bg-danger float-right">Realtime</span></div>
            <div class="card-body">
                <table id="example2" class="table table-striped table-sm">
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
            <div class="card-footer text-right">Update Terkahir : {{Date("d-m-Y H:i:s")}}</div>
        </div>
    </div>

    <div class="col-sm-12 col-md-5">
        <div class="card">
            <div class="card-header bg-info">Update Jumlah Sampah Kab/Kota <span class="badge bg-danger float-right">Realtime</span></div>
            <div class="card-body">
                <table id="example3" class="table table-striped table-sm">
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
            <div class="card-footer text-right">Update Terkahir : {{Date("d-m-Y H:i:s")}}</div>
        </div>
    </div>
</div>

@endsection
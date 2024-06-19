@extends('master')
@section('judul','History Armada')
@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('regis_armada')}}">Armada</a></li>
        <li class="breadcrumb-item active">History Armada</li>
    </ol>
@endsection
@section('konten')

<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">Kirim Tanggapan</div>
            <div class="card-body">
                <form action="{{url('aksi_tambah_keterangan')}}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{$armada->token}}">
                    <input name="user_id" type="hidden" value="{{session('id')}}">
                    <input name="armada_id" type="hidden" value="{{$armada->id}}">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input class="form-control" type="text" name="nama" value="{{Session('nama')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea class="form-control" name="keterangan" id="" cols="30" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
                    <a href="{{url('truk')}}"><button type="button" class="btn btn-danger">Kembali</button></a>
                </form>
                
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        @if ($riwayat->isEmpty())
        <div class="card">
            <div class="card-body text-center">
                <h5>Belum Ada History</h5>
            </div>
        </div>
        @else
        <div class="timeline">
            <div class="time-label">
                <span class="bg-info">Riwayat {{$armada->plat_no}}</span>
            </div>
            @foreach ($riwayat as $r)
                <div>
                    <i class="fas fa-comment-dots bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock mr-1"></i>{{$r->created_at}}</span>
                        <h3 class="timeline-header">{{$r->nama}}</h3>
                        <div class="timeline-body">
                            {{$r->keterangan}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>




@endsection
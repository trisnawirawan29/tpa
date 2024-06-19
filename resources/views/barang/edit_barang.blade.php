@extends('master')
@section('judul','Edit Barang')

@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('barang')}}">Daftar Barang</a></li>
        <li class="breadcrumb-item active">Edit Barang</li>
    </ol>
@endsection

@section('konten')
    <div class="card">
        <div class="card-header bg-danger">
            <div class="card-title">Perubahan {{$barang->nama_barang}}</div>
        </div>
        <div class="card-body">
            <form action="{{url('aksi_edit_barang')}}" method="POST">
                @csrf
                <input type="hidden" name="id_barang" value="{{$barang->id}}"">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input class="form-control" type="text" name="nama_barang" id="nama_barang" value="{{$barang->nama_barang}}">
                </div>
                <div class="form-group">
                    <label for="stok_barang">Stok Barang</label>
                    <input class="form-control" type="number" name="stok" id="stok_barang" value="{{$barang->stok}}">
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{url('barang')}}">
                            <button type="button" class="btn btn-danger btn-block">Close</button>
                        </a>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
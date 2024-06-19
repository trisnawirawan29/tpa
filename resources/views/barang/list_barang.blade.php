@extends('master')
@section('judul','Barang, Sarana dan Prasarana')

@section('link')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item active">Barang, Sarana dan Prasarana</li>
    </ol>
@endsection

@section('konten')
<div class="card">
    {{-- <div class="card-header bg-danger">Daftar Barang, Sarana dan Prasarana</div> --}}
    <div class="card-body">
        <div class="row mb-4">
            <div class="col">
                <button class="btn btn-block btn-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus mr-2"></i>Tambah Jenis Barang</button>
            </div>
            <div class="col">
                <button class="btn btn-block btn-danger" data-toggle="modal" data-target="#modal-barang-keluar"><i class="fa fa-calendar-minus mr-2"></i>Barang Keluar</button>
            </div>
            <div class="col">
                <button class="btn btn-block btn-primary " data-toggle="modal" data-target="#modal-default"><i class="fa fa-calendar-plus mr-2"></i>Barang Masuk</button>
            </div>
        </div>
        
        <table class="table table-striped table-sm" id="example2">
            <thead class="text-center">
                <th style="width: 80px">No</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($barang as $b)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td class="text-left">{{$b->nama_barang}}</td>
                        <td>{{$b->stok}}</td>
                        <td>
                            <a href="{{url('edit_barang')}}/{{$b->id}}">
                            <button class="btn btn-sm btn-info" title="Edit"><i class="fa fa-edit"></i></button>
                            </a>
                            <a href="{{url('aksi_hapus_barang')}}/{{$b->id}}">
                                <button class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('anda yakin menghapus jenis barang {{$b->nama_barang}} ?')"><i class="fa fa-trash"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Tambah Jenis Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{url('aksi_tambah_barang')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input name="nama_barang" type="text" class="form-control" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input name="stok" type="number" class="form-control" placeholder="Jumlah Stok Tersedia">
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

<div class="modal fade" id="modal-barang-keluar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Formulir Pencatatan Barang Kaluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{url('aksi_barang_keluar')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="id_barang" class="form-control">
                            @foreach ($barang as $b)                               
                                <option value="{{$b->id}}">{{$b->nama_barang}} (Stok {{$b->stok}})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Keluar</label>
                        <input type="number" name="jumlah_barang" class="form-control">
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
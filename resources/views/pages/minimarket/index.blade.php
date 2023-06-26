@extends('layouts.app')

@section('title')
    Data Minimarket
@endsection

@section('content')
    <div class="page-content page-home">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Tambah Data Minimarket</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('minimarket.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nameCategory">Kode</label>
                                            <input type="text" name="kode" class="form-control" id="nameCategory"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="namaMinimarket">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="namaMinimarket"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamatMinimarket">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamatMinimarket"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="noTelepon">Telepon</label>
                                            <input type="text" name="telepon" class="form-control" id="noTelepon"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-success px-5">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-heading">
                            <h5 class="text-center">Tabel Data Minimarket</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($minimarkets as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->telepon }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                                            type="button" data-toggle="dropdown">Aksi</button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('minimarket.edit', $item->id) }}"
                                                                class="dropdown-item">Sunting</a>
                                                            <form action="{{ route('minimarket.destroy', $item->id) }}"
                                                                method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="dropdown-item text-danger">Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

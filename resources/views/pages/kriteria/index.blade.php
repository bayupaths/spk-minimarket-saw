@extends('layouts.app')

@section('title')
    Data Kriteria
@endsection

@section('content')
    <div class="page-content page-home">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Tambah Kriteria</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kriteria.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kodeKriteria">Kode</label>
                                            <input type="text" name="kode" class="form-control" id="kodeKriteria"
                                                required value="{{ old('kode') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="namaKriteria">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="namaKriteria"
                                                required value="{{ old('nama') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tipeKriteria">Type</label>
                                            <select class="form-control" name="tipe" id="tipeKriteria">
                                                <option value="cost" {{ old('tipe') == 'cost' ? 'selected' : '' }}>Cost
                                                </option>
                                                <option value="benefit" {{ old('tipe') == 'benefit' ? 'selected' : '' }}>
                                                    Benefit</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="bobot">Bobot</label>
                                            <input type="number" step="0.01" name="bobot" class="form-control"
                                                id="bobot" required value="{{ old('bobot') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" id="keterangan"
                                                required value="{{ old('keterangan') }}">
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
                            <h5 class="text-center">Tabel Kriteria</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Tipe</th>
                                        <th>bobot</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kriteria as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tipe }}</td>
                                            <td>{{ $item->bobot }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                                            type="button" data-toggle="dropdown">Aksi</button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('kriteria.edit', $item->id) }}"
                                                                class="dropdown-item">Sunting</a>
                                                            <form action="{{ route('kriteria.destroy', $item->id) }}"
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

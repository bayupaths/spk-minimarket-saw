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
                            <h5 class="text-center">Tambah Sub Kriteria</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('sub_kriteria.update', $subKriteriaUpdate->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipeKriteria">Kriteria</label>
                                            <select class="form-control" name="kriteria_id" id="tipeKriteria">
                                                <option value=""> -- Pilih Kriteria -- </option>
                                                @foreach ($kriteria as $k)
                                                    <option value="{{ $k->id }}"
                                                        {{ $subKriteriaUpdate->kriteria_id == $k->id ? 'selected' : '' }}>
                                                        {{ $k->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nilia">Nilai</label>
                                            <input type="number" step="0.01" name="nilai" class="form-control"
                                                id="nilai" required
                                                value="{{ $subKriteriaUpdate->nilai ?? old('nilai') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" id="keterangan"
                                                required value="{{ $subKriteriaUpdate->keterangan ?? old('keterangan') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-warning px-5">Simpan</button>
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
                                        <th>Kriteria</th>
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($subKriteria as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->kriteria->nama }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->nilai }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                                            type="button" data-toggle="dropdown">Aksi</button>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('sub_kriteria.edit', $item->id) }}"
                                                                class="dropdown-item">Sunting</a>
                                                            <form action="{{ route('sub_kriteria.destroy', $item->id) }}"
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

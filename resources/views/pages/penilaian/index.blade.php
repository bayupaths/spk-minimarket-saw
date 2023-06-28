@extends('layouts.app')

@section('title')
    Penilaian
@endsection

@section('content')
    <div class="page-content page-home">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Penilaian</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('penilaian.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="minimarket">Minimarket</label>
                                            <select class="form-control" name="minimarket_id" id="minimarket">
                                                <option value=""> -- Pilih Minimarket -- </option>
                                                @foreach ($minimarkets as $minimart)
                                                    <option value="{{ $minimart->id }}">
                                                        {{ $minimart->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @foreach ($kriteria as $k)
                                            <div class="form-group">
                                                <input type="hidden" name="kriteria_id[]" value="{{ $k->id }}">
                                                <label for="tipeKriteria">{{ $k->nama }}</label>
                                                <select class="form-control" name="sub_kriteria_id[]" id="tipeKriteria"
                                                    required>
                                                    <option value=""> -- Pilih {{ $k->nama }} -- </option>
                                                    @php
                                                        $subKriteria = App\Models\SubKriteria::where('kriteria_id', $k->id)->get();
                                                    @endphp
                                                    @foreach ($subKriteria as $sub)
                                                        <option value="{{ $sub->id }}">
                                                            {{ $sub->nilai . ' - ' . $sub->keterangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach
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
                            <h5 class="text-center">Daftar Nilai</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2">Minimarket</th>
                                        <th class="text-center" colspan="{{ count($kriteria) }}">Kriteria</th>
                                    </tr>
                                    <tr class="text-center">
                                        @foreach ($kriteria as $k)
                                            <th>{{ $k->nama }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $colspan = count($kriteria) + 1;
                                    @endphp
                                    @forelse ($minimarkets as $minimart)
                                        <tr>
                                            <td>{{ $minimart->nama }}</td>
                                            @php
                                                $nilai = App\Models\Penilaian::with(['minimarket', 'kriteria', 'subKriteria'])
                                                    ->where('minimarket_id', $minimart->id)
                                                    ->get();
                                                foreach ($nilai as $n) {
                                                    echo '<td>' . $n->subKriteria->keterangan . '</td>';
                                                }
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr class='text-center'>
                                            <td colspan="{{ $colspan }}">Data Kosong</td>
                                        </tr>
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

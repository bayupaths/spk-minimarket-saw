@extends('layouts.app')

@section('title')
    Data Minimarket
@endsection

@section('content')
    <div class="page-content page-home">
        <div class="container">
            <div class="card card-info">
                <div class="card-heading">
                    <h5 class="text-center">Matriks Keputusan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
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
                            @forelse ($matriksKeputusan as $key => $matriks)
                                <tr class="text-center">
                                    <td>{{ $matriks['alternate'] }}</td>
                                    @foreach ($matriks['nilai'] as $nilai)
                                        <td>{{ $nilai }}</td>
                                    @endforeach
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
            <div class="card card-info">
                <div class="card-heading">
                    <h5 class="text-center">Normalisasi Matriks Keputusan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
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
                            @forelse ($normalisasi as $key => $normalize)
                                <tr class="text-center">
                                    <td>{{ $normalize['alternate'] }}</td>
                                    @foreach ($normalize['normalisasi'] as $n)
                                        <td>{{ $n }}</td>
                                    @endforeach
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
            <div class="card card-info">
                <div class="card-heading">
                    <h5 class="text-center">Perangkingan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">Minimarket</th>
                                <th class="text-center" colspan="{{ count($kriteria) }}">Kriteria</th>
                                <th class="text-center" rowspan="2">Hasil</th>
                            </tr>
                            <tr class="text-center">
                                @foreach ($kriteria as $k)
                                    <th>{{ $k->nama }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resultRanking as $key => $ranking)
                                <tr class="text-center">
                                    <td>{{ $ranking['alternate'] }}</td>
                                    @foreach ($ranking['rangking'] as $rank)
                                        <td>{{ $rank }}</td>
                                    @endforeach
                                    <td>{{ $ranking['hasilAkhir'] }}</td>
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
@endsection

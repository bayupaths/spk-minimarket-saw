<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minimarket;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;

class HasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteriaArray = array();

        $minimarkets = Minimarket::all();
        $kriterias = Kriteria::all();
        $subKriteria = SubKriteria::all();

        // Menghitung bobot kriteria
        if (!empty(count($kriterias))) {
            $totalBobot = $kriterias->sum('bobot');
            foreach ($kriterias as $kritera) {
                $bobotArray[$kritera->id] = @$kritera->bobot / $totalBobot;
            }
        }

        // Matriks Keputusan
        foreach ($kriterias as $kriteria) {
            $newKriteria['kriteria'] = $kriteria->nama;
            array_push($kriteriaArray, $kriteria->nama);
        }
        foreach ($minimarkets as $key => $minimart) {
            $data['alternate'] = $minimart->nama;
            $nilai = Penilaian::with(['minimarket', 'kriteria', 'subKriteria'])->where('minimarket_id', $minimart->id)->get();
            foreach ($nilai as $idx => $n) {
                $result[$idx] = $n->subKriteria->nilai;
                $nilaiMinimart[$key][$idx] = array("type" => $n->kriteria->tipe, "id_kriteria" => $n->kriteria->id);
                $forminmax[$n->kriteria->id][$key] = $n->subKriteria->nilai;
                $data['nilai'] = $result;
            }
            $newMinimarts[$key] = array(
                'id_minimart' => $minimart->id,
                'name' => $minimart->nama
            );
            $newResult[] = $data;
        }
        $matriksKeputusan = $newResult;


        // Normalisasi Matriks Keputusan
        if (!empty($newMinimarts)) {
            $simpanrangking = array();
            foreach ($newMinimarts as $x => $val) {
                $normalize['alternate'] = $val['name'];
                for ($y = 0; $y < count($nilaiMinimart[$x]); $y++) {
                    $id_kriteria = $nilaiMinimart[$x][$y]['id_kriteria'];
                    $result[$y] = $this->normalisasi($forminmax[$id_kriteria][$x], $forminmax[$id_kriteria], $nilaiMinimart[$x][$y]['type']);
                    $normalize['normalisasi'] = $result;
                    $simpanrangking[$x][$y] = floatval($result[$y]) * $bobotArray[$id_kriteria];
                }
                $normalized[] = $normalize;
            }
        }
        $normalisasiMatriks = $normalized;


        // Perangkingan
        if (!empty($bobotArray)) {
            foreach ($newMinimarts as $n => $val) {
                $hasilakhir = 0;
                $ranking['alternate'] = $val['name'];
                for ($m = 0; $m < count($simpanrangking[$n]); $m++) {
                    $rank[$m] = $simpanrangking[$n][$m];
                    $hasilakhir += floatval($rank[$m]);
                    $ranking['rangking'] = $rank;
                }
                // Hasil Akhri Ranking
                $hasil = round($hasilakhir, 3);
                $ranking['hasilAkhir'] = $hasil;

                // Perangkingan
                $findRank[] = $hasil;
                $ranked[] = $ranking;
            }
            $hasilRank['ranked'] = $this->perangkinganNilai($findRank);
        }
        $resultRanking = $ranked;

        return view('pages.hasil.index', [
            'matriksKeputusan' => $matriksKeputusan,
            'normalisasi' => $normalisasiMatriks,
            'resultRanking' => $resultRanking,
            'hasilRank' => $hasilRank,
            'minimarkets' => $minimarkets,
            'kriteria' => $kriterias,
            'subKriteria' => $subKriteria,
        ]);
    }

    public function normalisasi($value, $arrayValue, $sifat)
    {
        if ($sifat == 'benefit') {
            $result = $value / max($arrayValue);
        } elseif ($sifat == 'cost') {
            $result = min($arrayValue) / $value;
        }
        return round($result, 3);
    }

    function perangkinganNilai($arrayNilai)
    {
        $nilaiTerurut = $arrayNilai;
        rsort($nilaiTerurut); // Mengurutkan array dari nilai tertinggi ke terendah

        $peringkat = array();
        foreach ($arrayNilai as $nilai) {
            $peringkat[] = array_search($nilai, $nilaiTerurut) + 1;
        }

        return $peringkat;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

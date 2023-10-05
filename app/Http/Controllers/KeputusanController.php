<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Kehadiran;
use App\Models\Keputusan;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreKeputusanRequest;
use App\Http\Requests\UpdateKeputusanRequest;

class KeputusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Membuat koleksi dari array
        $collection = collect(KeputusanController::ambilKeputusan());

        // Mengurutkan koleksi berdasarkan properti "rank" dari tertinggi ke terendah
        $sorted = $collection->sortByDesc('totalSkor');

        // Mengambil 2 data tertinggi
        $datas = $sorted->take(10);


        return view('keputusan',[
            "page_title"=>"Keputusan",
            "page_description"=>"Hasil Keputusan Penerima Diakonia GPdI Parakletos Purwokerto",
            "datas" => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKeputusanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Keputusan $keputusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keputusan $keputusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeputusanRequest $request, Keputusan $keputusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keputusan $keputusan)
    {
        //
    }

    public function cetak_saw(){
         // Membuat koleksi dari array
         $collection = collect(KeputusanController::ambilKeputusan());
         $calon = Jemaat::all();

         // Mengurutkan koleksi berdasarkan properti "rank" dari tertinggi ke terendah
         $sorted = $collection->sortByDesc('totalSkor');
 
         // Mengambil 2 data tertinggi
         $datas = $sorted->all();
 
 
         return view('cetak-formula-saw',[
             "page_title"=>"Cetak Formula SAW",
             "page_description"=>"Hasil Keputusan Penerima Diakonia GPdI Parakletos Purwokerto",
             "calon"=> $calon,
             "datas" => $datas
         ]);
    }
    public function ambilKeputusan()
    {
        //50% Pendapatan
        //20% Kehadiran
        //15% Status
        //15% Keaktifan

        //AMBIL DATA SEMUA JEMAAT YANG PUNYA PENDAPATAN TERENDAH

        $jemaat = Jemaat::select('id', 'pendapatan', 'status_keaktifan', 'status','nama')
            ->get();

        // $kehadiran = Kehadiran::select('jemaat_id', 'jumlah_kehadiran')
        //     ->get();

        $totalSkor = [];
        $data = [];
        foreach ($jemaat as $j) {
            $skorPendapatan = 0;
            if ($j->pendapatan < 500000) {
                $skorPendapatan = 1;
            } elseif ($j->pendapatan >= 500000 && $j->pendapatan <= 1000000) {
                $skorPendapatan = 4;
            } elseif ($j->pendapatan > 1000000 && $j->pendapatan <= 2000000) {
                $skorPendapatan = 3;
            } elseif ($j->pendapatan > 2000000 && $j->pendapatan <= 3000000) {
                $skorPendapatan = 2;
            } elseif ($j->pendapatan > 3000000) {
                $skorPendapatan = 1;
            }

            $skorKehadiran = 0;
            if ($j->jumlah_kehadiran <= 10) {
                $skorKehadiran = 1;
            } elseif ($j->jumlah_kehadiran > 10 && $j->jumlah_kehadiran <= 20) {
                $skorKehadiran = 2;
            } elseif ($j->jumlah_kehadiran > 20 && $j->jumlah_kehadiran <= 30) {
                $skorKehadiran = 3;
            } elseif ($j->jumlah_kehadiran > 30 && $j->jumlah_kehadiran <= 40) {
                $skorKehadiran = 4;
            } elseif ($j->jumlah_kehadiran > 40 && $j->jumlah_kehadiran <= 52) {
                $skorKehadiran = 5;
            }

            $skorPerkawinan = 0;
            if ($j->status == '1') {
                $skorPerkawinan = 2;
            } elseif ($j->status == '0') {
                $skorPerkawinan = 5;
            }

            $skorAktif = 0;
            if ($j->status_keaktifan == 'aktif') {
                $skorAktif = 5;
            } elseif ($j->status_keaktifan == 'tidak aktif') {
                $skorAktif = 2;
            }

            $data[$j->id] = [
                        "id"    => $j->id,
                        "nama" => $j->nama,
                        "pendapatan"    => $skorPendapatan,
                        "kehadiran" => $skorKehadiran,
                        "keaktifan" => $skorAktif,
                        "status" => $skorPerkawinan,
            
                        "totalSkor" => ( 5 * $skorPendapatan) + ( 3 * $skorKehadiran)  + (2 * $skorAktif) + $skorPerkawinan
                    ];
            
                    //

        }
        return $data;
    }
}

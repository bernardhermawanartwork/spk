<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Models\Kehadiran;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreKehadiranRequest;
use App\Http\Requests\UpdateKehadiranRequest;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ambil_hari($hari)
    {
        $currentMonth = Carbon::now(); // Mengambil bulan saat ini
        $sundays = [];

         // Loop melalui setiap hari dalam bulan ini
        for ($day = 1; $day <= $currentMonth->daysInMonth; $day++) {
            $date = Carbon::createFromDate($currentMonth->year, $currentMonth->month, $day);

        // Cek apakah hari adalah hari Minggu (nilai 0 adalah Minggu dalam format Carbon)
            if ($date->dayOfWeek === $hari) {
             $sundays[] = $date->format('Y-m-d'); // Format tanggal sesuai kebutuhan Anda
            }
        }
        return $sundays;
    }
    public function index()
    {
       

        return view('kehadiran',[
            "page_title"=>"Kehadiran",
            "page_description"=>"Mengelola Data Kehadiran Jemaat GPdI Parakletos Purwokerto",
            "datas"=>Jemaat::all(),
            "hari_minggus"=>$this->ambil_hari(0)
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
    public function store(StoreKehadiranRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKehadiranRequest $request, Kehadiran $kehadiran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kehadiran $kehadiran)
    {
        //
    }
}

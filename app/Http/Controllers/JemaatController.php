<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use App\Http\Requests\StoreJemaatRequest;
use App\Http\Requests\UpdateJemaatRequest;

class JemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jemaat',[
            "page_title"=>"Calon Penerima Diakonia",
            "page_description"=>"Mengelola Data Calon Penerima Diakonia GPdI Parakletos Purwokerto",
            "datas"=>Jemaat::all(),
            "jumlah_data"=>Jemaat::count()
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
    public function store(StoreJemaatRequest $request)
    {
        $request['kehadiran'] = 0;
        $data = $request->all();
        Jemaat::create($data);
        return redirect('/jemaat')->with('message','Jemaat baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jemaat $jemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jemaat $jemaat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJemaatRequest $request, Jemaat $jemaat)
    {
        $data = $request->except(['_token']);
        Jemaat::where('id', $jemaat->id)->update($data);
        return redirect('/jemaat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jemaat $jemaat)
    {
        Jemaat::destroy($jemaat->id);
        return redirect('/jemaat')->with('message','data berhasil dihapus');
    }

    //CETAK QR
    public function cetakQR($id)
    {
        //$qr_id = bcrypt('calon_penerima_diakonia_'.$id);
        $qr_id = 'calon_penerima_diakonia_'.$id;
        echo"<img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=$qr_id'>";
        echo"<script>window.print()</script>";      
         
    }
    public function bacaQR()
    {
        $api = 'http(s)://api.qrserver.com/v1/read-qr-code/?fileurl=[URL-encoded-webaddress-url-to-qrcode-image-file]';
    }

}

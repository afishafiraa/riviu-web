<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $hasilPemeriksaan = new
        $jumlah = count($request->input('periksa'));
        for($i=0;$i<$jumlah;$i++){
            $hasilPemeriksaan = new HasilPemeriksaan;
            $hasilPemeriksaan->rekam_medis_id = $request->input('rekam_medis_id');
            $hasilPemeriksaan->jenis_pemeriksaan_id = $request->input('periksa')[$i];
            $hasilPemeriksaan->save();
        }
        return redirect()->route('pendaftaran.home')->with('status', 'Pasien berhasil diproses ke Laboratorium!');
    }
}

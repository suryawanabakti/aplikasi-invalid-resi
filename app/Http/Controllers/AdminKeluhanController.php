<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\PengirimanKeterangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminKeluhanController extends Controller
{
    public function index()
    {
        $keluhanKeluhan = Keluhan::orderBy('created_at', 'desc')->where('approve', 'terima')->get();
        return view('admin.keluhan.index', compact('keluhanKeluhan'));
    }

    public function verifikasi()
    {
        $keluhanKeluhan = Keluhan::orderBy('updated_at', 'desc')->whereNotNull('keterangan')->where('approve', 'terima')->get();
        return view('admin.verifikasi.index', compact('keluhanKeluhan'));
    }

    public function update(Keluhan $keluhan, Request $request)
    {
        $keluhan->update([
            // 'status_masalah' => 'selesai',
            'keterangan' => $request->keterangan
        ]);

        PengirimanKeterangan::create([
            "pengiriman_id" => $keluhan->pengiriman_id,
            "keterangan" => $request->keterangan,
            "waktu" => Carbon::now('GMT+8')
        ]);
        Controller::sendWa($keluhan->user->no_wa, "Keluhan anda telah di proses untuk menyelesaikan masalah \nKeterangan:\n$request->keterangan \nJikah Keluhan anda teratasi mohon untuk segera diverifikasi");
        return redirect('/admin/verifikasi');
    }
}

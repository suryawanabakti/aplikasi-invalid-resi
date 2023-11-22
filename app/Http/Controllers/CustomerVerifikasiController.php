<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerVerifikasiController extends Controller
{
    public function index()
    {
        $keluhanKeluhan = Keluhan::where('user_id', auth()->id())->orderBy('created_at', 'desc')->whereNotNull('keterangan')->get();
        return view('customer.verifikasi.index', compact('keluhanKeluhan'));
    }

    public function terima(Keluhan $keluhan)
    {
        $keluhan->update([
            'status_masalah' => 'selesai'
        ]);

        Alert::success("Berhasil Menyelesaikan keluhan");
        return back();
    }
}

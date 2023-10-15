<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class AdminKeluhanController extends Controller
{
    public function index()
    {
        $keluhanKeluhan = Keluhan::orderBy('created_at', 'desc')->where('approve', 'terima')->get();
        return view('admin.keluhan.index', compact('keluhanKeluhan'));
    }

    public function update(Keluhan $keluhan, Request $request)
    {
        $keluhan->update([
            'status_masalah' => 'selesai',
            'keterangan' => $request->keterangan
        ]);

        Controller::sendWa($keluhan->user->no_wa, "Keluhan anda telah diselesaikan");
        return back();
    }
}

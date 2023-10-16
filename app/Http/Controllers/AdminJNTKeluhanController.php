<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminJNTKeluhanController extends Controller
{
    public function index()
    {
        $keluhanKeluhan = Keluhan::orderBy('created_at', 'desc')->get();
        return view('admin-jnt.keluhan.index', compact('keluhanKeluhan'));
    }

    public function terima(Keluhan $keluhan)
    {
        $keluhan->update([
            'approve' => 'terima'
        ]);

        Alert::success("Berhasil Terima Keluhan");
        Controller::sendWa($keluhan->user->no_wa, "Keluhan Berhasil di terima");
        return back();
    }

    public function tolak(Keluhan $keluhan)
    {
        $keluhan->update([
            'approve' => 'tolak'
        ]);
        Alert::success("Berhasil Tolak Keluhan");

        Controller::sendWa($keluhan->user->no_wa, "Keluhan Anda di tolak");
        return back();
    }
}

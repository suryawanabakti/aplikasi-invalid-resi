<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerPengajuanController extends Controller
{
    public function index()
    {
        return view('customer.pengajuan.index');
    }

    public function store(Request $request)
    {

        $pengiriman = Pengiriman::where('no_resi', $request->no_resi)->first();
        if (empty($pengiriman)) {
            Alert::error("Resi Tidak Ditemukan");
            return back();
        }
        Keluhan::create([
            'pengiriman_id' => $pengiriman->id,
            'user_id' => auth()->id(),
            'keluhan' => $request->keluhan
        ]);
        Alert::success("Berhasil tambah keluhan");
        return redirect('/customer/keluhan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\Pengiriman;
use App\Models\PengirimanKeterangan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerPengirimanController extends Controller
{
    public function index()
    {
        return view('customer.pengiriman.index');
    }

    public function search(Request $request)
    {
        $pengiriman = Pengiriman::where('no_resi', $request->no_resi)->first();
        if (empty($pengiriman)) {
            return back()->withErrors('Maaf, Nomor resi tidak di temukan 🥺');
        }
        $keterangan = PengirimanKeterangan::orderBy('created_at', 'desc')->where('pengiriman_id', $pengiriman->id)->get();
        Alert::success("Berhasil Validasi Resi");
        return view('customer.pengiriman.show', compact('pengiriman', 'keterangan'));
    }

    public function keluhan(Request $request, Pengiriman $pengiriman)
    {
        Keluhan::create([
            'pengiriman_id' => $pengiriman->id,
            'user_id' => auth()->id(),
            'keluhan' => $request->keluhan
        ]);
        return back()->with('success', ' Berhasil Memberi keluhan pada pengiriman dengan nomor resi : ' .  $pengiriman->no_resi);
    }
}

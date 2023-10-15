<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\PengirimanKeterangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class AdminJNTPengirimanController extends Controller
{
    public function index()
    {
        $pengirimanPengiriman = Pengiriman::orderBy('created_at', 'desc')->get();
        return view('admin-jnt.pengiriman.index', compact('pengirimanPengiriman'));
    }

    public function create()
    {
        return view('admin-jnt.pengiriman.create');
    }

    public function show(Pengiriman $pengiriman)
    {
        $keterangan = PengirimanKeterangan::orderBy('created_at', 'desc')->get();
        return view('admin-jnt.pengiriman.show', compact('pengiriman', 'keterangan'));
    }

    public function addKeterangan(Pengiriman $pengiriman, Request $request)
    {
        $validatedData = $request->validate([
            'waktu' => 'required',
            'keterangan' => 'required'
        ]);

        $validatedData['pengiriman_id'] = $pengiriman->id;
        PengirimanKeterangan::create($validatedData);
        Alert::success("Berhasil tambah keterangan");
        return back();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_customer' => 'required',
            'nohp_customer' => 'required',
            'alamat_customer' => 'required',
            'no_resi' => 'required',
            'nama_barang' => 'required',
            'berat' => 'required',
            'ongkir' => 'required'
        ]);

        Pengiriman::create($validatedData);
        return redirect('/admin-jnt/pengiriman')->with('success', 'Berhasil tambah pengiriman');
    }
}

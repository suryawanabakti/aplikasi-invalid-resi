<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerKeluhanController extends Controller
{
    public function index()
    {
        $keluhanKeluhan = Keluhan::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('customer.keluhan.index', compact('keluhanKeluhan'));
    }

    public function destroy(Keluhan $keluhan)
    {
        $keluhan->delete();
        Alert::success("Berhasil batalkan keluhan");
        return back();
    }
}

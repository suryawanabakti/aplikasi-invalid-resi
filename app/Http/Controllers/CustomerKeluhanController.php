<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class CustomerKeluhanController extends Controller
{
    public function index()
    {
        $keluhanKeluhan = Keluhan::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('customer.keluhan.index', compact('keluhanKeluhan'));
    }
}

@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-8 mb-4 order-0">
                <b>Selamat datang di aplikasi sistem penanganan masalah invalid data resi pada jasa pengiriman di kota
                    Makassar</b>
            </div>
        </div>
        <div class="row">
            <div class="col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="d-block mb-1">Keluhan</span>
                        <h3 class="card-title text-nowrap mb-2">{{ $countKeluhan }}</h3>
                        {{-- <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> --}}
                    </div>
                </div>
            </div>

            <div class="col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <span class="d-block mb-1">Keluhan Belum Selesai</span>
                        <h3 class="card-title text-nowrap mb-2">{{ $countKeluhanBelumSelesai }}</h3>
                        {{-- <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> --}}
                    </div>
                </div>
            </div>

            @role('admin jnt')
                <div class="col-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <span class="d-block mb-1">Pengiriman</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $countPengiriman }}</h3>
                            {{-- <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> --}}
                        </div>
                    </div>
                </div>
            @endrole
        </div>
    </div>
@endsection

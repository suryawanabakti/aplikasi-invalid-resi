@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row ">
            <div class="col-md-12 d-flex justify-content-between">
                <b>PENGIRIMAN / CREATE</b>
                <a class="btn btn-primary mb-2" href="/admin-jnt/pengiriman">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin-jnt/pengiriman" method="POST">
                            @csrf
                            <b class="">Data Customer</b> <br>
                            <div class="row mt-1 mb-3">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nama Customer <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="nama_customer">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nomor HP <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="nohp_customer">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Alamat Customer <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="alamat_customer">
                                </div>
                            </div>

                            <b>Data Barang</b>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nomor Resi <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="no_resi">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nama Barang <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" required name="nama_barang">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Berat <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" required name="berat">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Ongkir <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" required name="ongkir">
                                </div>
                            </div>

                            <button class="btn btn-primary">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

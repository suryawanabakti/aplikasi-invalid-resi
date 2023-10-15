@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row ">
            <div class="col-md-12 d-flex justify-content-between">

                <a class="btn btn-primary mb-2" href="/admin-jnt/pengiriman">Kembali</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>NO RESI. {{ $pengiriman->no_resi }}</b>
                        <span class="float-end">
                            <button type="button" class="btn btn-primary btn-icon" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample" aria-expanded="false"
                                aria-controls="collapseExample">-</button>
                        </span>
                    </div>
                    <div class="card-body collapse" id="collapseExample">
                        <form action="/admin-jnt/pengiriman" method="POST">
                            @csrf
                            <b class="">Data Customer</b> <br>
                            <div class="row mt-1 mb-3">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nama Customer <span
                                            class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" required name="nama_customer"
                                        value="{{ $pengiriman->nama_customer }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nomor HP <span
                                            class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" required name="nohp_customer"
                                        value="{{ $pengiriman->nohp_customer }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Alamat Customer <span
                                            class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" required name="alamat_customer"
                                        value="{{ $pengiriman->alamat_customer }}">
                                </div>
                            </div>

                            <b>Data Barang</b>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nomor Resi <span
                                            class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" required name="no_resi"
                                        value="{{ $pengiriman->no_resi }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nama Barang <span
                                            class="text-danger">*</span></label>
                                    <input type="text" disabled class="form-control" required name="nama_barang"
                                        value="{{ $pengiriman->nama_barang }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Berat <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" disabled required name="berat"
                                        value="{{ $pengiriman->berat }}">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Ongkir <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control" disabled required name="ongkir"
                                        value="{{ $pengiriman->ongkir }}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <b>KETERANGAN</b>
                        <span class="float-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Keterangan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Keterangan Resi :
                                                <b>{{ $pengiriman->no_resi }}</b>
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="/admin-jnt/pengiriman/{{ $pengiriman->id }}/keterangan"
                                            method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="waktu" class="form-label">Waktu</label>
                                                    <input type="datetime-local" class="form-control" name="waktu"
                                                        id="waktu">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan"
                                                        id="keterangan">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>
                    <div class="card-body ">
                        <table cellpadding="5">
                            @foreach ($keterangan as $ket)
                                <tr>
                                    <td width="200px">
                                        {{ \Carbon\Carbon::createFromDate($ket->waktu)->format('d M Y H:i') }}</td>
                                    <td>{{ $ket->keterangan }}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

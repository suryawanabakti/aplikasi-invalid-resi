@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12  d-flex justify-content-between">
                                <b>Pengiriman Dengan Nomor Resi : {{ $pengiriman->no_resi }}</b>

                                <!-- Button trigger modal -->
                                @role('customer')
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Laporkan Masalah
                                    </button>
                                @endrole


                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 mb-3">
                                <label for="nama" class="form-label">Nama Customer</label>
                                <input type="text" class="form-control" disabled
                                    value="{{ $pengiriman->nama_customer }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" disabled value="{{ $pengiriman->nama_barang }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Berat</label>
                                <input type="text" class="form-control" disabled value="{{ $pengiriman->berat }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Ongkir</label>
                                <input type="text" class="form-control" disabled
                                    value="{{ number_format($pengiriman->ongkir) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mt-2">
                                    <div class="card-header">
                                        <b>KETERANGAN</b>

                                    </div>
                                    <div class="card-body ">
                                        <table cellpadding="5">
                                            @foreach ($keterangan as $ket)
                                                <tr>
                                                    <td width="200px">
                                                        {{ \Carbon\Carbon::createFromDate($ket->waktu)->format('d M Y H:i') }}
                                                    </td>
                                                    <td>{{ $ket->keterangan }}</td>
                                                </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Laporkan Masalah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/customer/pengiriman/{{ $pengiriman->id }}/keluhan" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan <span class="text-danger">*</span></label>
                            <textarea name="keluhan" id="keluhan" required cols="30" rows="10" class="form-control"
                                placeholder="Masukkan Keluhan Anda..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

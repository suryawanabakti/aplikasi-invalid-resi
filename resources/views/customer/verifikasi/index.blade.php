@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Verifikasi</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hovered" id="myTable">
                            <thead>
                                <tr>

                                    <th>Jenis Barang</th>
                                    <th>No.Resi</th>
                                    <th>Keluhan</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhanKeluhan as $keluhan)
                                    <tr>

                                        <td>{{ $keluhan->pengiriman->nama_barang }}</td>
                                        <td>{{ $keluhan->pengiriman->no_resi }}</td>
                                        <td>{{ $keluhan->keluhan }}</td>
                                        <td>
                                            {{ $keluhan->keterangan }}
                                        </td>
                                        <td>
                                            @if ($keluhan->status_masalah == 'belum selesai')
                                                <span class="badge bg-warning">proses</span>
                                            @endif
                                            @if ($keluhan->status_masalah == 'selesai')
                                                <span class="badge bg-success">selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/customer/verifikasi/terima/{{ $keluhan->id }}"
                                                class="btn btn-sm btn-success"
                                                onclick="return confirm('Apakah anda yakin ?')">Terima</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

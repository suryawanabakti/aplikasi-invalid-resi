@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row ">
            <div class="col-md-12 d-flex justify-content-between">
                <b>Verifikasi</b>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hovered" id="myTable">
                            <thead>
                                <tr>
                                    <th>Nama User</th>
                                    <th>Jenis Barang</th>
                                    <th>No.Resi</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhanKeluhan as $keluhan)
                                    <tr>
                                        <td>{{ $keluhan->user->name }}</td>
                                        <td>{{ $keluhan->pengiriman->nama_barang }}</td>
                                        <td>{{ $keluhan->pengiriman->no_resi }}</td>
                                        <td>{{ $keluhan->keluhan }}</td>
                                        <td>
                                            @if ($keluhan->status_masalah == 'belum selesai')
                                                <span class="badge bg-warning">proses</span>
                                            @endif
                                            @if ($keluhan->status_masalah == 'selesai')
                                                <span class="badge bg-success">selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $keluhan->keterangan }}
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
@push('js')
    <script>
        $('#myTable').DataTable()
    </script>
@endpush

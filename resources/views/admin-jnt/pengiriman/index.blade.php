@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row ">
            <div class="col-md-12 d-flex justify-content-between">
                <b>PENGIRIMAN</b>
                <a class="btn btn-primary mb-2" href="/admin-jnt/pengiriman/create">Tambah Pengiriman</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hovered" id="myTable">
                            <thead>
                                <tr>
                                    <th>No.Resi</th>
                                    <th>Nama Customer</th>
                                    <th>No. Hp</th>
                                    <th>Alamat</th>
                                    <th>Barang</th>
                                    <th>Berat</th>
                                    <th>Ongkir</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengirimanPengiriman as $pengiriman)
                                    <tr>
                                        <td>
                                            <a href="/admin-jnt/pengiriman/{{ $pengiriman->id }}" class="fw-bold text-dark">
                                                {{ $pengiriman->no_resi }}
                                            </a>
                                        </td>
                                        <td>{{ $pengiriman->nama_customer }}</td>
                                        <td>{{ $pengiriman->nohp_customer }}</td>
                                        <td>{{ $pengiriman->alamat_customer }}</td>
                                        <td>{{ $pengiriman->nama_barang }}</td>
                                        <td>{{ $pengiriman->berat }}</td>
                                        <td>{{ $pengiriman->ongkir }}</td>
                                        <td><a class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')"
                                                href="/admin-jnt/pengiriman/{{ $pengiriman->id }}/delete"><i
                                                    class="bx bx-trash"></i></a></td>
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

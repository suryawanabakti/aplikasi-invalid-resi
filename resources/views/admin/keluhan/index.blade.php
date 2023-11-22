@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row ">
            <div class="col-md-12 d-flex justify-content-between">
                <b>Keluhan</b>
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhanKeluhan as $keluhan)
                                    <tr>
                                        <td>{{ $keluhan->user->name }}</td>
                                        <td>{{ $keluhan->pengiriman->nama_barang }}</td>
                                        <td>{{ $keluhan->pengiriman->no_resi }}</td>
                                        <td>{{ $keluhan->keluhan }}</td>
                                        {{-- <td>
                                            @if ($keluhan->status_masalah == 'belum selesai')
                                                <span class="badge bg-warning">proses</span>
                                            @endif
                                            @if ($keluhan->status_masalah == 'selesai')
                                                <span class="badge bg-success">diproses</span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            @if ($keluhan->status_masalah == 'belum selesai')
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $keluhan->id }}">
                                                    Beri Keterangan
                                                </button>
                                            @else
                                                {{ $keluhan->keterangan }}
                                            @endif

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $keluhan->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Penyelesaian
                                                                Masalah
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="/admin/keluhan/{{ $keluhan->id }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="keterangan"
                                                                        class="form-label">Keterangan</label>
                                                                    <select name="keterangan" id="keterangan"
                                                                        class="form-control">
                                                                        <option value="Pesanan di serahkan ke kurir">
                                                                            Pesanan di serahkan ke
                                                                            kurir</option>
                                                                        <option value="Paket tiba dari lokasi transit">
                                                                            Paket tiba dari
                                                                            lokasi transit</option>
                                                                        <option
                                                                            value="Pesanan telah dikirim dari lokasi transit">
                                                                            Pesanan
                                                                            telah dikirim dari lokasi transit</option>
                                                                        <option
                                                                            value="Pesanan telah sampai di lokasi sortir">
                                                                            Pesanan telah
                                                                            sampai di lokasi sortir (Kota pengiriman)
                                                                        </option>
                                                                        <option
                                                                            value="Pesanan sedang di proses di pusat penyortiran">
                                                                            Pesanan sedang di proses di pusat
                                                                            penyortiran (Kota Tujuan)
                                                                        </option>
                                                                        <option
                                                                            value="Pesanan sedang diantar ke alamat tujuan">
                                                                            Pesanan
                                                                            sedang diantar ke alamat tujuan</option>
                                                                        <option value="Pesanan dalam pengiriman">Pesanan
                                                                            dalam pengiriman
                                                                        </option>
                                                                        <option
                                                                            value="Pesanan gagal dikirim karena (sudah melewati pengiriman akan dilakukan ulang esok hari)">
                                                                            Pesanan gagal dikirim karena (sudah melewati
                                                                            pengiriman akan
                                                                            dilakukan ulang esok hari)</option>
                                                                        <option
                                                                            value="Pesanan telah sampai diterima oleh yang bersangkutan">
                                                                            Pesanan telah sampai diterima oleh yang
                                                                            bersangkutan</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Menyelesaikan
                                                                    Masalah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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

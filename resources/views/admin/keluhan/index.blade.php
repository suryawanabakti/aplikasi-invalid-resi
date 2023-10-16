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
                                    <th>No.Resi</th>
                                    <th>Keluhan</th>
                                    <th>Status</th>
                                    <th>Penyelesaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhanKeluhan as $keluhan)
                                    <tr>
                                        <td>{{ $keluhan->pengiriman->no_resi }}</td>
                                        <td>{{ $keluhan->keluhan }}</td>
                                        <td>
                                            @if ($keluhan->status_masalah == 'belum selesai')
                                                <span class="badge bg-warning">{{ $keluhan->status_masalah }}</span>
                                            @endif
                                            @if ($keluhan->status_masalah == 'selesai')
                                                <span class="badge bg-success">{{ $keluhan->status_masalah }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($keluhan->status_masalah == 'belum selesai')
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $keluhan->id }}">
                                                    Penyelesaian Masalah
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
                                                                    <label for=""
                                                                        class="form-label">Keterangan</label>
                                                                    <textarea required name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
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

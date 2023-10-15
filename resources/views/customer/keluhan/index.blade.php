@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Keluhan</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hovered">
                            <thead>
                                <tr>
                                    <th>Nomor Resi</th>
                                    <th>Keluhan</th>
                                    <th>Approve</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhanKeluhan as $keluhan)
                                    <tr>
                                        <td>{{ $keluhan->pengiriman->no_resi }}</td>
                                        <td>{{ $keluhan->keluhan }}</td>
                                        <td>
                                            @if ($keluhan->approve == 'proses')
                                                <span class="badge bg-warning"> {{ $keluhan->approve }}</span>
                                            @endif
                                            @if ($keluhan->approve == 'terima')
                                                <span class="badge bg-success"> {{ $keluhan->approve }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-sm">Batalkan</a>
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

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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keluhanKeluhan as $keluhan)
                                    <tr>
                                        <td>{{ $keluhan->pengiriman->no_resi }}</td>
                                        <td>{{ $keluhan->keluhan }}</td>
                                        <td>
                                            @if ($keluhan->approve == 'terima')
                                                <span class="badge bg-success">
                                                    {{ $keluhan->approve }}
                                                </span>
                                            @endif
                                            @if ($keluhan->approve == 'tolak')
                                                <span class="badge bg-danger">
                                                    {{ $keluhan->approve }}
                                                </span>
                                            @endif
                                            @if ($keluhan->approve == 'proses')
                                                <span class="badge bg-warning">
                                                    {{ $keluhan->approve }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($keluhan->approve == 'proses')
                                                <a onclick="return confirm('Apakah anda yakin ?')"
                                                    href="/admin-jnt/keluhan/{{ $keluhan->id }}/terima"
                                                    class="btn btn-success btn-sm">terima</a>
                                                <a onclick="return confirm('Apakah anda yakin ?')"
                                                    href="/admin-jnt/keluhan/{{ $keluhan->id }}/tolak"
                                                    class="btn btn-danger btn-sm">tolak</a>
                                            @endif

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

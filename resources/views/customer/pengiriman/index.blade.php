@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pengiriman</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/customer/pengiriman" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="no_resi" class="form-label">Cari Nomor Resi <span
                                        class="text-danger">*</span></label>
                                <input type="text" required class="form-control" id="no_resi" name="no_resi"
                                    placeholder="...">
                            </div>
                            <button class="btn btn-primary btn-icon"><i class='bx bx-search-alt-2'></i> </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection

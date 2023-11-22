@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Pengajuan</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/customer/pengajuan" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="no_resi" class="form-label">Nomor Resi <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="no_resi"
                                        placeholder="masukkan nomor resi">
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan" class="form-label">Keluhan <span
                                            class="text-danger">*</span></label>
                                    <textarea name="keluhan" id="keluhan" required cols="30" rows="8" class="form-control"
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
        </div>



    </div>
@endsection

@empty($user)
    <div id="modal-delete" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/user') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div class="modal-header">
        <h5 class="modal-title">Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table-sm table-bordered table-striped">
            <tr>
                <th class="text-right col-3">Nama :</th>
                <td class="col-9">{{ $user->nama }}</td>
            </tr>
            <tr>
                <th class="text-right col-3">Level Pengguna :</th>
                <td class="col-9">{{ $user->level->level_nama }}</td>
            </tr>
            <tr>
                <th class="text-right col-3">Username :</th>
                <td class="col-9">{{ $user->username }}</td>
            </tr>
            <tr>
                <th class="text-right col-3">Password :</th>
                <td class="col-9">********</td>
            </tr>
        </table>
    <div class="modal-footer">
        <button onclick="modalAction('{{ url('/user/' . $user->user_id . '/edit_ajax') }}')" 
            class="btn btn-success btn-sm">Edit
        </button>
        <button type="button" data-dismiss="modal" class="btn btn-primary btn-sm">Close</button>
    </div>
@endempty
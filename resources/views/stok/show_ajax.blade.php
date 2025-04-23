@empty($stok)
    <div id="mymodal" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                    Data yang anda cari tidak ditemukan
                </div>
                <a href="{{ url('/stok') }}" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
@else
    <div id="mymodal" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-bordered table-striped">
                    <tr>
                        <th class="text-left col-3">ID Stok :</th>
                        <td class="col-9">{{ $stok->stock_id }}</td>
                    </tr>
                    <tr>
                        <th class="text-left col-3">Supplier :</th>
                        <td class="col-9">{{ $stok->supplier->supplier_nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-left col-3">Barang :</th>
                        <td class="col-9">{{ $stok->barang->barang_nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-left col-3">User :</th>
                        <td class="col-9">{{ $stok->user->nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-left col-3">Tanggal :</th>
                        <td class="col-9">{{ $stok->stock_tanggal }}</td>
                    </tr>
                    <tr>
                        <th class="text-left col-3">Jumlah :</th>
                        <td class="col-9">{{ $stok->stock_jumlah }}</td>
                    </tr>
                </table>
                <div class="modal-footer">
                    <button onclick="modalAction('{{ url('/stok/' . $stok->stock_id . '/edit_ajax') }}')"
                        class="btn btn-success btn-sm">Edit
                    </button>
                    <button type="button" data-dismiss="modal" class="btn btn-primary btn-sm">Close</button>
                </div>

            </div>
        </div>
    </div>
@endempty

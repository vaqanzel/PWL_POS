@extends('layouts.template')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Barang</h3>
            <div class="card-tools">
                <button onclick="modalAction('{{ url('/barang/import') }}')" class="btn btn-sm btn-info mt-1">Import
                    Barang</button>
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
                <button onclick="modalAction('{{ url('/barang/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah
                    Ajax</button>
            </div>
        </div>

        <div class="card-body">
            <!-- Filter Data -->
            <div id="filter" class="form-horizontal filter-date p-2 border-bottom mb-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-group-sm row text-sm mb-0">
                            <label for="filter_kategori" class="col-md-1 col-form-label">Filter</label>
                            <div class="col-md-3">
                                <select name="filter_kategori" class="form-control form-control-sm filter_kategori">
                                    <option value="">- Semua -</option>
                                    @foreach($kategori as $l)
                                        <option value="{{ $l->kategori_id }}">{{ $l->kategori_nama }}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Kategori Barang</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- Filter --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-4">
                            <select class="form-control" id="kategori_id" name="kategori_id">
                                <option value="">- Semua Kategori -</option>
                                @foreach($kategori as $item)
                                    <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Kategori Barang</small>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Kategori</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="modal-crud" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
        data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content"></div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function modalAction(url) {
            $("#modal-crud .modal-content").html("");
            $.get(url, function (response) {
                $("#modal-crud .modal-content").html(response);
                $("#modal-crud").modal("show");
            });
        }
        $('#modal-crud').on('hidden.bs.modal', function () {
            $("#modal-crud .modal-content").html("");
        });

        var dataBarang
        $(document).ready(function () {
            dataBarang = $('#table_barang').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('barang/list') }}",
                    type: "POST",
                    data: function (d) {
                        d.kategori_id = $('#kategori_id').val();
                    }
                },
                columns: [
                    { data: "barang_id", className: "text-center", orderable: true, searchable: false },
                    { data: "barang_nama", className: "", orderable: true, searchable: true },
                    { data: "barang_kode", className: "", orderable: true, searchable: true },
                    { data: "kategori.kategori_nama", className: "", orderable: true, searchable: true },
                    { data: "harga_beli", className: "text-right", orderable: true, searchable: false },
                    { data: "harga_jual", className: "text-right", orderable: true, searchable: false },
                    { data: "aksi", className: "text-center", orderable: false, searchable: false }
                ]
            });

            $('#kategori_id').on('change', function () {
                dataBarang.ajax.reload();
            });
        });
    </script>
@endpush
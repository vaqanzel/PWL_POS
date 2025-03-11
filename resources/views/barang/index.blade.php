@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
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
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            var dataBarang = $('#table_barang').DataTable({
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
<form action="{{ url('/register') }}" method="POST" id="form-tambah">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Level Pengguna</label>
            <select name="level_id" id="level_id" class="form-control" required>
                <option value="">- Pilih Level -</option>
                @foreach($level as $l)
                    <option value="{{ $l->level_id }}">{{ $l->level_nama }}</option>
                @endforeach
            </select>
            <small id="error-level_id" class="error-text form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
            <small id="error-username" class="error-text form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
            <small id="error-nama" class="error-text form-text text-danger"></small>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            <small id="error-password" class="error-text form-text text-danger"></small>
        </div>
        <p class="text-muted small">
            Already have an account?
            <a data-dismiss="modal" class="fw-medium text-primary text-decoration-underline">Login here</a>
        </p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>

<script>
    $(document).ready(function () {
        $("#form-tambah").validate({
            rules: {
                level_id: { required: true, number: true },
                username: { required: true, minlength: 3, maxlength: 20 },
                nama: { required: true, minlength: 3, maxlength: 100 },
                password: { required: true, minlength: 6, maxlength: 20 }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        if (response.status) {
                            $('#modal-register').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function (prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
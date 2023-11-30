<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="form" method="post" action="/user/update/<?= $id_users ?>" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    <?= csrf_field() ?>
                    <!-- Nama -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="nd">Nama Depan</label>
                                <input type="text" id="nd" class="form-control" name="namadepan" value="<?= $nama_depan ?>" />
                                <div class="invalid-feedback" id="errornd"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="nb">Nama Belakang</label>
                                <input type="text" id="nb" class="form-control" name="namabelakang" value="<?= $nama_belakang ?>" />
                                <div class="invalid-feedback" id="errornb"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="4" name="alamat"><?= $alamat ?></textarea>
                    </div>

                    <!-- TTL -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" value="<?= $tempat_lahir ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="<?= $tanggal_lahir ?>" />
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="mx-0 mx-sm-auto mb-4">

                        <div class="d-inline mx-3">
                            Jenis Kelamin :
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="laki">Laki-Laki</label>
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" <?= $jenis_kelamin == 'Laki-laki' ? 'checked' : ''; ?> />
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" <?= $jenis_kelamin == 'Perempuan' ? 'checked' : ''; ?> />
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="telepon">Telepon</label>
                        <input type="number" id="telepon" class="form-control" name="telepon" value="<?= $telepon ?>" />
                    </div>

                    <!-- Email input -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" value="<?= $email ?>" />
                    </div>


                    <!--Avatar-->
                    <div class="mx-0 mx-sm-auto mb-4">
                        <div class="d-inline mx-3">
                            Avatar :
                        </div>
                        <label class="form-label" for="avatar"></label>
                        <input type="file" id="avatar" class="form-control" name="avatar" />
                        <input type="hidden" id="avalama" name="avalama" value="<?= $avatar ?>" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#submit').attr('disable', 'disabled');
                    $('#submit').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('#submit').removeAttr('disable');
                    $('#submit').html('Update Data');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.namadepan) {
                            $('#nd').addClass('is-invalid');
                            $('#errornd').html(response.error.namadepan);
                        } else {
                            $('#nd').removeClass('is-invalid');
                            $('#errornd').html('');
                        }

                        if (response.error.namabelakang) {
                            $('#nb').addClass('is-invalid');
                            $('#errornb').html(response.error.namabelakang);
                        } else {
                            $('#nb').removeClass('is-invalid');
                            $('#errornb').html('');
                        }
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        $('#editmodal').modal('hide');
                        tampilkan();
                    }

                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#datatabel').DataTable();
    });
</script>
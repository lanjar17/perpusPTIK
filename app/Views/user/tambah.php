<div class="modal fade" id="anggotamodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="form" method="POST" action="/insertuser" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <!-- Nama -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="nd">Nama Depan</label>
                                <input type="text" id="nd" class="form-control" name="namadepan" />
                                <div class="invalid-feedback" id="errornd"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="nb">Nama Belakang</label>
                                <input type="text" id="nb" class="form-control" name="namabelakang" />
                                <div class="invalid-feedback" id="errornb"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" rows="4" name="alamat"></textarea>
                    </div>

                    <!-- TTL -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-label">
                                <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" />
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
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" />
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" />
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="telepon">Telepon</label>
                        <input type="number" id="telepon" class="form-control" name="telepon" />
                    </div>

                    <!-- Email input -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" />
                    </div>

                    <!-- Username input -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" id="username" class="form-control" name="username" />
                        <div class="invalid-feedback" id="errorusername"></div>
                    </div>

                    <!-- Password -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" />
                        <div class="invalid-feedback" id="errorpassword"></div>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="form-label mb-4">
                        <label class="form-label" for="conpass">Konfirmasi Password</label>
                        <input type="password" id="conpass" class="form-control" name="conpass" />
                        <div class="invalid-feedback" id="errorconpass"></div>
                    </div>

                    <!--Avatar-->
                    <div class="mx-0 mx-sm-auto mb-4">
                        <div class="d-inline mx-3">
                            Avatar :
                        </div>
                        <label class="form-label" for="avatar"></label>
                        <input type="file" id="avatar" class="form-control" name="avatar" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Tambah Data</button>
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

                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('#errorusername').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#errorusername').html('');
                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('#errorpassword').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#errorpassword').html('');
                        }

                        if (response.error.conpass) {
                            $('#conpass').addClass('is-invalid');
                            $('#errorconpass').html(response.error.conpass);
                        } else {
                            $('#conpass').removeClass('is-invalid');
                            $('#errorconpass').html('');
                        }
                    } else {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        $('#anggotamodal').modal('hide');
                        tampilkan();
                    }

                }
            });
        });
    })


    // $(document).ready(function() {
    //     $('#form').submit(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             type: $(this).attr('method'),
    //             url: $(this).attr('action'),
    //             data: new FormData(this),
    //             processData: false,
    //             contentType: false,
    //             success: function(response) {
    //                 if (response.error) {
    //                     if (response.error.namadepan) {
    //                         $('#nd').addClass('is-invalid');
    //                         $('#errornd').html(response.error.namadepan);
    //                     } else {
    //                         $('#nd').removeClass('is-invalid');
    //                         $('#errornd').html('');
    //                     }

    //                     if (response.error.namabelakang) {
    //                         $('#nb').addClass('is-invalid');
    //                         $('#errornb').html(response.error.namabelakang);
    //                     } else {
    //                         $('#nb').removeClass('is-invalid');
    //                         $('#errornb').html('');
    //                     }
    //                 } else {
    //                     Swal.fire({
    //                         title: 'Berhasil!',
    //                         text: response.sukses,
    //                         icon: 'success',
    //                         confirmButtonText: 'Ok'
    //                     })
    //                     $('#anggotammodal').modal('hide');
    //                     tampilkan();
    //                 }
    //             },
    //         });
    //     });
    // });
</script>
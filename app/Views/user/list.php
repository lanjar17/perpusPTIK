<a id="tambah" class="btn btn-success btn-rounded mb-3" href="#">Tambah Anggota AJAX</a>
<table id="datatabel" class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Username</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <?php
    $no = 1;
    foreach ($list as $item) { ?>
        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><img src="/img/avatar/<?= $item['avatar'] ?>" alt="" width="100px"></td>
                <td><?= $item['username'] ?> </td>
                <td><?= $item['email'] ?> </td>
                <td>
                    <a class="btn btn-success btn-rounded" href="<?= base_url('user/' . $item['username']); ?>">Detail</a>
                    <p></p>
                    <a class="btn btn-danger btn-rounded" href="<?= base_url('user/' . $item['username']); ?>">Hapus</a>
                </td>
            </tr>
        </tbody>

    <?php } ?>
</table>




<script>
    $(document).ready(function() {
        $('#datatabel').DataTable();
    });

    $('#tambah').click(function(e) {
        e.preventDefault();
        $('#anggotamodal').modal('show');
    });

    $('#form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            processData: false,
            contentType: false,
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
                    $('#anggotamodal').modal('hide');
                    tampilkan();
                }

            }
        });


    });
</script>
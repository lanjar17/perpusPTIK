<?php echo $this->extend('layout/main'); ?>

<?php echo $this->section('container'); ?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <div class="alert alert-primary" role="alert">
            <h1>Selamat Datang di Website Perpustakaan PTIK</h1>
        </div>
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong><strong><?php echo $item['nama'] ?></strong></strong></h5>
                </div>
                <?php if (session()->getflashdata('sukses') != '') { ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getflashdata('sukses'); ?>
                    </div>
                <?php } ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col col-8">
                            <table class="table table-striped">

                                <tr>
                                    <th>Nama</th>
                                    <td><?= $item['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td><?= $item['username'] ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= $item['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td><?= $item['tempat_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><?= $item['tanggal_lahir'] ?></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><?= $item['jenis_kelamin'] ?></td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td><?= $item['telepon'] ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $item['email'] ?></td>
                                </tr>


                                <!-- <tr>
                                    <th>Nama</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td></td>
                                </tr> -->
                            </table>
                        </div>

                        <div class="col col-4">
                            <div class="card text-center">
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                    <img src="/img/avatar/<?= $item['avatar'] ?>" class="img-fluid" width="250px">
                                    <a href="">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#!" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger" onclick="hapus(<?php echo $item['id_users'] ?>)" id="delete">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- Section: Main chart -->
    </div>
</main>


<script>
    function hapus(id_users) {
        Swal.fire({
            title: 'Hapus Data',
            text: "Apakah Anda yakin menghapus data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "delete",
                    url: "<?= base_url('/user/delete/') ?>" + id_users,
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: response.sukses,
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        })
                        tampilkan();
                    }
                });
            }
        })
    }
</script>
<?php echo $this->endSection(); ?>
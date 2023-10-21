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
                    <h5 class="mb-0 text-center"><strong>Nama Mahasiswa</strong></h5>
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
                                    <img src="/img/<?= $item['avatar'] ?>" class="img-fluid" width="250px">
                                    <a href="">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#!" class="btn btn-warning">Button</a>
                                    <a href="#!" class="btn btn-danger">Button</a>
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
<?php echo $this->endSection(); ?>
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
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>IPK</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($mahasiswa as $mhs) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $mhs['nama'] ?></td>
                                <td><?php echo $mhs['nim'] ?></td>
                                <td><?php echo $mhs['ipk'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->
    </div>
</main>
<?php echo $this->endSection(); ?>
<?php echo $this->extend('layout/main'); ?>

<?php echo $this->section('container'); ?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Daftar Buku</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>pengarang</th>
                            <th>Penerbit</th>
                            <th>Cover</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($list as $buku) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $buku['judul'] ?></td>
                                <td><?php echo $buku['pengarang'] ?></td>
                                <td><?php echo $buku['penerbit'] ?></td>
                                <td><img src="/img/<?= $buku['foto'] ?>" alt="" width="100px"></td>
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
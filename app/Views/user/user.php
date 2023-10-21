<?php echo $this->extend('layout/main'); ?>

<?php echo $this->section('container'); ?>
<div id="viewmodal" style="display:none">

</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<main style="margin-top: 58px">
    <?php if (session()->getflashdata('sukses') != '') { ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getflashdata('sukses'); ?>
        </div>
    <?php } ?>
    <div class="container pt-4">
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Nama Mahasiswa</strong></h5>
                </div>
                <div class="card-body">
                    <h1>Daftar Anggota</h1>
                    <a class="btn btn-success btn-rounded mb-3" href="user/create">Tambah Anggota</a>



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
                                        <a class="btn btn-success" href="<?= base_url('user/' . $item['username']); ?>">Detail</a> <p></p>
                                        <a class="btn btn-danger" href="<?= base_url('user/' . $item['username']); ?>">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>

                        <?php } ?>
                    </table>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->
    </div>
</main>

<script>
    $(document).ready(function() {
        $('#datatabel').DataTable();
    });
</script>
<?php echo $this->endSection(); ?>
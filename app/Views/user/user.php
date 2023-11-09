<?php echo $this->extend('layout/main'); ?>

<?php echo $this->section('container'); ?>

</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<main style="margin-top: 58px">

    <div class="container pt-4">
        <div id="viewmodal">
            <?php echo $this->include('user/tambah'); ?>
        </div>
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Nama Mahasiswa</strong></h5>
                </div>
                <div class="card-body">
                    <?php if (session()->getflashdata('sukses') != '') { ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getflashdata('sukses'); ?>
                        </div>
                    <?php } ?>
                    <h1>Daftar Anggota</h1>
                    <!-- <a class="btn btn-success btn-rounded mb-3" href="user/create">Tambah Anggota</a> -->

                    <div id="viewdata"></div>




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

<script>
    function tampilkan() {
        $.ajax({
            url: "<?= base_url('/user/data') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewdata').html(response.data);
            }
        });
    }
    $(document).ready(function() {
        tampilkan();
    });
</script>



<?php echo $this->endSection(); ?>
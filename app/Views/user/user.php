<?php echo $this->extend('layout/main'); ?>

<?php echo $this->section('container'); ?>

</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<main style="margin-top: 58px">

    <div class="container pt-4">
        <div id="viewmodal">
            <!-- diisi dengan modal -->
        </div>
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="mb-0 text-center"><strong>Nama Mahasiswa</strong></h5>
                </div>
                <div class="card-body">
                    <h1>Daftar Anggota</h1>
                    <a id="tambah" class="btn btn-success btn-rounded mb-3" href="#" onclick="tambah()">Tambah Anggota AJAX</a>
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
                $('#viewdata').html('');
                $('#viewdata').html(response.data);
            }
        });
    }

    function edit(id_users) {
        $.ajax({
            url: "<?= base_url('/user/edit/') ?>" + id_users,
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#editmodal').modal('show');
            }
        });
    }

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

    function tambah() {
        $.ajax({
            url: "<?= base_url('/user/tambah') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#anggotamodal').modal('show');
            }
        });

    };


    $(document).ready(function() {
        tampilkan();
    });
</script>



<?php echo $this->endSection(); ?>
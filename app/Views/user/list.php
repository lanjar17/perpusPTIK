<!-- <a id="tambah" class="btn btn-success btn-rounded mb-3" href="#">Tambah Anggota AJAX</a> -->
<table id="datatabel" class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Telepon</th>
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
                <td><?= $item['nama'] ?> </td>
                <td><?= $item['username'] ?> </td>
                <td><?= $item['email'] ?> </td>
                <td><?= $item['telepon'] ?> </td>
                <td>
                    <a class="btn btn-success btn-rounded" href="<?= base_url('/user/' . $item['id_users']); ?>">Detail</a>
                    <a class="btn btn-info btn-rounded" href="#" id="edit" onclick="edit(<?= $item['id_users'] ?>)">Edit</a>
                    <a class="btn btn-danger btn-rounded" href="#" onclick="hapus(<?php echo $item['id_users'] ?>)" id="delete">Hapus</a>


                </td>
            </tr>
        </tbody>

    <?php } ?>
</table>

<!-- 
<script>
    // $('#tambah').click(function(e) {
    //     e.preventDefault();
    //     $('#anggotamodal').modal('show');
    // });

    
</script> -->
<script>
    new DataTable('#datatabel');
</script>
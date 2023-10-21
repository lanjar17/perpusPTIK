

<table id="datatabel" class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Username</th>
            <th>Email</th>
            <th>Detail</th>
        </tr>
    </thead>

    <?php
    $no = 1;
    foreach ($list as $item) { ?>
        <tbody>
            <tr>
                <td><?= $no++ ?></td>
                <td><img src="/img/<?= $item['avatar'] ?>" alt="" width="100px"></td>
                <td><?= $item['username'] ?> </td>
                <td><?= $item['email'] ?> </td>
                <td><a class="btn btn-success" href="<?= base_url('user/' . $item['username']); ?>">Detail</a></td>
            </tr>
        </tbody>

    <?php } ?>
</table>


<script>
    $(document).ready(function() {
        $('#datatabel').DataTable();
    });
</script>


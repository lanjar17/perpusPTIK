<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Perpustakaan PTIK</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href=<?php echo base_url('css/mdb.min.css'); ?> />
    <!-- Custom styles -->
    <link rel="stylesheet" href=<?php echo base_url('css/admin.css'); ?> />
    <link rel="stylesheet" type="text/css" href=<?php base_url('datatables/datatables.min.css'); ?> />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- <?php if ($menu == 'halUser') { ?>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" href=<?= base_url('/node_modules/sweetalert2/dist/sweetalert2.min.css') ?>>

    <?php } ?> -->

    <?php if ($menu == 'halBuku') { ?>
        <?php
        foreach ($css_files as $file) : ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>

    <?php } ?>
</head>

<body>
    <!--Main Navigation-->
    <?php echo $this->include('layout/navigation'); ?>
    <!--Main Navigation-->

    <!--Main layout-->
    <?php echo $this->renderSection('container'); ?>
    <!--Main layout-->
    <!-- MDB -->
    <script type="text/javascript" src=<?php echo base_url('js/mdb.min.js') ?>></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src=<?php echo base_url('js/admin.js') ?>></script>
    <script type="text/javascript" src=<?php echo base_url('datatables/js/jquery.dataTables.js') ?>></script>
    <script type="text/javascript" src=<?php echo base_url('datatables/datatables.min.js') ?>></script>
    <script type="text/javascript" src="<?= base_url('datatables/datatables.min.js'); ?>"></script>





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

</body>

</html>
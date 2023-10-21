<?php echo $this->extend('layout/main'); ?>

<?php echo $this->section('container'); ?>
<main style="margin-top: 58px">
    <div class="container pt-4">
        <section class="mb-4">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0 text-center"><strong>Nama Mahasiswa</strong></h6>
                </div>
                <div class="card-body">
                    <h1>Daftar Anggota</h1>
                    <form method="POST" action="/insertuser" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <!-- Nama -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="namadepan" class="form-control" name="namadepan" />
                                    <label class="form-label" for="namadepan">Nama Depan</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="namabelakang" class="form-control" name="namabelakang" />
                                    <label class="form-label" for="namabelakang">Nama Belakang</label>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="alamat" rows="4" name="alamat"></textarea>
                            <label class="form-label" for="alamat">Alamat</label>
                        </div>

                        <!-- TTL -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir" />
                                    <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" />
                                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                </div>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mx-0 mx-sm-auto mb-4">

                            <div class="d-inline mx-3">
                                Jenis Kelamin :
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="laki-laki" />
                                <label class="form-check-label" for="laki">Laki-Laki</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="perempuan" />
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="form-outline mb-4">
                            <input type="number" id="telepon" class="form-control" name="telepon" />
                            <label class="form-label" for="telepon">Telepon</label>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="email" class="form-control" name="email" />
                            <label class="form-label" for="email">Email</label>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="username" class="form-control" name="username" />
                            <label class="form-label" for="username">Username</label>
                        </div>

                        <!-- Password -->
                        <div class="form-outline mb-4">
                            <input type="password" id="password" class="form-control" name="password" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <!--Avatar-->
                        <div class="mx-0 mx-sm-auto mb-4">
                            <div class="d-inline mx-3">
                                Avatar :
                            </div>
                            <input type="file" id="avatar" class="form-control" name="avatar" />
                            <label class="form-label" for="avatar"></label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Tambah Data</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- Section: Main chart -->
    </div>
</main>





<?php echo $this->endSection(); ?>
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<style>
    .image-container {
        cursor: pointer;
    }

    .image-container img {
        transition: filter 0.3s ease, opacity 0.3s ease;
    }

    .image-container:hover img {
        filter: brightness(70%);
        /* Redupkan gambar */
    }
</style>

<div class="container my-2">
    <form action="<?= base_url('admin/data_pegawai/update/' . $pegawai['id']); ?>" method="post" enctype="multipart/form-data">
        <div class="card shadow-lg border-0 profile-card">
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="image-container">
                            <img src="<?= base_url('profile/' . session()->get('foto_pegawai')); ?>" alt="Foto Profil"
                                class="img-thumbnail  mb-3 profile-img" id="profileImage">
                            <p class="text-muted fst-italic">Klik foto untuk mengedit</p>

                        </div>

                    </div>

                    <div class="col-md-8">

                        <input type="hidden" value="<?= $pegawai['foto_pegawai']; ?>" name="foto_lama">


                        <input type="file" id="foto_pegawai" name="foto_pegawai" hidden>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $pegawai['nama']; ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" value="<?= $pegawai['username']; ?>" class="<?= ($validation->hasError('username')) ? 'is-invalid' : '' ?> form-control" placeholder="Username" name="username" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : '' ?>">
                                        <option value="">--Pilih Jenis Kelamin</option>
                                        <option <?php if ($pegawai['jenis_kelamin'] == 'laki-laki') {
                                                    echo 'selected';
                                                } ?> value="laki-laki">Laki-laki</option>
                                        <option <?php if ($pegawai['jenis_kelamin'] == 'perempuan') {
                                                    echo 'selected';
                                                } ?> value="perempuan">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('jenis_kelamin'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Password</label>
                                    <input type="hidden" value="<?= $pegawai['password']; ?>" name="password_lama">
                                    <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> form-control" placeholder="Password" name="password" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label>Role</label>
                                    <select name="role" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : '' ?>">
                                        <option <?php if ($pegawai['role'] == 'Admin') {
                                                    echo 'selected';
                                                } ?> value="Admin">Admin</option>
                                        <option <?php if ($pegawai['role'] == 'Pegawai') {
                                                    echo 'selected';
                                                } ?> value="Pegawai">Pegawai</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('role'); ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                                    <input type="number" value="<?= $pegawai['no_hp']; ?>" class="<?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?> form-control" placeholder="Nomor Handphone" name="no_hp" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_hp'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi_presensi" class="form-label">Lokasi Presensi</label>
                                    <select name="lokasi_presensi" class="form-control <?= ($validation->hasError('lokasi_presensi')) ? 'is-invalid' : '' ?>">
                                        <option value="<?= $pegawai['lokasi_presensi']; ?>"><?= $pegawai['lokasi_presensi']; ?></option>
                                        <?php foreach ($lokasi_presensi as $lok) :  ?>
                                            <option value="<?= $lok['id']; ?>"><?= $lok['nama_lokasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('lokasi_presensi'); ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="jabatan" class="form-label">Jabatan</label>
                                        <select name="jabatan" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?>">
                                            <option value="<?= $pegawai['jabatan']; ?>"><?= $pegawai['jabatan']; ?></option>
                                            <?php foreach ($jabatan as $jab) :  ?>
                                                <option value="<?= $jab['jabatan']; ?>"><?= $jab['jabatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jabatan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="<?= ($validation->hasError('konfirmasi_password')) ? 'is-invalid' : '' ?> form-control" placeholder="Konfirmasi Password" name="konfirmasi_password" />
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('konfirmasi_password'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea name="alamat" id="alamat" name="alamat" class="form-control"><?= $pegawai['alamat']; ?></textarea>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="li li-check"></i> Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    // Dapatkan elemen gambar dan input file
    const profileImage = document.getElementById('profileImage');
    const fileInput = document.getElementById('foto_pegawai');

    // Tambahkan event listener saat gambar diklik
    profileImage.addEventListener('click', function() {
        // Picu event klik pada input file yang tersembunyi
        fileInput.click();
    });

    // Opsional: Menambahkan preview gambar
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?= $this->endSection() ?>
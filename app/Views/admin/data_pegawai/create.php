<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="card col-md-6">
    <div class="card-body">
        <form method="POST" action="<?= base_url('admin/data_pegawai/store'); ?>" enctype="multipart/form-data">
            <div class="input-style-1">
                <label>Nama Pegawai</label>
                <input type="text" class="<?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?> form-control" placeholder="Nama Pegawai" name="nama" />
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Jenis Kelamin</label>
                <select name="role" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : '' ?>">
                    <option value="">--Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('role'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Alamat Pegawai</label>
                <textarea name="alamat" id="" class="<?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?> form-control" placeholder="Alamat"></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Nomor Handphone</label>
                <input type="number" class="<?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?> form-control" placeholder="Nomor Handphone" name="no_hp" />
                <div class="invalid-feedback">
                    <?= $validation->getError('no_hp'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Jabatan</label>
                <select name="jabatan" class="form-control <?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?>">
                    <option value="">--Pilih Jabatan</option>
                    <?php foreach ($jabatan as $jab) :  ?>
                        <option value="<?= $jab['jabatan']; ?>"><?= $jab['jabatan']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('jabatan'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Lokasi Presensi</label>
                <select name="lokasi_presensi" class="form-control <?= ($validation->hasError('lokasi_presensi')) ? 'is-invalid' : '' ?>">
                    <option value="">--Pilih Lokasi Presensi</option>
                    <?php foreach ($lokasi_presensi as $lok) :  ?>
                        <option value="<?= $lok['id']; ?>"><?= $lok['nama_lokasi']; ?></option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('lokasi_presensi'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Foto</label>
                <input type="file" class="<?= ($validation->hasError('foto_pegawai')) ? 'is-invalid' : '' ?> form-control" placeholder="Latitude" name="foto_pegawai" />
                <div class="invalid-feedback">
                    <?= $validation->getError('foto_pegawai'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Username</label>
                <input type="text" class="<?= ($validation->hasError('username')) ? 'is-invalid' : '' ?> form-control" placeholder="Username" name="username" />
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Password</label>
                <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> form-control" placeholder="Password" name="password" />
                <div class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Konfirmasi Password</label>
                <input type="password" class="<?= ($validation->hasError('konfirmasi_password')) ? 'is-invalid' : '' ?> form-control" placeholder="Konfirmasi Password" name="konfirmasi_password" />
                <div class="invalid-feedback">
                    <?= $validation->getError('konfirmasi_password'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Role</label>
                <select name="jenis_kelamin" class="form-control <?= ($validation->hasError('role')) ? 'is-invalid' : '' ?>">
                    <option value="">--Pilih Role</option>
                    <?php foreach ($role as $r) : ?>
                        <option value="<?= $r['id']; ?>" <?= old('role') == $r['id'] ? 'selected' : '' ?>>
                            <?= $r['role']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('role'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
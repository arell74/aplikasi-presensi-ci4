<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="card col-md-6">
    <div class="card-body">
        <form method="POST" action="<?= base_url('admin/lokasi_presensi/update/' . $lokasi_presensi['id']); ?>">
            <div class="input-style-1">
                <label>Nama Lokasi</label>
                <input type="text" class="<?= ($validation->hasError('nama_lokasi')) ? 'is-invalid' : '' ?> form-control" placeholder="Nama Lokasi" name="nama_lokasi" value="<?= $lokasi_presensi['nama_lokasi']; ?>" />
                <div class="invalid-feedback">
                    <?= $validation->getError('nama_lokasi'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Alamat Lokasi</label>
                <textarea name="alamat_lokasi" id="" class="<?= ($validation->hasError('alamat_lokasi')) ? 'is-invalid' : ''; ?> form-control" placeholder="Alamat Lokasi"><?= $lokasi_presensi['alamat_lokasi']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat_lokasi'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Tipe Lokasi</label>
                <input type="text" value="<?= $lokasi_presensi['tipe_lokasi']; ?>" class="<?= ($validation->hasError('tipe_lokasi')) ? 'is-invalid' : '' ?> form-control" placeholder="Tipe Lokasi" name="tipe_lokasi" />
                <div class="invalid-feedback">
                    <?= $validation->getError('tipe_lokasi'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>latitude</label>
                <input type="text" value="<?= $lokasi_presensi['latitude']; ?>" class="<?= ($validation->hasError('latitude')) ? 'is-invalid' : '' ?> form-control" placeholder="Latitude" name="latitude" />
                <div class="invalid-feedback">
                    <?= $validation->getError('latitude'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Longitude</label>
                <input type="text" value="<?= $lokasi_presensi['longitude']; ?>" class="<?= ($validation->hasError('longitude')) ? 'is-invalid' : '' ?> form-control" placeholder="Longitude" name="longitude" />
                <div class="invalid-feedback">
                    <?= $validation->getError('longitude'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Radius</label>
                <input type="number" value="<?= $lokasi_presensi['radius']; ?>" class="<?= ($validation->hasError('radius')) ? 'is-invalid' : '' ?> form-control" placeholder="Radius" name="radius" />
                <div class="invalid-feedback">
                    <?= $validation->getError('radius'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Zona Waktu</label>
                <select name="zona_waktu" class="form-control <?= ($validation->hasError('zona_waktu')) ? 'is-invalid' : '' ?>">
                    <option value="">--Pilih Zona Waktu</option>
                    <option <?php if($lokasi_presensi['zona_waktu'] == 'WIB') {echo 'selected';}  ?> value="WIB">WIB</option>
                    <option <?php if($lokasi_presensi['zona_waktu'] == 'WITA') {echo 'selected';} ?> value="WITA">WITA</option>
                    <option <?php if($lokasi_presensi['zona_waktu'] == 'WIT') {echo 'selected';} ?> value="WIT">WIT</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('zona_waktu'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Jam Masuk</label>
                <input type="time" value="<?= $lokasi_presensi['jam_masuk']; ?>" class="<?= ($validation->hasError('jam_masuk')) ? 'is-invalid' : '' ?> form-control" placeholder="Jam Masuk" name="jam_masuk" />
                <div class="invalid-feedback">
                    <?= $validation->getError('jam_masuk'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Jam Pulang</label>
                <input type="time" value="<?= $lokasi_presensi['jam_masuk']; ?>" class="<?= ($validation->hasError('jam_pulang')) ? 'is-invalid' : '' ?> form-control" placeholder="Jam Pulang" name="jam_pulang" />
                <div class="invalid-feedback">
                    <?= $validation->getError('jam_pulang'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('pegawai/layout') ?>

<?= $this->section('content') ?>

<div class="card col-md-6">
    <div class="card-body">
        <form method="POST" action="<?= base_url('pegawai/ketidakhadiran/update/' . $ketidakhadiran['id']); ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="input-style-1">
                <label>Keterangan</label>
                <select name="keterangan" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>">
                    <option value="">--Pilih Keterangan</option>
                    <option <?php if ($ketidakhadiran['keterangan'] == 'Izin') {
                                echo 'selected';
                            } ?> value="Izin">Izin</option>
                    <option <?php if ($ketidakhadiran['keterangan'] == 'Sakit') {
                                echo 'selected';
                            } ?> value="Sakit">Sakit</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('keterangan'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Tanggal</label>
                <input type="date" value="<?= $ketidakhadiran['tanggal']; ?>" class="<?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?> form-control" name="tanggal" />
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Deskripsi</label>
                <textarea name="deskripsi" id="" class="<?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?> form-control" placeholder="Deskripsi"><?= $ketidakhadiran['deskripsi']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('deskripsi'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>File</label>
                <input type="hidden" value="<?= $ketidakhadiran['file']; ?>" name="file_lama">
                <input type="file" class="<?= ($validation->hasError('file')) ? 'is-invalid' : '' ?> form-control" name="file" />
                <div class="invalid-feedback">
                    <?= $validation->getError('file'); ?>
                </div>
            </div>
            <input type="hidden" value="<?= $ketidakhadiran['status']; ?>" name="status">

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>

<?= $this->endSection() ?>
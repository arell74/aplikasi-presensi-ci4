<?= $this->extend('pegawai/layout') ?>

<?= $this->section('content') ?>

<div class="card col-md-6">
    <div class="card-body">
        <form method="POST" action="<?= base_url('pegawai/ketidakhadiran/store'); ?>" enctype="multipart/form-data">

            <?= csrf_field() ?>

            <input type="hidden" value="<?= session()->get('id_pegawai'); ?>" name="id_pegawai">
            <div class="input-style-1">
                <label>Keterangan</label>
                <select name="keterangan" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : '' ?>">
                    <option value="">--Pilih Keterangan</option>
                    <option value="Izin" <?= set_select('keterangan', 'Izin'); ?>>Izin</option>
                    <option value="Sakit" <?= set_select('keterangan', 'Sakit'); ?>>Sakit</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('keterangan'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Tanggal</label>
                <input type="date" value="<?= set_value('tanggal') ?>" class="<?= ($validation->hasError('tanggal')) ? 'is-invalid' : '' ?> form-control" name="tanggal" />
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="5" id="" class="<?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?> form-control" placeholder="Deskripsi"><?= set_value('deskripsi') ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('deskripsi'); ?>
                </div>
            </div>
            <div class="input-style-1">
                <label>File</label>
                <input type="file" value="<?= set_value('file') ?>" class="<?= ($validation->hasError('file')) ? 'is-invalid' : '' ?> form-control" name="file" />
                <div class="invalid-feedback">
                    <?= $validation->getError('file'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Ajukan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
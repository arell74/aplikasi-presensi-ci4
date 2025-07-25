<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="card col-md-6">
    <div class="card-body">
        <form method="POST" action="<?= base_url('admin/jabatan/store'); ?>">
            <div class="input-style-1">
                <label>Nama Jabatan</label>
                <input type="text" class="<?= ($validation->hasError('jabatan')) ? 'is-invalid' : '' ?> form-control" placeholder="Nama Jabatan" name="jabatan" />
                <div class="invalid-feedback">
                    <?= $validation->getError('jabatan'); ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->extend('pegawai/layout') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('pegawai/ketidakhadiran/create'); ?>" class="btn btn-primary">
    <i class="lni lni-plus"></i>
    Ajukan</a>

<table class="table table-striped" id="datatables">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Deskripsi</th>
            <th>File</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php if ($ketidakhadiran) : ?>
        <tbody>
            <?php $no = 1;
            foreach ($ketidakhadiran as $ktd) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ktd['tanggal']; ?></td>
                    <td><?= $ktd['keterangan']; ?></td>
                    <td><?= $ktd['deskripsi']; ?></td>
                    <td><a href="<?= base_url('file_ketidakhadiran/' . $ktd['file']); ?>" class="badge bg-success">Download</a></td>
                    <td><?= $ktd['status']; ?></td>
                    <td>
                        <a href="<?= base_url('pegawai/ketidakhadiran/edit/' . $ktd['id']); ?>" class="badge bg-primary">Edit Data</a>
                        <a href="<?= base_url('pegawai/ketidakhadiran/delete/' . $ktd['id']); ?>" class="badge bg-danger tombol-hapus">Hapus Data</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else : ?>
        <tbody>
            <tr>
                <td colspan="7">Data Masih Kosong...</td>
            </tr>
        </tbody>
    <?php endif; ?>
</table>

<?= $this->endSection() ?>
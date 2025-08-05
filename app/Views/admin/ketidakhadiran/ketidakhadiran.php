<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

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
                    <td>
                        <?php if($ktd['status'] == 'Pending') : ?>
                            <span class="text-danger"><?= $ktd['status']; ?></span>
                        <?php else : ?>
                            <span class="text-success"><?= $ktd['status']; ?></span>
                            <?php endif; ?>
                    <td>
                        <a href="<?= base_url('admin/ketidakhadiran/approved_ketidakhadiran/' . $ktd['id']); ?>" class="badge bg-primary">Approved</a>
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
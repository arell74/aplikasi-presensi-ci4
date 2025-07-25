<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/jabatan/create'); ?>" class="btn btn-primary">
    <i class="lni lni-plus"></i> 
     Tambah Data</a>

     <table class="table" id="datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php $no = 1;
        foreach($jabatan as $jab) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $jab['jabatan']; ?></td>
                <td>
                    <a href="<?= base_url('admin/jabatan/edit/' . $jab['id']); ?>" class="btn btn-primary">Edit Data</a>
                    <a href="<?= base_url('admin/jabatan/delete/' . $jab['id']); ?>" class="btn btn-danger">Hapus Data</a>
                </td>
            </tr>
            <?php endforeach; ?>
     </table>

<?= $this->endSection() ?>
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/lokasi_presensi/create'); ?>" class="btn btn-primary">
    <i class="lni lni-plus"></i> 
     Tambah Data</a>

     <table class="table table-striped display responsive nowrap" style="width:100%" id="datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lokasi</th>
                <th>Alamat Lokasi</th>
                <th>Tipe Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php $no = 1;
        foreach($lokasi_presensi as $lok) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $lok['nama_lokasi']; ?></td>
                <td><?= $lok['alamat_lokasi']; ?></td>
                <td><?= $lok['tipe_lokasi']; ?></td>
                <td>
                    <a href="<?= base_url('admin/lokasi_presensi/detail/' . $lok['id']); ?>" class="badge bg-warning">Detail</a>
                    <a href="<?= base_url('admin/lokasi_presensi/edit/' . $lok['id']); ?>" class="badge bg-primary">Edit Data</a>
                    <a href="<?= base_url('admin/lokasi_presensi/delete/' . $lok['id']); ?>" class="badge bg-danger tombol-hapus">Hapus Data</a>
                </td>
            </tr>
            <?php endforeach; ?>
     </table>

<?= $this->endSection() ?>
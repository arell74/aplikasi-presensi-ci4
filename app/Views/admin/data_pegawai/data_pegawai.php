<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/data_pegawai/create'); ?>" class="btn btn-primary">
    <i class="lni lni-plus"></i> 
     Tambah Data</a>

     <table class="table table-striped" id="datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Lokasi Presensi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php $no = 1;
        foreach($pegawai as $peg) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $peg['nip']; ?></td>
                <td><?= $peg['nama']; ?></td>
                <td><?= $peg['jabatan']; ?></td>
                <td><?= $peg['lokasi_presensi']; ?></td>
                <td>
                    <a href="<?= base_url('admin/data_pegawai/detail/' . $peg['id']); ?>" class="badge bg-warning">Detail</a>
                    <a href="<?= base_url('admin/data_pegawai/edit/' . $peg['id']); ?>" class="badge bg-primary">Edit Data</a>
                    <a href="<?= base_url('admin/data_pegawai/delete/' . $peg['id']); ?>" class="badge bg-danger tombol-hapus">Hapus Data</a>
                </td>
            </tr>
            <?php endforeach; ?>
     </table>

<?= $this->endSection() ?>
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="card col-md-8">
    <div class="card-body">
        <table class="table">
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?= $data_pegawai['nip']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $data_pegawai['nama']; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><?= $data_pegawai['username']; ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $data_pegawai['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $data_pegawai['alamat']; ?></td>
            </tr>
            <tr>
                <td>Nomor Handphone</td>
                <td>:</td>
                <td><?= $data_pegawai['no_hp']; ?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $data_pegawai['jabatan']; ?></td>
            </tr>
            <tr>
                <td>Lokasi Presensi</td>
                <td>:</td>
                <td><?= $data_pegawai['lokasi_presensi']; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= $data_pegawai['status']; ?></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>:</td>
                <td><?= $data_pegawai['role']; ?></td>
            </tr>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
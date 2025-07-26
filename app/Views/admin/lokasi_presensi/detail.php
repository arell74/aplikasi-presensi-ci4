<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="card col-md-8">
    <div class="card-body">
        <table class="table">
            <tr>
                <td>Nama Lokasi</td>
                <td>:</td>
                <td><?= $lokasi_presensi['nama_lokasi']; ?></td>
            </tr>
            <tr>
                <td>Alamat Lokasi</td>
                <td>:</td>
                <td><?= $lokasi_presensi['alamat_lokasi']; ?></td>
            </tr>
            <tr>
                <td>Tipe Lokasi</td>
                <td>:</td>
                <td><?= $lokasi_presensi['tipe_lokasi']; ?></td>
            </tr>
            <tr>
                <td>Latitude</td>
                <td>:</td>
                <td><?= $lokasi_presensi['latitude']; ?></td>
            </tr>
            <tr>
                <td>Longitude</td>
                <td>:</td>
                <td><?= $lokasi_presensi['longitude']; ?></td>
            </tr>
            <tr>
                <td>Zona Waktu</td>
                <td>:</td>
                <td><?= $lokasi_presensi['zona_waktu']; ?></td>
            </tr>
            <tr>
                <td>Jam Masuk</td>
                <td>:</td>
                <td><?= $lokasi_presensi['jam_masuk']; ?></td>
            </tr>
            <tr>
                <td>Jam Pulang</td>
                <td>:</td>
                <td><?= $lokasi_presensi['jam_pulang']; ?></td>
            </tr>
        </table>
    </div>
</div>

<?= $this->endSection() ?>
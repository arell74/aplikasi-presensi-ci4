<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<style>
    /* Gaya CSS Kustom */
    .card.modern-card {
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border: none;
    }

    .modern-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }

    .table td:first-child {
        font-weight: 600;
        color: #495057;
        width: 150px; /* Lebar kolom label yang konsisten */
    }

    .table td {
        padding: 12px 15px;
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    #map {
        height: 500px; /* Ukuran peta yang lebih besar */
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="row">
    <div class="col-md-6">
        <div class="card modern-card h-100">
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><i class="fas fa-map-marker-alt me-2 text-primary"></i> Nama Lokasi</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['nama_lokasi']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-search-location me-2 text-primary"></i> Alamat Lokasi</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['alamat_lokasi']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-building me-2 text-primary"></i> Tipe Lokasi</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['tipe_lokasi']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-latitude me-2 text-primary"></i> Latitude</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['latitude']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-longitude me-2 text-primary"></i> Longitude</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['longitude']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-bullseye me-2 text-primary"></i> Radius</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['radius']; ?> meter</td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-clock me-2 text-primary"></i> Zona Waktu</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['zona_waktu']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-sign-in-alt me-2 text-primary"></i> Jam Masuk</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['jam_masuk']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-sign-out-alt me-2 text-primary"></i> Jam Pulang</td>
                            <td>:</td>
                            <td><?= $lokasi_presensi['jam_pulang']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 d-flex flex-column">
        <div id="map" class="mb-3"></div>
        <a href="<?= base_url('admin/lokasi_presensi/edit/' . $lokasi_presensi['id']); ?>" class="btn btn-primary btn-lg mt-auto d-block">
            <i class="fas fa-edit me-2"></i> Edit Data
        </a>
    </div>
</div>

<script>
    var map = L.map('map').setView([<?= $lokasi_presensi['latitude']; ?>, <?= $lokasi_presensi['longitude']; ?>], 13);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    var circle = L.circle([<?= $lokasi_presensi['latitude']; ?>, <?= $lokasi_presensi['longitude']; ?>], {
        color: '#007bff', /* Warna yang lebih serasi dengan tema Bootstrap */
        fillColor: '#007bff',
        fillOpacity: 0.3,
        radius: <?= $lokasi_presensi['radius']; ?>
    }).addTo(map);

    // Tambahkan tooltip pada lingkaran
    circle.bindPopup("Radius Presensi: <?= $lokasi_presensi['radius']; ?>m").openPopup();
</script>

<?= $this->endSection() ?>
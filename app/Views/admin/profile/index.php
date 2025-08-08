<?= $this->extend('admin/layout'); ?>

<?= $this->section('content'); ?>

<div class="container mt-2">
    <div class="card shadow-lg border-0 profile-card">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <div class="image-container">
                        <img src="<?= base_url('profile/' . session()->get('foto_pegawai')); ?>" alt="Foto Profil"
                            class="img-thumbnail rounded-circle mb-3 profile-img">
                    </div>
                </div>

                <div class="col-md-8">
                    <?php foreach ($pegawai as $peg) : ?>
                        <h3 class="card-title text-primary fw-bold mb-0"><?= $peg['nama']; ?></h3>
                        <p class="text-muted fst-italic"><?= $peg['jabatan']; ?></p>
                        <hr class="my-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="fas fa-id-card me-2 text-secondary"></i> <strong>NIP:</strong> <?= $peg['nip']; ?></li>
                                    <li class="mb-2"><i class="fas fa-venus-mars me-2 text-secondary"></i> <strong>Jenis Kelamin:</strong> <?= $peg['jenis_kelamin']; ?></li>
                                    <li><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <strong>Alamat:</strong> <?= $peg['alamat']; ?></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="fas fa-phone-alt me-2 text-secondary"></i> <strong>Nomor HP:</strong> <?= $peg['no_hp']; ?></li>
                                    <li class="mb-2"><i class="fas fa-user-tie me-2 text-secondary"></i> <strong>Jabatan:</strong> <?= $peg['jabatan']; ?></li>
                                    <li><i class="fas fa-map-signs me-2 text-secondary"></i> <strong>Lokasi Presensi:</strong> <?= $peg['lokasi_presensi']; ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <hr class="mt-4 mb-3">
                    <div class="text-end">
                        <button class="btn btn-outline-primary">
                            <i class="lni lni-pencil"></i> Edit Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
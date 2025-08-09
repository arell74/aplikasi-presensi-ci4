<?= $this->extend('pegawai/layout'); ?>

<?= $this->section('content'); ?>

<style>
    .image-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.image-container img {
    transition: filter 0.3s ease, opacity 0.3s ease;
}

.image-container:hover img {
    filter: brightness(70%); /* Redupkan gambar */
}

</style>

<div class="container my-2">
    <form action="<?= base_url('pegawai/update/' . $id_pegawai['id']); ?>" method="post" enctype="multipart/form-data">
        <div class="card shadow-lg border-0 profile-card">
            <div class="card-body p-5">
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <div class="image-container">
                            <img src="<?= base_url('profile/' . session()->get('foto_pegawai')); ?>" alt="Foto Profil"
                                class="img-thumbnail rounded-circle mb-3 profile-img" id="profileImage">
                        </div>
                        
                    </div>

                    <div class="col-md-8">
                        <?php foreach ($pegawai as $peg) : ?>
                            
                        <input type="hidden" value="<?= $peg['foto_pegawai']; ?>" name="foto_lama">

                        <input type="file" id="foto_pegawai" name="foto_pegawai" hidden>

                            <h2 class="card-title text-primary fw-bold mb-0"><?= $peg['nama']; ?></h2>
                            <p class="text-muted fst-italic"><?= $peg['jabatan']; ?></p>
                            <hr class="my-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $peg['nama']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : '' ?>">
                                            <option value="">--Pilih Jenis Kelamin</option>
                                            <option <?php if ($peg['jenis_kelamin'] == 'laki-laki') {
                                                        echo 'selected';
                                                    } ?> value="laki-laki">Laki-laki</option>
                                            <option <?php if ($peg['jenis_kelamin'] == 'perempuan') {
                                                        echo 'selected';
                                                    } ?> value="perempuan">Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jenis_kelamin'); ?>
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor Handphone</label>
                                        <input type="number" value="<?= $peg['no_hp']; ?>" class="<?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?> form-control" placeholder="Nomor Handphone" name="no_hp" />
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('no_hp'); ?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="lokasi_presensi" class="form-label">Lokasi Presensi</label>
                                        <select name="lokasi_presensi" class="form-control <?= ($validation->hasError('lokasi_presensi')) ? 'is-invalid' : '' ?>">
                                            <option value="<?= $peg['lokasi_presensi']; ?>"><?= $peg['lokasi_presensi']; ?></option>
                                            <?php foreach ($lokasi_presensi as $lok) :  ?>
                                                <option value="<?= $lok['id']; ?>"><?= $lok['nama_lokasi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi_presensi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea name="alamat" id="alamat" name="alamat" class="form-control"><?= $peg['alamat']; ?></textarea>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="li li-check"></i> Simpan Perubahan
                                </button>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<script>
    // Dapatkan elemen gambar dan input file
    const profileImage = document.getElementById('profileImage');
    const fileInput = document.getElementById('foto_pegawai');

    // Tambahkan event listener saat gambar diklik
    profileImage.addEventListener('click', function() {
        // Picu event klik pada input file yang tersembunyi
        fileInput.click();
    });

    // Opsional: Menambahkan preview gambar
    fileInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

<?= $this->endSection(); ?>
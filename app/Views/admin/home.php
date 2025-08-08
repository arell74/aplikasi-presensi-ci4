<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php date_default_timezone_set('Asia/Jakarta') ?>
<span class="mb-3">Data Tanggal <span style="color: blue;"><?= date('d F Y'); ?></span></span>
 <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <a href="<?= base_url('admin/data_pegawai'); ?>" class="link-info">
                  <i class="lni lni-user"></i></a>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total Pegawai</h6>
                  <h3 class="text-bold mb-10"><?= $total_pegawai; ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <a href="<?= base_url('admin/rekap_harian'); ?>" class="link-success">
                  	<i class="lni lni-checkmark-circle"></i>
                  </a>
                </div>
                <div class="content">
                  <h6 class="mb-10">Hadir</h6>
                  <h3 class="text-bold mb-10"><?= $total_hadir; ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon orange">
                  <a href="<?= base_url('admin/ketidakhadiran'); ?>" class="link-danger">
                  	<i class="lni lni-cross-circle"></i>
                  </a>
                </div>
                <div class="content">
                  <h6 class="mb-10">Alpa</h6>
                  <h3 class="text-bold mb-10"><?= $total_pegawai - $ketidakhadiran; ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <a href="<?= base_url('admin/ketidakhadiran'); ?>" class="link-primary">
                    <i class="lni lni-clipboard"></i>
                  </a>
                </div>
                <div class="content">
                  <h6 class="mb-10">Cuti/Izin/Sakit</h6>
                  <h3 class="text-bold mb-10"><?= $ketidakhadiran; ?></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
          </div>


<?= $this->endSection() ?>
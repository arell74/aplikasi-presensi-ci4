<?= $this->extend('pegawai/layout') ?>

<?= $this->section('content') ?>

<form class="row g-3">
    <div class="col-auto">
        <input type="date" class="form-control" name="filter_tanggal">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Tampilkan</button>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-success" name="excel">Ekspor Excel</button>
    </div> 
</form>

<div class="my-2">
</div>

<table class="table table-striped table-bordered table-hover">
    <tr>
        <th>No</th>
        <th>Nama Pegawai</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Total Jam Kerja</th>
        <th>Total Keterlambatan</th>
    </tr>

    <?php if ($rekap_presensi) : ?>
        <?php
        $no = 1;
        foreach ($rekap_presensi as $rekap) :  ?>
            <?php
            // menghitung jumlah jam kerja
            $timestamp_jam_masuk = strtotime($rekap['jam_masuk']);
            $timestamp_jam_keluar = strtotime($rekap['jam_keluar']);

            $selisih = $timestamp_jam_keluar - $timestamp_jam_masuk;
            $jam = floor($selisih / 3600);
            $selisih -= $jam * 3600;
            $menit = floor($selisih / 60);

            // menghitung total jam keterlambatan
            $jam_masuk_pegawai = strtotime($rekap['jam_masuk']);
            $jam_masuk_kantor = strtotime($rekap['jam_masuk_kantor']);

            $selisih_terlambat = $jam_masuk_kantor - $jam_masuk_pegawai;
            $jam_terlambat = floor($selisih_terlambat / 3600);
            $selisih_terlambat -= $jam_terlambat * 3600;
            $menit_terlambat = floor($selisih_terlambat / 60);

            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $rekap['nama']; ?></td>
                <td><?= date('d F Y', strtotime($rekap['tanggal_masuk'])); ?></td>
                <td><?= $rekap['jam_masuk']; ?></td>
                <td><?= $rekap['jam_keluar']; ?></td>
                <td>
                    <?php if ($rekap['jam_keluar'] == '00:00:00') : ?>
                        Proses Kerja
                    <?php else : ?>
                        <?= $jam . ' Jam ' . $menit . ' Menit '; ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($jam_terlambat < 0 || $menit_terlambat < 0) : ?>
                        <a href="#" class="badge bg-success">On Time</a>
                    <?php else : ?>
                        <?= $jam_terlambat . ' Jam ' . $menit_terlambat . ' Menit '; ?>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="7">Data Tidak Tersedia...</td>
        </tr>
    <?php endif; ?>
</table>

<?= $this->endSection() ?>
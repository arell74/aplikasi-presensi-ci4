<?php

namespace App\Models;

use CodeIgniter\Model;

class PresensiModel extends Model
{
    protected $table            = 'presensi';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id_pegawai',
        'tanggal_masuk',
        'jam_masuk',
        'foto_masuk',
        'tanggal_keluar',
        'jam_keluar',
        'foto_keluar'
    ];

    public function rekap_harian()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, pegawai.nama, pegawai.nip, pegawai.foto_pegawai, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.lokasi_presensi');
        $builder->where('tanggal_masuk', date('Y-m-d'));
        return $builder->get()->getResultArray();
    }

    public function rekap_harian_filter($filter_tanggal)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('presensi');

        $builder->select('presensi.*, pegawai.nama, pegawai.nip, pegawai.foto_pegawai, lokasi_presensi.jam_masuk as jam_masuk_kantor');
        $builder->join('pegawai', 'pegawai.id = presensi.id_pegawai');
        $builder->join('lokasi_presensi', 'lokasi_presensi.id = pegawai.lokasi_presensi');
        $builder->where('tanggal_masuk', $filter_tanggal);
        return $builder->get()->getResultArray();
    }
}

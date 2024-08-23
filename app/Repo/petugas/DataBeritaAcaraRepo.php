<?php

namespace App\Repo\petugas;

use App\Models\DataBeritaAcara as ModelsDataBeritaAcara;

class DataBeritaAcaraRepo
{
    private static $model = ModelsDataBeritaAcara::class;

    /**
     * @param $berdasarkan
     * @param $isi
     * @return ModelsDataBeritaAcara
     */
    static function tampil_berdasarkan($berdasarkan, $isi)
    {
        $model = new self::$model();
        $model->like($berdasarkan, $isi, 'both');
        return $model;
    }

    /**
     * @return mixed
     */
    public static function desc_tabel()
    {
        $db = db_connect();
        return $db->query("desc data_berita_acara")->getResultArray();
    }

    /**
     * @return ModelsDataBeritaAcara
     */
    public static function tampil()
    {
        $model = new self::$model();
        return $model;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function simpan(array $data)
    {
        $model = new self::$model();
        return $model->insert($data);
    }

    public static function ubah(array $where, array $data)
    {
        $model = new self::$model();
        return $model->update($where, $data);
    }

    public static function detail($proses)
    {
        $model = new self::$model();
        $model->where("id_berita_acara", $proses);
        return $model->first();
    }

    public static function cetak_berdasarkan($berdasarkan, $isi)
    {
        $model = new self::$model();
        $model->like($berdasarkan, $isi, 'both');
        return $model->findAll();
    }

    public static function cetak_semua()
    {
        $model = new self::$model();
        return $model->findAll();
    }

    public static function hapus($proses)
    {
        $model = new self::$model();
        return $model->delete($proses);
    }


    public static function cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2)
    {
        $model = new self::$model;
        $model->where("$berdasarkan BETWEEN '$tanggal1' AND '$tanggal2'");
        return $model->findAll();
    }

            public static function get_data_berita_acara ($id_berita_acara) {
            $model = new \App\Models\DataBeritaAcara();
            $model->where("id_berita_acara", $id_berita_acara);
            return $model->first();
        }				
				
        public static function get_data_rekam_medis ($id_rekam_medis) {
            $model = new \App\Models\DataRekamMedis();
            $model->where("id_rekam_medis", $id_rekam_medis);
            return $model->first();
        }
}

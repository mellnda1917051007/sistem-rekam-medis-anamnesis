<?php

namespace App\Repo\keluarga;

use App\Models\DataRekamMedis as ModelsDataRekamMedis;

class DataRekamMedisRepo
{
    private static $model = ModelsDataRekamMedis::class;

    /**
     * @param $berdasarkan
     * @param $isi
     * @return ModelsDataRekamMedis
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
        return $db->query("desc data_rekam_medis")->getResultArray();
    }

    /**
     * @return ModelsDataRekamMedis
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
        $model->where("id_rekam_medis", $proses);
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

            public static function get_data_rekam_medis ($id_rekam_medis) {
            $model = new \App\Models\DataRekamMedis();
            $model->where("id_rekam_medis", $id_rekam_medis);
            return $model->first();
        }				
        public static function get_data_pasien ($id_pasien) {
            $model = new \App\Models\DataPasien();
            $model->where("id_pasien", $id_pasien);
            return $model->first();
        }				
				
				

}

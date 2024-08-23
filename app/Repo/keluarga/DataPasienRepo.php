<?php

namespace App\Repo\keluarga;

use App\Models\DataPasien as ModelsDataPasien;

class DataPasienRepo
{
    private static $model = ModelsDataPasien::class;

    /**
     * @param $berdasarkan
     * @param $isi
     * @return ModelsDataPasien
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
        return $db->query("desc data_pasien")->getResultArray();
    }

    /**
     * @return ModelsDataPasien
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
        $model->where("id_pasien", $proses);
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

            public static function get_data_pasien ($id_pasien) {
            $model = new \App\Models\DataPasien();
            $model->where("id_pasien", $id_pasien);
            return $model->first();
        }				
        public static function get_data_petugas ($id_petugas) {
            $model = new \App\Models\DataPetugas();
            $model->where("id_petugas", $id_petugas);
            return $model->first();
        }				
				
				
				
				

}

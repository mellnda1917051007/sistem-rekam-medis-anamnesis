<?php

namespace App\Repo\keluarga;

use App\Models\DataPembayaran as ModelsDataPembayaran;

class DataPembayaranRepo
{
    private static $model = ModelsDataPembayaran::class;

    /**
     * @param $berdasarkan
     * @param $isi
     * @return ModelsDataPembayaran
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
        return $db->query("desc data_pembayaran")->getResultArray();
    }

    /**
     * @return ModelsDataPembayaran
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
        $model->where("id_pembayaran", $proses);
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

            public static function get_data_pembayaran ($id_pembayaran) {
            $model = new \App\Models\DataPembayaran();
            $model->where("id_pembayaran", $id_pembayaran);
            return $model->first();
        }				
        public static function get_data_rekam_medis ($id_rekam_medis) {
            $model = new \App\Models\DataRekamMedis();
            $model->where("id_rekam_medis", $id_rekam_medis);
            return $model->first();
        }				
				
				

}

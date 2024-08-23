<?php

namespace App\Repo\admin;

use App\Models\DataAnggotaKeluarga as ModelsDataAnggotaKeluarga;

class DataAnggotaKeluargaRepo
{
    private static $model = ModelsDataAnggotaKeluarga::class;

    /**
     * @param $berdasarkan
     * @param $isi
     * @return ModelsDataAnggotaKeluarga
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
        return $db->query("desc data_anggota_keluarga")->getResultArray();
    }

    /**
     * @return ModelsDataAnggotaKeluarga
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
        $model->where("id_anggota_keluarga", $proses);
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

            public static function get_data_anggota_keluarga ($id_anggota_keluarga) {
            $model = new \App\Models\DataAnggotaKeluarga();
            $model->where("id_anggota_keluarga", $id_anggota_keluarga);
            return $model->first();
        }				
        public static function get_data_pasien ($id_pasien) {
            $model = new \App\Models\DataPasien();
            $model->where("id_pasien", $id_pasien);
            return $model->first();
        }				
				
				
				
				

}

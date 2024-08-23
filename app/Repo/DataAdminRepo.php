<?php

namespace App\Repo;

use App\Models\DataAdmin as ModelsDataAdmin;

class DataAdminRepo
{
    private static $model = ModelsDataAdmin::class;

    /**
     * @param $berdasarkan
     * @param $isi
     * @return ModelsDataAdmin
     */
    static function tampil_berdasarkan($berdasarkan, $isi)
    {
        $data_admin = new self::$model();
        $data_admin->like($berdasarkan, $isi, 'both');
        return $data_admin;
    }

    /**
     * @return mixed
     */
    public static function desc_tabel()
    {
        $db = db_connect();
        return $db->query("desc data_admin")->getResultArray();
    }

    /**
     * @return ModelsDataAdmin
     */
    public static function tampil()
    {
        $data_admin = new self::$model();
        return $data_admin;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public static function simpan(array $data)
    {
        $data_admin = new self::$model();
        return $data_admin->insert($data);
    }

    public static function ubah(array $where, array $data)
    {
        $data_admin = new self::$model();
        return $data_admin->update($where, $data);
    }

    public static function detail($proses)
    {
        $data_admin = new self::$model();
        $data_admin->where("id_admin", $proses);
        return $data_admin->first();
    }

    public static function cetak_berdasarkan($berdasarkan, $isi)
    {
        $data_admin = new self::$model();
        $data_admin->like($berdasarkan, $isi, 'both');
        return $data_admin->findAll();
    }

    public static function cetak_semua()
    {
        $data_admin = new self::$model();
        return $data_admin->findAll();
    }

    public static function hapus($proses)
    {
        $data_admin = new self::$model();
        return $data_admin->delete($proses);
    }
}
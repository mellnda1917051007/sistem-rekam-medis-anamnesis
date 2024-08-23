<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPemesanan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_pemesanan';
    protected $primaryKey       = 'id_pemesanan';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_pemesanan','kode_transaksi','tanggal_pemesanan','total_bayar','nama_bank','rekening','tujuan','tanggal_upload_bukti_pembayaran','foto_bukti_pembayaran','no_telepon_penerima','alamat_pengiriman'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}

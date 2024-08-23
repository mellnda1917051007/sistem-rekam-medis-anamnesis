<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAnamnesis extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_anamnesis';
    protected $primaryKey       = 'id_anamnesis';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_anamnesis','keadaan_baik','kesadaran','refleksi_pupil_kanan','refleksi_pupil_kiri','tekanan_darah','nadi','pernapasan','suhu','id_rekam_medis'];

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

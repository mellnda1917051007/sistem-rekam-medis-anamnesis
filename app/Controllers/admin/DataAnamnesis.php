<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Repo\admin\DataAnamnesisRepo;

class DataAnamnesis extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Anamnesis';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_anamnesis = DataAnamnesisRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_anamnesis = DataAnamnesisRepo::tampil();
        }
        $this->data['data_anamnesis'] = $data_anamnesis->paginate(15);
        $this->data['pager'] = $data_anamnesis->pager;
        $this->data['desc_tabel'] = DataAnamnesisRepo::desc_tabel();
        return view("admin/data_anamnesis/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataAnamnesisRepo::simpan([
                    "id_anamnesis" => $this->request->getPost("id_anamnesis"),
                    "keadaan_baik" => $this->request->getPost("keadaan_baik"),
                    "kesadaran" => $this->request->getPost("kesadaran"),
                    "refleksi_pupil_kanan" => $this->request->getPost("refleksi_pupil_kanan"),
                    "refleksi_pupil_kiri" => $this->request->getPost("refleksi_pupil_kiri"),
                    "tekanan_darah" => $this->request->getPost("tekanan_darah"),
                    "nadi" => $this->request->getPost("nadi"),
                    "pernapasan" => $this->request->getPost("pernapasan"),
                    "suhu" => $this->request->getPost("suhu")
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(base_url(route_to("admin.data_anamnesis")));
            }
        }
        return view("admin/data_anamnesis/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_anamnesis" => $this->request->getPost("id_anamnesis")
                ];
                $forms = [
                    "keadaan_baik" => $this->request->getPost("keadaan_baik"),
                    "kesadaran" => $this->request->getPost("kesadaran"),
                    "refleksi_pupil_kanan" => $this->request->getPost("refleksi_pupil_kanan"),
                    "refleksi_pupil_kiri" => $this->request->getPost("refleksi_pupil_kiri"),
                    "tekanan_darah" => $this->request->getPost("tekanan_darah"),
                    "nadi" => $this->request->getPost("nadi"),
                    "pernapasan" => $this->request->getPost("pernapasan"),
                    "suhu" => $this->request->getPost("suhu")
                ];

                DataAnamnesisRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(base_url(route_to("admin.data_anamnesis")));
            }
        }
        $this->data["data"] = DataAnamnesisRepo::detail($proses);
        return view("admin/data_anamnesis/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataAnamnesisRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataAnamnesisRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataAnamnesisRepo::cetak_semua();
        }
        return view("admin/data_anamnesis/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_anamnesis' => 'required', 'keadaan_baik' => 'required', 'kesadaran' => 'required', 'refleksi_pupil_kanan' => 'required', 'refleksi_pupil_kiri' => 'required', 'tekanan_darah' => 'required', 'nadi' => 'required', 'pernapasan' => 'required', 'suhu' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_anamnesis' => 'required', 'keadaan_baik' => 'required', 'kesadaran' => 'required', 'refleksi_pupil_kanan' => 'required', 'refleksi_pupil_kiri' => 'required', 'tekanan_darah' => 'required', 'nadi' => 'required', 'pernapasan' => 'required', 'suhu' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataAnamnesisRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(base_url(route_to("admin.data_anamnesis")));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataAnamnesisRepo::detail($proses);
        return view("admin/data_anamnesis/detail", $this->data);
    }


    private function upload(string $key)
    {
        $file = $this->request->getFile($key);
        if (!$file->isValid()) {
            return null;
        }
        $fileName = $file->getRandomName();
        $file->move(PUBLIC_PATH . 'uploads/', $fileName);
        return $fileName;
    }
}

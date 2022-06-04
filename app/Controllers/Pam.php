<?php

namespace App\Controllers;

use Config\Services;
use App\Models\lokasiPamModel;

class Pam extends BaseController
{
    public $output = [
        'sukses'    => false,
        'pesan'     => '',
        'data'      => [],
    ];

    public function index()
    {
        $session = session();
        $request = Services::request();
        $lokasiModel = new lokasiPamModel($request);
        $data_lokasi = $lokasiModel->get()->getResultArray();
        if ($session->status_akun != "Sudah Aktifasi") {
            $judul = 'Silahkan Lengkapi Biodata Anda';
            $isi = 'home/biodata.php';
        } else {
            $judul = 'Lokasi Pengamanan MXGP 2022 Polres Sumbawa';
            $isi = 'lokasi_pam/lokasi.php';
        }
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'data_lokasi' => $data_lokasi,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }

    public function ambil_data_lokasi()
    {
        $request = Services::request();
        $data_lengkap = new lokasiPamModel($request);
        if ($request->getMethod(true) == 'POST') {
            $res = $data_lengkap->ambil_data_lokasi();
            if ($res) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
                $this->output['data']   = $res;
            }
            echo json_encode($this->output);
        }
    }

    public function form_insert()
    {
        $session = session();
        $data = [
            'judul' => 'INPUT DATA LOKASI',
            'isi'   => 'lokasi_pam/form_insert_lokasi.php',
            'session' => $session,
            'validation' => \Config\Services::validation()
        ];
        echo view('layout/v_wrapper', $data);
    }

    public function insert_data_lokasi()
    {
        $session = session();
        helper('form');
        if (!$this->validate([
            'nama_lokasi' => [
                'rules' => 'required|is_unique[lokasi_pam.nama_lokasi]',
                'errors' => [
                    'required' => 'Nama Lokasi Tidak Boleh Kosong',
                    'is_unique' => 'Nama Lokasi Sudah Pernah Di Input Sebelumnya'
                ]
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Latitude Tidak Boleh Kosong'
                ]
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Longitude Tidak Boleh Kosong'
                ]
            ],
            'ket' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Keterangan'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Alamat Lokasi'
                ]
            ],
            'icon_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Icon dengan Font Awesome Kode'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar tidak Boleh Lebih dari 2 MB',
                    'is_image' => 'Gambar / Foto Harus Berformat JPG dan PNG',
                    'mime_in' => 'Gambar / Foto Harus Berformat JPG dan PNG',
                ]
            ],
        ])) {
            return redirect()->to(base_url() . '/pam/form_insert')->withInput();
        }
        $request = Services::request();
        $lokasiPamModel = new lokasiPamModel($request);
        $foto = $this->request->getFile('foto');
        if ($foto != "") {
            $nama_baru = $foto->getRandomName();
            $foto->move('assets/img/foto_lokasi/', $nama_baru);
        } else {
            $nama_baru = "";
        }
        $data = [
            'nama_lokasi' => strtoupper($this->request->getVar('nama_lokasi')),
            'latitude' => $this->request->getVar('latitude'),
            'longitude' => $this->request->getVar('longitude'),
            'alamat' => $this->request->getVar('alamat'),
            'ket' => $this->request->getVar('ket'),
            'icon_lokasi' => $this->request->getVar('icon_lokasi'),
            'foto' => $nama_baru
        ];
        $simpan = $lokasiPamModel->register_new_location($data);
        if ($simpan) {
            $session->setFlashdata('sukses', 'Data Lokasi Berhasil di Simpan');
            return redirect()->to(base_url() . '/pam/form_insert');
        }
    }

    public function hapus()
    {
        helper('filesystem');
        $request = Services::request();
        $id_lokasi = $this->request->getVar('delete_id');
        $nama_file = $this->request->getVar('nama_file');
        if ($nama_file != null) {
            $delete_foto =  unlink('assets/img/foto_lokasi/' . $nama_file);
        } else {
            $delete_foto = "";
        }
        $lokasiModel = new lokasiPamModel($request);
        if ($request->getMethod(true) == 'POST') {
            $hapus_lokasi = $lokasiModel->hapus_lokasi($id_lokasi);
            if ($hapus_lokasi) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data telah dihapus';
            }
            echo json_encode($this->output);
        }
    }

    public function edit()
    {
        $request = Services::request();
        $lokasiModel = new lokasiPamModel($request);
        if ($request->getMethod(true) == 'POST') {
            $res = $lokasiModel->edit();
            $foto = $res->foto;
            if ($foto != null) {
                $gambar = $foto;
            } else {
                $gambar = "mxgp.png";
            };
            if ($res) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
                $this->output['data']   = $res;
                $this->output['data2']   = $gambar;
            }
            echo json_encode($this->output);
        }
    }

    public function update_data_lokasi()
    {
        helper('filesystem');
        $request = Services::request();
        $lokasi_model = new lokasiPamModel($request);
        $nama_foto = $this->request->getVar('nama_foto');
        $foto = $this->request->getFile('foto');
        if ($nama_foto && $foto != "") {
            if (is_file('assets/img/foto_lokasi/' . $nama_foto))
                unlink('assets/img/foto_lokasi/' . $nama_foto);
            $nama = $foto->getRandomName();
            $foto->move('assets/img/foto_lokasi/', $nama);
        } else if ($foto  != "") {
            $nama = $foto->getRandomName();
            $foto->move('assets/img/foto_lokasi/', $nama);
        } else if ($nama_foto != "") {
            $nama = $nama_foto;
        } else {
            $nama = "";
        }

        if ($request->getMethod(true) == 'POST') {
            $data = [
                'nama_lokasi' => $this->request->getVar('nama_lokasi'),
                'latitude' => $this->request->getVar('latitude'),
                'longitude' => $this->request->getVar('longitude'),
                'alamat' => $this->request->getVar('alamat'),
                'ket' => $this->request->getVar('ket'),
                'icon_lokasi' => $this->request->getVar('icon_lokasi'),
                'foto' => $nama
            ];
            $id_update = $this->request->getVar('id_update');
            $ubah = $lokasi_model->ubah($data, $id_update);
            if ($ubah) {
                return redirect()->to(base_url() . '/pam')->with('status', 'Data Lokasi Berhasil di Simpan');
            }
        }
    }
}

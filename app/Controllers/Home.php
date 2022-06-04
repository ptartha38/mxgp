<?php

namespace App\Controllers;

use Config\Services;
use App\Models\registeruserModel;
use App\Models\lokasiPamModel;

class home extends BaseController
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
            $judul = 'Dashboard Sispam MXGP 2022 Polres Sumbawa';
            $isi = 'home/beranda.php';
        }
        $data = [
            'judul' => $judul,
            'data_lokasi' => $data_lokasi,
            'isi'   => $isi,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }

    public function peta()
    {
        $session = session();
        if ($session->status_akun != "Sudah Aktifasi") {
            return redirect()->to(base_url() . '/home');
        } else {
            $judul = 'Dashboard Sispam MXGP 2022 Polres Sumbawa';
            $isi = 'peta.php';
        }
        $data = [
            'judul' => $judul,
            'isi'   => $isi,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('home/peta.php', $data);
    }

    public function ambil_data()
    {
        $request = Services::request();
        $data_lengkap = new registeruserModel($request);
        if ($request->getMethod(true) == 'POST') {
            $res = $data_lengkap->ambil_data_anggota();
            if ($res) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
                $this->output['data']   = $res;
            }
            echo json_encode($this->output);
        }
    }

    public function save_lokasi()
    {
        $request = Services::request();
        $data_lengkap = new registeruserModel($request);
        if ($request->getMethod(true) == 'POST') {
            $data = [
                'latitude' => $this->request->getVar('latitude'),
                'longitude' => $this->request->getVar('longitude'),
            ];
            $NRP = $this->request->getVar('NRP');
            $update = $data_lengkap->update_biodata_user($NRP, $data);
            if ($update) {
                $this->output['sukses'] = true;
                $this->output['pesan']  = 'Data ditemukan';
                $this->output['data']   = $update;
            }
            echo json_encode($this->output);
        }
    }

    public function edit_biodata()
    {
        $session = session();
        $request = Services::request();
        $lokasiModel = new lokasiPamModel($request);
        $data_lokasi = $lokasiModel->get()->getResultArray();
        if ($session->status_akun != "Sudah Aktifasi") {
            $judul = 'Silahkan Lengkapi Biodata Anda';
            $isi = 'home/biodata.php';
        } else {
            $judul = 'Edit Biodata Anda';
            $isi = 'home/edit_biodata.php';
        }
        $data = [
            'judul' => $judul,
            'data_lokasi' => $data_lokasi,
            'isi'   => $isi,
            'session' => $session,
            'validation' => \Config\Services::validation(),
        ];
        echo view('layout/v_wrapper.php', $data);
    }
    public function biodata()
    {
        $session = session();
        helper('form');
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Tidak Boleh Kosong'
                ]
            ],
            'akses' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Akses Tidak Boleh Kosong'
                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jenis Kelamin'
                ]
            ],
            'pangkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Pangkat Anda'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Tempat Lahir Anda'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tentukan Tanggal Lahir Anda'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Alamat Anda Sesuai KTP'
                ]
            ],
            'lokasi_pam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tempat Pam Anda'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Isi alamat e-mail anda',
                    'valid_email' => 'Masukan e-mail yang Valid',
                ]
            ],
            'hp' => [
                'rules' => 'required|max_length[16]|numeric|CekNomor[hp]',
                'errors' => [
                    'required' => 'HP Tidak Boleh Kosong',
                    'max_length' => 'Nomor Tidak Boleh Lebih 16 Digit',
                    'numeric' => 'Masukan Hanya Boleh Angka',
                    'CekNomor' => 'Nomor Hp Harus Diawali 0',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Silahkan Buat Password untuk akun anda',
                    'min_length' => 'Password anda terlalu pendek, Minimal 6 Huruf / Angka',
                ]
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Silahkan Buat Password untuk akun anda',
                    'matches' => 'Password tidak sama'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar tidak Boleh Lebih dari 1 MB',
                    'is_image' => 'Gambar / Foto Harus Berformat JPG dan PNG',
                    'mime_in' => 'Gambar / Foto Harus Berformat JPG dan PNG',
                ]
            ],
        ])) {
            return redirect()->to(base_url() . '/home/edit_biodata')->withInput();
        }
        helper('filesystem');
        $request = Services::request();
        $registeruserModel = new registeruserModel($request);
        // Foto Profil Section
        $nama_foto_profil = $this->request->getVar('nama_foto_profil');
        $foto_profil = $this->request->getFile('foto');
        if ($nama_foto_profil && $foto_profil != "") {
            if (is_file('assets/img/foto_profil/' . $nama_foto_profil))
                unlink('assets/img/foto_profil/' . $nama_foto_profil);
            $nama_profil_baru = $foto_profil->getRandomName();
            $foto_profil->move('assets/img/foto_profil', $nama_profil_baru);
        } else if ($foto_profil  != "") {
            $nama_profil_baru = $foto_profil->getRandomName();
            $foto_profil->move('assets/img/foto_profil', $nama_profil_baru);
        } else if ($nama_foto_profil != "") {
            $nama_profil_baru = $nama_foto_profil;
        } else {
            $nama_profil_baru = "";
        }
        // Merubah Nomor HP +62
        if (!preg_match('/[^+0-9]/', trim($this->request->getVar('hp')))) {
            // cek apakah no hp karakter 1-3 adalah +62
            if (substr(trim($this->request->getVar('hp')), 0, 2) == '62') {
                $hp = trim($this->request->getVar('hp'));
            }
            // cek apakah no hp karakter 1 adalah 0
            else if (substr(trim($this->request->getVar('hp')), 0, 1) == '0') {
                $hp = '62' . substr(trim($this->request->getVar('hp')), 1);
            }
        }
        if ($request->getMethod(true) == 'POST') {
            $data = [
                'nama_lengkap' => $this->request->getVar('nama_lengkap'),
                'akses' => $this->request->getVar('akses'),
                'jk' => $this->request->getVar('jk'),
                'pangkat' => strtoupper($this->request->getVar('pangkat')),
                'tempat_lahir' => $this->request->getVar('tempat_lahir'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'agama' => $this->request->getVar('agama'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
                'hp' => $hp,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'foto' => $nama_profil_baru,
                'lokasi_pam' => $this->request->getVar('lokasi_pam'),
                'status_akun' => "Sudah Aktifasi",
            ];
            $NRP = $this->request->getVar('NRP');
            $update = $registeruserModel->update_biodata_user($NRP, $data);
            if ($update) {
                $session->set($data);
                $session->setFlashdata('sukses', 'Biodata Berhasil di Simpan');
                return redirect()->to(base_url() . '/home');
            }
        }
    }

    public function hapus_anggota()
    {
        $session = session();
        helper('filesystem');
        $request = Services::request();
        $dataModel = new registeruserModel($request);
        if ($request->getMethod(true) == 'POST') {
            $id_hapus = $this->request->getVar('delete_id');
            $nama_file = $dataModel->ambil_nama_foto($id_hapus);
            foreach ($nama_file->getResultArray() as $row) {
                $nama_foto = $row['foto'];
            }
            if ($nama_foto != null) {
                $delete_foto =  unlink('assets/img/foto_profil/' . $nama_foto);
            } else {
                $delete_foto = "";
            }
            $hapus = $dataModel->delete_user($id_hapus);
            if ($hapus) {
                $session->setFlashdata('sukses', 'Data Berhasil di Hapus');
                return redirect()->to(base_url() . '/Home/peta');
            }
        }
    }
}

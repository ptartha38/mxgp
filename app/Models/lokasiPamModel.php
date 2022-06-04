<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class lokasiPamModel extends Model
{
    protected $table = "lokasi_pam";
    protected $request;
    protected $db;


    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
    }

    public function ambil_data_lokasi()
    {
        $this->builder = $this->db->table($this->table)->get();
        return $this->builder->getResultArray();
    }

    public function register_new_location($data)
    {
        $this->builder = $this->db->table($this->table);
        return $this->builder->insert($data);
    }

    public function edit()
    {
        $id_update = $this->request->getPost('id_update');
        $this->builder = $this->db->table($this->table);
        $query = $this->builder->getWhere(['id' => $id_update]);
        return $query->getRow();
    }
    public function ubah($data, $id_update)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id', $id_update);
        return $this->builder->update($data);
    }

    public function hapus_lokasi($id_lokasi)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id', $id_lokasi);
        return $this->builder->delete();
    }
}

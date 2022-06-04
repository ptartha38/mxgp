<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class registeruserModel extends Model
{
    protected $table = "data_anggota";
    protected $request;
    protected $db;


    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
    }

    public function register_new_user($data)
    {
        $this->builder = $this->db->table($this->table);
        return $this->builder->insert($data);
    }

    public function ambil_data_anggota()
    {
        $this->builder = $this->db->table($this->table)->get();
        return $this->builder->getResultArray();
    }

    public function update_biodata_user($NRP, $data)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('NRP', $NRP);
        return $this->builder->update($data);
    }
    public function delete_user($NRP)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('NRP', $NRP);
        return $this->builder->delete();
    }
    public function ambil_nama_foto($NRP)
    {
        $this->builder = $this->db->table($this->table);
        $foto = $this->builder->where('NRP', $NRP)->get();
        return $foto;
    }
}

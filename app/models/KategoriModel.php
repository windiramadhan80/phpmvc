<?php

class KategoriModel
{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahKategori($data)
    {
        $query = "INSERT INTO kategori 
                     VALUES
                    ('', :nama_kategori)";
        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}

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

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateKategori($data)
    {
        $query = "UPDATE kategori 
                    SET nama_kategori=:nama_kategori 
                    WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_kategori', $data['nama_kategori']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteKategori($data)
    {
        $this->db->query("DELETE FROM kategori WHERE id=:id");
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariKategori(){
        $search = $_POST['search'];
        $this->db->query("SELECT * FROM kategori WHERE nama_kategori LIKE :search");
        $this->db->bind('search', "%$search%");

        return $this->db->resultSet();
    }
}

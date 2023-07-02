<?php

class BukuModel
{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        $this->db->query("SELECT buku.*, kategori.nama_kategori FROM " . $this->table . " JOIN kategori ON kategori.id = buku.kategori_id");
        return $this->db->resultSet();
    }

    public function tambahBuku($data)
    {
        $query = "INSERT INTO buku 
                     VALUES
                    ('', :judul, :penerbit, :pengarang, :tahun, :kategori_id, :harga)";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('penerbit', $data['penerbit']);
        $this->db->bind('pengarang', $data['pengarang']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('harga', $data['harga']);

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

    public function cariBuku(){
        $search = $_POST['search'];
        $query = 
        "SELECT * FROM buku
        INNER JOIN kategori on buku.kategori_id = kategori.id
        WHERE buku.judul LIKE :search";
        // $this->db->query("SELECT * FROM buku WHERE judul LIKE :search");
        $this->db->query($query);
        $this->db->bind('search', "%$search%");

        return $this->db->resultSet();
    }
}

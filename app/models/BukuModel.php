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

    public function getBukuById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateBuku($data)
    {
        $query = "UPDATE buku 
                    SET judul     =   :judul, 
                    penerbit      =   :penerbit, 
                    pengarang     =   :pengarang, 
                    tahun         =   :tahun, 
                    kategori_id   =   :kategori_id,
                    harga         =   :harga
                    WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('penerbit', $data['penerbit']);
        $this->db->bind('pengarang', $data['pengarang']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('harga', $data['harga']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBuku($data)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariBuku()
    {
        $search = $_POST['search'];
        $query =
        "SELECT buku.*, kategori.nama_kategori FROM buku 
        JOIN kategori ON kategori.id = buku.kategori_id
        WHERE buku.judul LIKE :search OR
        buku.penerbit LIKE :search OR
        buku.pengarang LIKE :search OR
        buku.tahun LIKE :search OR
        buku.harga LIKE :search OR
        kategori.nama_kategori LIKE :search";

        $this->db->query($query);
        $this->db->bind('search', "%$search%");

        return $this->db->resultSet();
    }
}

<?php

class Kategori extends Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Kategori',
            'kategori' => $this->model('KategoriModel')->getAllKategori(),
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('templates/sidebar', $data);
        $this->view('kategori/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
    }

    public function edit($id)
    {
    }

    public function simpanKategori()
    {
        if ($this->model('KategoriModel')->tambahKategori($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . base_url . '/kategori');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . base_url . '/kategori');
            exit;
        }
    }

    public function updateKategori()
    {
    }

    public function hapus($id)
    {
    }
}

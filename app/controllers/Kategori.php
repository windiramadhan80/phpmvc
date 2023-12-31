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
        $data = [
            'kategori' => $this->model('KategoriModel')->cariKategori(),
            'search' => $_POST['search'],
        ];
        $no = 1;
        foreach($data['kategori'] as $row){
            echo "
            <tr>
                <th class='text-center' scope='row'>" . $no++ . "</th>
                <td>" . $row['nama_kategori'] . "</td>
                <td class='text-center'>
                    <a href='" . base_url . "/kategori/edit/" . $row['id'] . "' class='badge text-bg-warning link-underline link-underline-opacity-0 me-2'>Edit</a>
                    <form class='d-inline' action='" . base_url . "/kategori/hapus' method='POST'>
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button style='border: none;' type='submit' class='badge text-bg-danger' onclick='return confirm(\"Apakah yakin data akan dihapus?\")'>Hapus</button>
                    </form>
                </td>
            </tr>
            ";
        }
        
    }

    public function edit($id)
    {
        $data = [
            'judul' => 'Kategori',
            'kategori' => $this->model('KategoriModel')->getKategoriById($id),
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('templates/sidebar', $data);
        $this->view('kategori/edit', $data);
        $this->view('templates/footer');
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
        if ($this->model('KategoriModel')->updateKategori($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diubah', 'success');
            header('Location: ' . base_url . '/kategori');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diubah', 'danger');
            header('Location: ' . base_url . '/kategori');
            exit;
        }
    }

    public function hapus()
    {
        if ($this->model('KategoriModel')->deleteKategori($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('Location: ' . base_url . '/kategori');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('Location: ' . base_url . '/kategori');
            exit;
        }
    }
}

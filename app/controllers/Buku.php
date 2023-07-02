<?php

class Buku extends Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Buku',
            'buku' => $this->model('BukuModel')->getAllBuku(),
            'kategori' => $this->model('KategoriModel')->getAllKategori(),
        ];
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('templates/sidebar', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data = [
            'buku' => $this->model('BukuModel')->cariBuku(),
            'search' => $_POST['search'],
        ];
        $no = 1;
        foreach($data['buku'] as $row){
            echo "
            <tr>
                <th class='text-center' scope='row'>" . $no++ . "</th>
                <td>" . $row['judul'] . "</td>
                <td>" . $row['penerbit'] . "</td>
                <td>" . $row['pengarang'] . "</td>
                <td>" . $row['tahun'] . "</td>
                <td>" . $row['nama_kategori'] . "</td>
                <td>" . $row['harga'] . "</td>
                <td class='text-center'>
                    <a href='" . base_url . "/buku/edit/" . $row['id'] . "' class='badge text-bg-warning link-underline link-underline-opacity-0 me-2'>Edit</a>
                    <form class='d-inline' action='" . base_url . "/buku/hapus' method='POST'>
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

    public function simpanBuku()
    {
        if ($this->model('BukuModel')->tambahBuku($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('Location: ' . base_url . '/buku');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('Location: ' . base_url . '/buku');
            exit;
        }
    }

    public function updateBuku()
    {
        if ($this->model('BukuModel')->updateBuku($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diubah', 'success');
            header('Location: ' . base_url . '/buku');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diubah', 'danger');
            header('Location: ' . base_url . '/buku');
            exit;
        }
    }

    public function hapus()
    {
        if ($this->model('BukuModel')->deleteBuku($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('Location: ' . base_url . '/buku');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('Location: ' . base_url . '/buku');
            exit;
        }
    }
}
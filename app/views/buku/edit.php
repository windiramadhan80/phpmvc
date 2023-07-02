<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Buku</li>
    </ol>
    <div class="row">
        <div class="col-lg-6 table-responsive">
            <form action="<?= base_url; ?>/buku/updateBuku" method="POST">
                <input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan Judul" value="<?= $data['buku']['judul']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukan Penerbit" value="<?= $data['buku']['penerbit']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukan Pengarang" value="<?= $data['buku']['pengarang']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control" name="tahun" id="tahun" placeholder="Masukan Tahun" value="<?= $data['buku']['tahun']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="kategori_id" class="form-label">Kategori</label>
                    <select class="form-select" id="kategori_id" name="kategori_id" aria-label="Default select example">
                        <option selected>Pilih Kategori</option>
                        <?php foreach ($data['kategori'] as $row) : ?>

                            <option value="<?= $row['id']; ?>" <?= $row['id'] == $data['buku']['kategori_id'] ? 'selected' : ''; ?>><?= $row['nama_kategori']; ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga" value="<?= $data['buku']['harga']; ?>" required>
                </div>
                <button class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
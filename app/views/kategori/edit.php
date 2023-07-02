<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Edit Kategori</li>
    </ol>
    <div class="row">
        <div class="col-lg-8 table-responsive">
            <form action="<?= base_url; ?>/kategori/updateKategori" method="POST">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="hidden" name="id" value="<?= $data['kategori']['id']; ?>">
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukan Nama Kategori" value="<?= $data['kategori']['nama_kategori']; ?>" required>
                <button class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
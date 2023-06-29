<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data Kategori</li>
    </ol>
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalKategori">
        Tambah Kategori
    </button>
    <div class="row">
        <div class="col-lg-8 table-responsive">
            <?php
            Flasher::Message();
            ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Searching" aria-label="Searching" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary" type="button" id="button-addon2">Button</button>
            </div>
            <table class="table responsive table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col" style="width:10px;">No</th>
                        <th scope="col">Kategori</th>
                        <th class="text-center" scope="col" style="width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data['kategori'] as $row) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $no; ?></th>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url; ?>/kategori/edit/<?= $row['id']; ?>" class="badge text-bg-warning link-underline link-underline-opacity-0 me-2">Edit</a>
                                <a href="<?= base_url; ?>/kategori/hapus/<?= $row['id']; ?>" class="badge text-bg-danger link-underline link-underline-opacity-0">Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalKategori" tabindex="-1" aria-labelledby="kategori" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="kategori">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url; ?>/kategori/simpanKategori" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Masukan Nama Kategori" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
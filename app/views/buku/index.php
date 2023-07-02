<div class="container-fluid px-4">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Data Buku</li>
    </ol>
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalBuku">
        Tambah Buku
    </button>
    <div class="row">
        <div class="col-lg table-responsive">
            <?php
            Flasher::Message();
            ?>
            <form>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group mb-3">
                            <input type="text" id="search" class="form-control" placeholder="Searching" value="">
                        </div>
                    </div>
                </div>
            </form>

            <table class="table responsive table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center" scope="col" style="width:10px;">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="livesearch">
                    <?php $no = 1; ?>
                    <?php foreach ($data['buku'] as $row) : ?>
                        <tr>
                            <th class="text-center" scope="row"><?= $no; ?></th>
                            <td><?= $row['judul']; ?></td>
                            <td><?= $row['penerbit']; ?></td>
                            <td><?= $row['pengarang']; ?></td>
                            <td><?= $row['tahun']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['harga']; ?></td>
                            <td class="text-center">
                                <a href="<?= base_url; ?>/buku/edit/<?= $row['id']; ?>" class="badge text-bg-warning link-underline link-underline-opacity-0 me-2">Edit</a>
                                <form class="d-inline" action="<?= base_url; ?>/buku/hapus" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <button style="border: none;" type="submit" class="badge text-bg-danger " onclick="return confirm('Apakah yakin data akan dihapus?')">Hapus</button>
                                </form>
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
<div class="modal fade" id="modalBuku" tabindex="-1" aria-labelledby="buku" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="buku">Tambah Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url; ?>/buku/simpanBuku" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan Judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukan Penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukan Pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <input type="number" class="form-control" name="tahun" id="tahun" placeholder="Masukan Tahun" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select class="form-select" id="kategori_id" name="kategori_id" aria-label="Default select example">
                            <option selected>Pilih Kategori</option>
                            <?php foreach ($data['kategori'] as $row) : ?>

                                <option value="<?= $row['id']; ?>"><?= $row['nama_kategori']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga" required>
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

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    $(function(){
                $('#search').on('keyup', function(){
                    let search = $('#search').val();

                    $.ajax({
                        type : 'POST',
                        url : "<?= base_url; ?>/buku/cari",
                        data : {"search":search,},
                        cache : false,

                        success: function(msg){
                            $('#livesearch').html(msg);
                        },
                        error: function(data){
                            console.log('error:',data)
                        },
                    });
                });
            });
</script>
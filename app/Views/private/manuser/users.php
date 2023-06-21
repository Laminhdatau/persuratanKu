<?= $this->extend('layout/v_apk/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="col-1">Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Email</th>
                            <th>Instansi</th>
                            <th>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($users as $u) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><img src="<?= base_url('assets/img/' . $u['foto']); ?>" alt="" width="50%"></td>
                                <td><?= $u['nama_lengkap']; ?></td>
                                <td><?= $u['jabatan']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <td><?= $u['nm_instansi']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $u['id_user'] ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    ||
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?= $u['id_user'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    ||
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $u['id_user'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>



                <!-- Modal Tambah Menu -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Tambah Nomor Surat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('/createuser'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="menu">Foto</label>
                                        <input type="hidden" class="form-control" id="id_user" name="id_user" required>
                                        <input type="file" class="form-control" id="foto" name="foto" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="menu">Nama Lengkap</label>
                                        <select name="id_biodata" id="">
                                            <option value="">Pilih Nama</option>
                                            <!-- <php foreach ($bio as $b) { ?>
                                                <option value="<= $b['id_biodata']; ?>"><= $b['nama_lengkap']; ?> || <= $b['jabatan']; ?></option>
                                            <php } ?> -->
                                        </select>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit Menu -->
                <?php foreach ($users as $u) {

                ?>
                    <div class="modal fade" id="editModal<?= $u['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Edit Nomor Surat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('/updateuser'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="menu">Nomor Surat</label>
                                            <input type="hidden" class="form-control" id="id_user_surat" name="id_user_surat" value="<?= $u['id_user']; ?>" required>
                                            <input type="text" class="form-control" id="nomor_surat" value="<?= $u['nm_instansi']; ?>" name="nm_instansi" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Perihal</label>
                                            <input type="text" class="form-control" value="<?= $u['nm_instansi']; ?>" id="perihal" name="perihal" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- Modal Konfirmasi Hapus Menu -->

                <?php foreach ($users as $u) { ?>

                    <div class="modal fade" id="deleteModal<?= $u['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Nomor Surat</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('/deleteuser') ?>" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" class="form-control" id="editMenu" name="id_user_surat" value="<?= $u['id']; ?>" required>

                                        <p>Apakah Anda yakin ingin menghapus menu ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
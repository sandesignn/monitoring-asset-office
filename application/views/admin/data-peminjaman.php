<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Peminjaman</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <?= $this->session->flashdata('messageDelete'); ?>
                    <?= $this->session->flashdata('messageIn'); ?>

                    <a class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fas fa-plus-square"></i> Tambah Peminjaman</a>
                    <a class="btn btn-warning mb-4 ml-2" href="<?= base_url() ?>dashboard/cetakpeminjaman"><i class="fas fa-print"></i> Download Data Peminjaman</a>

                    <table id="table-peminjaman" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Peminjaman</th>
                                <th>Nama Barang</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_peminjaman as $barang) : ?>
                                <tr>

                                    <td><a href="#"><?= $barang['kode_peminjaman'] ?></a></td>
                                    <td><?= $barang['nama_barang'] ?></td>
                                    <td><?= $barang['nama_peminjam'] ?></td>
                                    <td><?= $barang['tanggal_pinjam'] ?></td>
                                    <td><?= $barang['status'] ?></td>
                                    <td>
                                        <a class="btn btn-warning" data-toggle="modal" data-target="#show<?= $barang['kode_peminjaman'] ?>" href="#"><i class="nav-icon fas fa-edit"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>dashboard/deletepeminjaman/<?= $barang['kode_peminjaman'] ?>" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="show<?= $barang['kode_peminjaman'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail/Update Peminjaman</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" action="<?= base_url() ?>dashboard/updatepeminjaman" method="post" enctype="multipart/form-data">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">NIP <span class="text-danger">*</span></label>
                                                            <input type="hidden" class="form-control" name="kode_peminjaman" value="<?= $barang['kode_peminjaman'] ?>" required>
                                                            <input type="text" class="form-control" name="nip" value="<?= $barang['nip_peminjam'] ?>" required>
                                                        </div>
                                                        <div class=" form-group">
                                                            <label for="exampleInputEmail1">Nama <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="nama" value="<?= $barang['nama_peminjam'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Kontak <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="kontak" value="<?= $barang['kontak_peminjam'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Asal Devisi/Bagian <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="asal" value="<?= $barang['asal_peminjam'] ?> " required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Nama/Merk Barang <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="nama_barang">
                                                                <option value="<?= $barang['no_inventory'] ?>" selected><?= $barang['nama_barang'] ?></option>
                                                                <?php
                                                                foreach ($data_barang as $dtbarang) :
                                                                ?>
                                                                    <option value="<?= $dtbarang['no_inventory'] ?>"><?= $dtbarang['nama_barang'] ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </div>

                                                        <?php
                                                        $tanggal = strtotime($barang['tanggal_pinjam']);
                                                        $dt = date('Y-m-d', $tanggal);
                                                        $tanggalkembali = strtotime($barang['tanggal_pengembalian']);
                                                        $dt2 = date('Y-m-d', $tanggalkembali);
                                                        ?>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tanggal Pengembalian<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="date_kembali" value="<?= $dt2 ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tanggal Peminjaman<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="date_pinjam" value="<?= $dt ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Jumlah Peminjaman<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="jumlah" value="<?= $barang['stok'] ?>" required>
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Tambah Data Peminjaman</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                                </tr>

                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?= base_url() ?>dashboard/addpeminjaman" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIP <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kontak <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="kontak" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Asal Devisi/Bagian <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="asal" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nama/Merk Barang <span class="text-danger">*</span></label>
                            <select class="form-control" name="nama_barang">
                                <option value="">--No Selected--</option>
                                <?php
                                foreach ($data_barang as $dtbarang) :
                                ?>
                                    <option value="<?= $dtbarang['no_inventory'] ?>"><?= $dtbarang['nama_barang'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Pengembalian<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jumlah Peminjaman<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="jumlah" required>
                        </div>

                    </div>
                    <!-- /.card-body -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data Peminjaman</button>
            </div>
            </form>
        </div>
    </div>
</div>
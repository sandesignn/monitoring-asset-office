<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Barang</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?= $this->session->flashdata('messageDelete'); ?>
            <?= $this->session->flashdata('messageIn'); ?>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">

                    <a class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fas fa-plus-square"></i> Tambah Barang</a>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>No Inventori</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Tanggal Pengadaan</th>
                                <th>Stok Barang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_barang as $barang) : ?>
                                <tr>
                                    <td><img width="100px" src="<?= base_url() ?>/asset/img/barang/<?= $barang['foto_barang'] ?>" alt=""></td>
                                    <td><a data-toggle="modal" data-target="#show<?= $barang['no_inventory'] ?>" href=""><?= $barang['no_inventory'] ?></a></td>
                                    <td><?= $barang['nama_barang'] ?></td>
                                    <td><?= $barang['kategori'] ?></td>
                                    <td><?= $barang['tanggal_pengadaan'] ?></td>
                                    <td><span class="badge badge-success"><?= $barang['stok'] ?></span></td>
                                    <td>
                                        <a class="btn btn-warning" data-toggle="modal" data-target="#<?= $barang['no_inventory'] ?>" href="#"><i class="nav-icon fas fa-edit"></i></a>
                                        <a class="btn btn-danger" href="<?= base_url() ?>dashboard/deletebarang/<?= $barang['no_inventory'] ?>" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash"></i></a>
                                    </td>
                                </tr>


                                <!-- Modal Update Data Barang-->
                                <div class="modal fade" id="<?= $barang['no_inventory'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form" action="<?= base_url() ?>dashboard/update_fotobarang" method="post" enctype="multipart/form-data">
                                                    <img class="mb-4" width="150px" src="<?= base_url() ?>/asset/img/barang/canon.jpg" alt="">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Foto Barang<span class="text-danger"> (maxs 2mb, *)</span></label>
                                                        <input type="file" class="form-control" name="foto" required>
                                                        <input type="hidden" class="form-control" name="inventori" value="<?= $barang['no_inventory'] ?>" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Foto Barang</button>
                                                </form>
                                                <form role="form" action="<?= base_url() ?>dashboard/update_databarang" method="post" enctype="multipart/form-data">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Barang<span class="text-danger">*</span></label>
                                                            <input type="hidden" class="form-control" name="inventori" value="<?= $barang['no_inventory'] ?>" required>
                                                            <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Kategori Barang <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="kategori">
                                                                <option value="<?= $barang['kategori'] ?>"><?= $barang['kategori'] ?></option>
                                                                <option value="Printer">Printer</option>
                                                                <option value="Proyektor">Proyektor</option>
                                                                <option value="Laptop">Laptop</option>
                                                                <option value="Kipas Angin">Kipas Angin</option>
                                                                <option value="Sound Sistem">Sound Sistem</option>

                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Jenis Barang <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="jenis">
                                                                <option <?= $barang['jenis_barang'] ?>><?= $barang['jenis_barang'] ?></option>
                                                                <option>Elektronik</option>
                                                                <option>Non Elektronik</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tanggal Pengadaan<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="date" value="<?= $barang['tanggal_pengadaan'] ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Stok Barang<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="stok" value="<?= $barang['stok'] ?>" required>
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Data Barang</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal Lihat Data Barang-->
                                <div class="modal fade" id="show<?= $barang['no_inventory'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form">
                                                    <img class="mb-4" width="150px" src="<?= base_url() ?>/asset/img/barang/<?= $barang['foto_barang'] ?>" alt="">

                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Barang<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang'] ?>" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Kategori Barang <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="kategori">
                                                                <option value="<?= $barang['kategori'] ?>" disabled><?= $barang['kategori'] ?></option>
                                                                <option>Printer</option>
                                                                <option>Proyektor</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Jenis Barang <span class="text-danger">*</span></label>
                                                            <select class="form-control" name="jenis">
                                                                <option value="<?= $barang['jenis_barang'] ?>" disabled><?= $barang['jenis_barang'] ?></option>
                                                                <option>Elektronik</option>
                                                                <option>Non Elektronik</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tanggal Pengadaan<span class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="date" value="<?= $barang['tanggal_pengadaan'] ?>" required disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Status Peminjaman<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="date" value="<?= $barang['status_peminjaman'] ?>" required disabled>
                                                        </div>

                                                    </div>
                                                    <!-- /.card-body -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="<?= base_url() ?>dashboard/addbarang" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Foto Barang<span class="text-danger"> (maxs 2mb, *)</span></label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Barang <span class="text-danger">*</span></label>
                            <select class="form-control" name="kategori">
                                <option>--No Selected--</option>
                                <option value="Printer">Printer</option>
                                <option value="Proyektor">Proyektor</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Kipas">Kipas Angin</option>
                                <option value="Sound">Sound Sistem</option>
                                <option value="Layar">Layar Proyektor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Barang <span class="text-danger">*</span></label>
                            <select class="form-control" name="jenis">
                                <option>--No Selected--</option>
                                <option value="Elektronik">Elektronik</option>
                                <option value="Non Elektronik">Non Elektronik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Pengadaan<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok Barang<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="stok" required>
                        </div>

                    </div>
                    <!-- /.card-body -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
            </div>
            </form>
        </div>
    </div>
</div>
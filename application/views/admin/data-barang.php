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
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">

                <a class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fas fa-plus-square"></i> Tambah Barang</a>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>No Inventori</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Tanggal Pengadaan</th>
                                <th>Status Peminjaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_barang as $barang) : ?>
                                <tr>
                                    <td><img width="100px" src="<?= base_url() ?>/asset/img/barang/canon.jpg" alt=""></td>
                                    <td><?= $barang['no_inventory'] ?></td>
                                    <td><?= $barang['nama_barang'] ?></td>
                                    <td><?= $barang['kategori'] ?></td>
                                    <td><?= $barang['jenis_barang'] ?></td>
                                    <td><?= $barang['tanggal_pengadaan'] ?></td>
                                    <td><span class="badge badge-success"><?= $barang['status_peminjaman'] ?></span></td>
                                    <td>
                                        <a class="btn btn-warning" href="#"><i class="nav-icon fas fa-edit"></i></a>
                                        <a class="btn btn-danger"  href="#" onclick="return confirm('Are you sure?')"><i class="nav-icon fas fa-trash"></i></a>
                                    </td>
                                </tr>
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
                <form role="form" action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Foto Barang<span class="text-danger">  (maxs 2mb, *)</span></label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Barang <span class="text-danger">*</span></label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>--No Selected--</option>
                            <option>Printer</option>
                            <option>Proyektor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Barang <span class="text-danger">*</span></label>
                            <select class="form-control">
                            <option>--No Selected--</option>
                            <option>Elektronik</option>
                            <option>Non Elektronik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Pengadaan<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" required>
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
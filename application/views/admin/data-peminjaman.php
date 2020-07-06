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

                <a class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fas fa-plus-square"></i> Tambah Peminjaman</a>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Pinjam</th>
                                <th>Inventori</th>
                                <th>Nama Barang</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_peminjaman as $barang) : ?>
                                <tr>
                                    
                                    <td><?= $barang['kode_peminjaman'] ?></td>
                                    <td><?= $barang['no_inventory'] ?></td>
                                    <td>Printer Canon IP2770</td>
                                    <td><?= $barang['nama_peminjam'] ?></td>
                                    <td><?= $barang['tanggal_pinjam'] ?></td>
                                    <td><?= $barang['tanggal_pengembalian'] ?></td>
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
                            <input type="text" class="form-control" name="kontak" required>
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
                            <label for="exampleFormControlSelect1">Nama/Merk Barang <span class="text-danger">*</span></label>
                            <select class="form-control" id="exampleFormControlSelect1">
                            <option>--No Selected--</option>
                            <option>Canon IP2770</option>
                            <option>Epson L3110</option>
                            <option>Canon L3MP50</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Pengembalian<span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date" required>
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
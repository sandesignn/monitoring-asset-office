<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Halaman Utama Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>24 Staff</h3>
                            <p>Jumlah Staff</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>100 Barang</h3>

                            <p>Total Seluruh Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>4 Barang</h3>

                            <p>Jumlah Barang Dipinjam</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>5 User</h3>

                            <p>Total Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col">
                
                <a class="btn btn-primary mb-4" data-toggle="modal" data-target="#exampleModal" href="#"><i class="fas fa-angle-double-up"></i> Pengembalian</a>

                <table id="peminjaman" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Kode Peminjaman</th>
                                <th>No Inventori</th>
                                <!-- <th>Nama Barang</th> -->
                                <th>Nama Peminjam</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status Peminjaman</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                    <?php foreach ($barang as $brg) : ?>
                                <tr>
                                    <td><img width="150px" src="<?= base_url() ?>/asset/img/barang/canon.jpg" alt=""></td>
                                    <td><?= $brg['tanggal_pinjam'] ?></td>
                                    <td><?= $brg['kode_peminjaman'] ?></td>
                                    <td><?= $brg['no_inventory'] ?></td>
                                    <!-- <td><?= $brg['nama_barang'] ?></td> -->
                                    <td><?= $brg['nama_peminjam'] ?></td>
                                    <td><?= $brg['tanggal_pengembalian'] ?></td>
                                    <td><span class="badge badge-warning"><?= $brg['status'] ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                            </tr>

                        </tbody>

                    </table>
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Download Data Peminjaman</h1>
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
                    <div class="form-group">
                        <label>Dari Tanggal (*)</label>
                        <input type="date" id="from" name="from" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal (*)</label>
                        <input type="date" id="to" name="to" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Peminjaman Barang <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status">
                            <option selected>--Pilih status--</option>
                            <option value="1">Belum dikembalikan</option>
                            <option value="0">Telah dikembalikan</option>
                            <option value="2">Semuanya</option>

                        </select>
                    </div>
                    <input type="button" class="btn btn-primary" value="Filter Data" id="filter"></button>

                    <div class="text-bold mt-3">
                        <h5>Cetak/download data:</h5>
                    </div>
                    <div class="hasil" id="hasil">
                        <div class="mytable">
                            <table id="cetak" class="table table-bordered table-striped mt-5">
                                <thead>
                                    <tr>
                                        <th>Kode Peminjaman</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Jumlah</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Asal Peminjam</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_peminjaman as $barang) : ?>
                                        <tr>
                                            <?php
                                            $time = strtotime($barang['tanggal_pinjam']);
                                            $time2 = strtotime($barang['tanggal_pengembalian']);
                                            ?>
                                            <td><a href="#"><?= $barang['kode_peminjaman'] ?></a></td>
                                            <td><?= $barang['nama_barang'] ?></td>
                                            <td><?= $barang['no_inventory'] ?></td>
                                            <td><?= $barang['stok'] ?></td>
                                            <td><?= $barang['nama_peminjam'] ?></td>
                                            <td><?= date('d-m-Y H:i:s', $time) ?></td>
                                            <td><?= date('Y-m-d H:i:s', $time2) ?></td>
                                            <td><?= $barang['asal_peminjam'] ?></td>
                                            <td><?= $barang['status'] ?></td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
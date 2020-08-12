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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Peminjaman</th>
                                <th>Pemberi</th>
                                <th>Penerima</th>
                                <th>Kontak</th>
                                <th>Waktu Tanggal</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_pengembalian as $kembali) : ?>
                                <tr>
                                    <td><?= $kembali['kode_peminjaman'] ?></td>
                                    <td><?= $kembali['memberi'] ?></td>
                                    <td><?= $kembali['penerima'] ?></td>
                                    <td><?= $kembali['kontak'] ?></td>
                                    <?php $tanggal = strtotime($kembali['date_created']); ?>
                                    <td><?= date('d-M-y h:i:s', $tanggal) ?></td>
                                    <td><?= $kembali['stok'] ?></td>
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
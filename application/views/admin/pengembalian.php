<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pengembalian Barang</h1>
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
                    <?= $this->session->flashdata('messageFailed'); ?>
                    <?= $this->session->flashdata('messageSuccess'); ?>
                    <form action="<?= base_url() ?>dashboard/add_pengembalian" method="post">
                        <div class="form-group">
                            <label>Nama yang mengembalikan (*)</label>
                            <input type="hidden" class="form-control" name="kode_peminjaman" value="<?= $id ?>">
                            <input type="hidden" class="form-control" name="no_inventory" value="<?= $idbrg ?>">
                            <input type="text" class="form-control" name="nama" placeholder="masukkan nama..." required>
                        </div>
                        <div class="form-group">
                            <label>Kontak Hp/Wa (*)</label>
                            <input type="text" name="kontak" class="form-control" placeholder="masukkan kontak..." required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Barang (*)</label>
                            <input type="text" name="jumlah" class="form-control" placeholder="masukkan jumlah barang..." required>
                        </div>
                        <div class="form-group">
                            <label>Penerima (*)</label>
                            <input type="text" name="penerima" class="form-control" placeholder="masukkan nama penerima..." required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan (*)</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="masukkan nama penerima..." required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Data</button>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
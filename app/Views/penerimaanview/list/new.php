<?= $this->extend('template/index') ?>


<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New Penerimaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Penerimaan Barang</li>
                    <li class="breadcrumb-item">List</li>
                    <li class="breadcrumb-item active">New</li>
                </ol>
            </div>
            <!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form action="<?= base_url('penerimaanview/list'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 mb-2">
                    <div class="card">
                        <div class="card-header">
                            New Penerimaan
                        </div>
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="id_barang">Nama Barang</label>
                                <select class="form-control" name="id_barang" id="id_barang">
                                    <?php foreach ($barang as $d) : ?>
                                        <option value="<?= $d['id_barang']; ?>"><?= $d['nama_barang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori" disabled>
                                    <?php foreach ($kategori as $d) : ?>
                                        <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required placeholder="Jumlah" value="<?= old('jumlah'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="id_satuan">Satuan</label>
                                <select class="form-control" name="id_satuan" id="id_satuan" disabled>
                                    <?php foreach ($satuan as $d) : ?>
                                        <option value="<?= $d['id_satuan']; ?>"><?= $d['nama_satuan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" value="<?= date("Y-m-d"); ?>" class="form-control" id="tanggal" name="tanggal" required placeholder="Tanggal">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url('penerimaanview/list'); ?>" class="btn btn-secondary">Batal</a>


                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</section>
<?= $this->endSection('content') ?>
<?= $this->extend('template/index') ?>


<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Kelola Barang</li>
                    <li class="breadcrumb-item">List</li>
                    <li class="breadcrumb-item active">Edit</li>
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
        <form action="<?= base_url('barangview/list/' . $logistik['id_barang']); ?>" method="post">
            <div class="row">
                <div class="col-md-5 mb-2">
                    <div class="card">
                        <div class="card-header">
                            Edit Logistik
                        </div>
                        <div class="card-body">
                            <input type='hidden' name='_method' value='PUT' />
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required placeholder="Nama barang" value="<?= $logistik['nama_barang']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori" disabled>
                                    <?php foreach ($kategori as $d) : ?>
                                        <?php if ($logistik['id_kategori'] == $d['id_kategori']) : ?>

                                            <option selected value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok" value="<?= $logistik['stok']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="id_satuan">Satuan</label>
                                <select class="form-control" name="id_satuan" id="id_satuan" disabled>
                                    <?php foreach ($satuan as $d) : ?>
                                        <?php if ($logistik['id_satuan'] == $d['id_satuan']) : ?>

                                            <option selected value="<?= $d['id_satuan']; ?>"><?= $d['nama_satuan']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_satuan']; ?>"><?= $d['nama_satuan']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <input type="text" class="form-control" id="kondisi" name="kondisi" required placeholder="Kondisi" value="<?= $logistik['kondisi']; ?>">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url('barangview/list'); ?>" class="btn btn-secondary">Batal</a>


                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</section>
<?= $this->endSection('content') ?>
<?= $this->extend('template/index') ?>


<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Logistik</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Logistik</li>
                    <li class="breadcrumb-item">Kelola Penerimaan</li>
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
        <form action="<?= base_url('penerimaanview/list/' . $penerimaan['id_penerimaan']); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 mb-2">
                    <div class="card">
                        <div class="card-header">
                            Edit Penerimaan
                        </div>
                        <div class="card-body">
                            <input type='hidden' name='_method' value='PUT' />
                            <?= csrf_field(); ?>


                            <div class="form-group">
                                <label for="id_barang">Nama Barang</label>
                                <select class="form-control" name="id_barang" id="id_barang" disabled>
                                    <?php foreach ($barang as $d) : ?>
                                        <?php if ($penerimaan['id_barang'] == $d['id_barang']) : ?>

                                            <option selected value="<?= $d['id_barang']; ?>"><?= $d['nama_barang']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_barang']; ?>"><?= $d['nama_barang']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" name="id_kategori" id="id_kategori" disabled>
                                    <?php
                                    foreach ($kategori as $d) :   ?>

                                        <?php if ($penerimaan['id_kategori'] == $d['id_kategori']) : ?>

                                            <option selected value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required placeholder="jumlah" value="<?= $penerimaan['jumlah']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="id_satuan">Satuan</label>
                                <select class="form-control" name="id_satuan" id="id_satuan" disabled>
                                    <?php foreach ($satuan as $d) : ?>
                                        <?php if ($penerimaan['id_satuan'] == $d['id_satuan']) : ?>

                                            <option selected value="<?= $d['id_satuan']; ?>"><?= $d['nama_satuan']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_satuan']; ?>"><?= $d['nama_satuan']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required placeholder="tanggal" value="<?= date("Y-m-d"); ?>" disabled>
                            </div>

                            <?php if (session()->get('id_role') == 2) : ?>
                                <div class="form-group">
                                    <label for="id_status">Status</label>
                                    <select class="form-control" name="id_status" id="id_status">
                                        <option value="1">Belum Verifikasi</option>
                                        <option value="2">Sudah Verifikasi</option>
                                    </select>
                                </div>
                            <?php endif; ?>

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
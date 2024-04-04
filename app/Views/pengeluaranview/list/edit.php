<?= $this->extend('template/index') ?>


<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pengeluaran</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Kelola Pengeluaran</li>
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
        <form action="<?= base_url('pengeluaranview/list/' . $pengeluaran['id_pengeluaran']); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-5 mb-2">
                    <div class="card">
                        <div class="card-header">
                            New Pengeluaran
                        </div>
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <input type='hidden' name='_method' value='PUT' />
                            <!-- GET, POST, PUT, PATCH, DELETE-->

                            <div class="form-group">
                                <label for="id_barang">Nama Barang</label>
                                <select class="form-control" name="id_barang" id="id_barang" disabled>
                                    <?php foreach ($barang as $d) : ?>
                                        <?php if ($pengeluaran['id_barang'] == $d['id_barang']) : ?>

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
                                    <?php foreach ($kategori as $d) : ?>
                                        <?php if ($pengeluaran['id_kategori'] == $d['id_kategori']) : ?>

                                            <option selected value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" required placeholder="Jumlah" value="<?= $pengeluaran['jumlah']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="id_satuan">Satuan</label>
                                <select class="form-control" name="id_satuan" id="id_satuan" disabled>
                                    <?php foreach ($satuan as $d) : ?>
                                        <?php if ($pengeluaran['id_satuan'] == $d['id_satuan']) : ?>

                                            <option selected value="<?= $d['id_satuan']; ?>"><?= $d['nama_satuan']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $d['id_satuan']; ?>"><?= $d['nama_satuan']; ?></option>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" value="<?= date("Y-m-d"); ?>" class="form-control" id="tanggal" name="tanggal" required placeholder="Tanggal" disabled>
                            </div>

                            <div class="form-group">
                                <label for="nama_penerima">Nama Penerima</label>
                                <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required placeholder="Penerima" value="<?= $pengeluaran['nama_penerima']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Alamat" value="<?= $pengeluaran['alamat']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="jenis_bencana">Jenis Bencana</label>
                                <input type="text" class="form-control" id="jenis_bencana" name="jenis_bencana" required placeholder="Jenis Bencana" value="<?= $pengeluaran['jenis_bencana']; ?>" disabled>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required placeholder="Keterangan" value="<?= $pengeluaran['keterangan']; ?>" disabled>
                            </div>

                            <?php if (session()->get('id_role') != 2) : ?>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Gambar">
                                </div>
                            <?php endif; ?>


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
                            <a href="<?= base_url('pengeluaranview/list'); ?>" class="btn btn-secondary">Batal</a>


                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</section>
<?= $this->endSection('content') ?>
<?= $this->extend('template/index') ?>


<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">New Pengajuan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Pengajuan Barang</li>
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
        <form action="<?= base_url('pengajuanview/list'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card">
                        <div class="card-header">
                            New Pengajuan
                        </div>
                        <div class="card-body">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="keterangan_barang">Keterangan Barang</label><br>

                                <textarea name="keterangan_barang" id="keterangan_barang" cols="140" rows="5">

                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="nama_pengaju">Nama Pemohon</label>
                                <input type="text" class="form-control" id="nama_pengaju" name="nama_pengaju" placeholder="Nama Pemohon">
                            </div>

                            <div class="form-group">
                                <label for="gambar">Surat</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Surat">
                            </div>

                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" value="<?= date("Y-m-d"); ?>" class="form-control" id="tanggal" name="tanggal" required placeholder="Tanggal">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?= base_url('pengajuanview/list'); ?>" class="btn btn-secondary">Batal</a>


                        </div>
                    </div>
                </div>

            </div>

        </form>
    </div>
</section>
<?= $this->endSection('content') ?>
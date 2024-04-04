<?= $this->extend('template/index') ?>




<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Penerimaan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Penerimaan Barang</li>
                    <li class="breadcrumb-item">List</li>
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
        <div class="row">
            <div class="col-12">
                <?php if (session()->get('id_role') == 1) : ?>
                    <a href="<?= base_url('penerimaanview/list/new'); ?>" class="btn btn-primary btn-sm mb-2">New</a>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body">
                        <table class="table" id='table'>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Nama Satuan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1;
                                foreach ($penerimaan as $d) : ?>
                                    <tr>
                                        <td><?= $a++; ?></td>
                                        <td><?= $d['nama_barang']; ?></td>
                                        <td><?= $d['nama_kategori']; ?></td>
                                        <td><?= $d['jumlah']; ?></td>
                                        <td><?= $d['nama_satuan']; ?></td>
                                        <td><?= $d['tanggal']; ?></td>
                                        <td>
                                            <?php if ($d['id_status'] == 1) : ?>
                                                <span class="badge badge-pill badge-danger"><?= $d['nama_status']; ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-pill badge-success"><?= $d['nama_status']; ?></span>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <?php if ($d['id_status'] == 1) : ?>

                                                <?php if (session()->get('id_role') == 2 || session()->get('id_role') == 2) : ?>
                                                    <a class="btn btn-warning btn-sm mb-2" href="<?= base_url('penerimaanview/list/' . $d['id_penerimaan'] . '/edit'); ?>">Edit</a>
                                                <?php else : ?>
                                                <?php endif; ?>
                                            <?php else : ?>

                                            <?php endif; ?>
                                        </td>


                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>
<script>
    var table = $('#table').DataTable({
        responsive: true,
        "dom": 'Bflrtip',
        buttons: [
            // 'copy', 'excel', 'pdf'
        ],
        "pageLength": 5,
        "lengthMenu": [
            [5, 100, 1000, -1],
            [5, 100, 1000, "ALL"],
        ],

    })
</script>
<?= $this->endSection('script') ?>
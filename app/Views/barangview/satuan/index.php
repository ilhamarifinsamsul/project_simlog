<?= $this->extend('template/index') ?>




<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Satuan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Kelola Barang</li>
                    <li class="breadcrumb-item">Satuan</li>
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
                <a href="<?= base_url('barangview/satuan/new'); ?>" class="btn btn-primary btn-sm mb-2">New</a>
                <div class="card">
                    <div class="card-header">
                        Kelola Satuan
                    </div>
                    <div class="card-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1;
                                foreach ($satuan as $d) : ?>
                                    <tr>
                                        <td><?= $a++; ?></td>
                                        <td><?= $d['nama_satuan']; ?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm mb-2" href="<?= base_url('barangview/satuan/' . $d['id_satuan'] . '/edit'); ?>"><i class="fas fa-pen-fancy"></i></a>
                                            <form action='<?= base_url('barangview/satuan') . '/' . $d['id_satuan']; ?>' method='post' enctype='multipart/form-data'>
                                                <input type='hidden' name='_method' value='DELETE' />
                                                <!-- GET, POST, PUT, PATCH, DELETE-->
                                                <?= csrf_field(); ?>
                                                <button type="button" onclick="deleteTombol(this)" class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash-alt"></i></button>
                                            </form>
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
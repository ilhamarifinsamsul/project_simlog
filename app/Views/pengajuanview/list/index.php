<?= $this->extend('template/index') ?>




<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">List Pengajuan Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Pengajuan Barang</li>
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
                <?php if (session()->get('id_role') == 5) : ?>
                    <a href="<?= base_url('pengajuanview/list/new'); ?>" class="btn btn-primary btn-sm mb-2">New</a>
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
                                    <th>Keterangan Barang</th>
                                    <th>Nama Pemohon</th>
                                    <th>Status</th>
                                    <?php if (session()->get('id_role') == 1) : ?>
                                        <th>Surat</th>
                                    <?php endif; ?>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1;
                                foreach ($pengajuan as $d) : ?>
                                    <tr>
                                        <td><?= $a++; ?></td>
                                        <td><?= $d['keterangan_barang']; ?></td>
                                        <td><?= $d['nama_pengaju']; ?></td>
                                        <td>
                                            <?php if ($d['id_status_pengajuan'] == 1) : ?>
                                                <span class="badge badge-pill badge-danger"><?= $d['nama_status_pengajuan']; ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-pill badge-success"><?= $d['nama_status_pengajuan']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if (session()->get('id_role') == 1) : ?>
                                            <td>
                                                <a target="_blank" href="<?= base_url('assets/upload/' . $d['gambar']); ?>">Download Surat</a>
                                            </td>
                                        <?php endif; ?>
                                        <td><?= $d['tanggal']; ?></td>
                                        <td>
                                            <?php if ($d['id_status_pengajuan'] == 1) : ?>

                                                <?php if (session()->get('id_role') == 1 || session()->get('id_role') == 1) : ?>
                                                    <a class="btn btn-warning btn-sm mb-2" href="<?= base_url('pengajuanview/list/' . $d['id_pengajuan'] . '/edit'); ?>">Edit</a>
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
<?= $this->extend('template/index') ?>

<?php

$user = new App\Models\UserModel();
$request = \Config\Services::request();
$segment = $request->uri->getSegment(1);

$resUser = $user->find(session()->get('id_user'));

?>


<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-md-6 mb-2">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Pengajuan Pending</h4>
                        <h5 class=""><?= $pengajuan_pending; ?></h5>
                        <a class="mt-1 text-white" href="<?= base_url('pengajuanview/list'); ?>">
                            <i class="fas fa-search mr-1"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-2">
                <div class="card bg-success">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Pengajuan Done</h4>
                        <h5 class=""><?= $pengajuan_done; ?></h5>
                        <a class="mt-1 text-white" href="<?= base_url('pengajuanview/list'); ?>">
                            <i class="fas fa-search mr-1"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <div class="card">
                    <div class="card-header bg-dark">
                        <i class="fas fa-chart-line mr-1"></i>
                        Total Pengajuan Barang
                    </div>
                    <div class="card-body viewTampilGrafik">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
</section>
<?= $this->endSection('content') ?>


<?= $this->section('script') ?>

<script>
    // setup
    const data = {
        labels: [
            <?php foreach ($charts as $d) : ?> '<?= $d['id_pengajuan']; ?>',
            <?php endforeach; ?>
        ],

        datasets: [{
            label: 'Status Pengajuan',
            data: [<?php foreach ($charts as $d) : ?>
                    <?= $d['id_pengajuan']; ?>,
                <?php endforeach; ?>
            ],
            backgroundColor: [
                'rgb(0,128,0)',
                'rgb(255,0,0)',
            ],
            borderWidht: 1
        }]
    }

    // configurtion
    const config = {
        type: 'pie',
        data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    }

    // render init block
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>


<?= $this->endSection('script') ?>
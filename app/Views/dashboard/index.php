<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

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

<!-- main content -->
<section class="content">
    <div class="container-fluid">
        <!-- small boxes (stat box) -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Total Barang</h4>
                        <h5 class=""><?= $count_barang; ?></h5>
                        <a href="<?= base_url('barangview/list'); ?>" class="mt-1 text-white">
                            <i class="fas fa-search mr-2">Lihat Detail</i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Total Pengeluaran Barang</h4>
                        <h5><?= $count_pengeluaran; ?></h5>
                        <a href="<?= base_url('pengeluaranview/list'); ?>" class="mt-1 text-white">
                            <i class="fas fa-search mr-2">Lihat Detail</i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-2">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h4 class="font-weight-bold">Total Penerimaan Barang</h4>
                        <h5><?= $count_penerimaan; ?></h5>
                        <a href="<?= base_url('penerimaanview/list'); ?>" class="mt-1 text-white">
                            <i class="fas fa-search mr-2">Lihat Detail</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-2">
                <div class="card mb-4">
                    <div class="card-header bg-dark">
                        <i class="fas fa-list mr-1"></i>
                        Kategori Barang
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1;
                                foreach ($kategori as $d) :
                                ?>
                                    <tr>
                                        <td><?= $a++; ?></td>
                                        <td><?= $d['nama_kategori']; ?></td>
                                        <?php
                                        $modelbarang = new \App\Models\BarangModel();
                                        $countData = $modelbarang->select('count(id_barang) as count')->where('id_kategori', $d['id_kategori'])->first()['count'];
                                        ?>
                                        <td><?= $countData; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-2">
                <div class="card">
                    <div class="card-header bg-dark">
                        <i class="fas fa-chart-line mr-1"></i>
                        Stok Barang
                    </div>
                    <div class="card-body viewTampilGrafik">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection('content'); ?>

<?= $this->section('script'); ?>

<script>
    // setup
    const data = {
        labels: [
            <?php foreach ($chart as $d) : ?> '<?= $d['nama_barang']; ?>',
            <?php endforeach; ?>
        ],

        datasets: [{
            label: 'Stok Barang',
            data: [<?php foreach ($chart as $d) : ?>
                    <?= $d['stok']; ?>,
                <?php endforeach; ?>
            ],
            backgroundColor: [
                'rgb(108,143,233)',
                'rgb(226,32,56)',
                'rgb(235,180,96)',
                'rgb(233,150,122)',
                'rgb(255,215,0)',
                'rgb(255,140,0)',
                'rgb(0,128,0)',
                'rgb(173,255,47)',
                'rgb(0,0,139)',
                'rgb(30,144,255)'
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
<?= $this->endSection('script'); ?>
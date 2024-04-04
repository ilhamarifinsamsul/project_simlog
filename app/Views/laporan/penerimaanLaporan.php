<?= $this->extend('template/index') ?>




<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan Penerimaan Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item">Laporan</li>
                    <li class="breadcrumb-item">Penerimaan Barang</li>
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

                <div class="card">
                    <div class="card-header">
                        List
                    </div>
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Start</span>
                                        </div>
                                        <input type="date" class="form-control" name="start" id="start" value="<?= $start; ?>">
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">End</span>
                                        </div>
                                        <input type="date" class="form-control" name="end" id="end" value="<?= $end; ?>">
                                    </div>
                                </div>

                                <div class="col-md-3 mb-2">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                        <div class="col-md-3 mb-2">
                            <button onclick="printArea('laporan/cetakPenerimaan')" class="btn btn-secondary">Cetak</button>
                        </div>
                        <iframe src="" class="printFrame" style="display: none;"></iframe>
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Status</th>
                                    <th>Waktu</th>

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
                                        <td>
                                            <?php if ($d['id_status'] == 1) : ?>
                                                <span class="badge badge-pill badge-danger"><?= $d['nama_status']; ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-pill badge-success"><?= $d['nama_status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $d['created_at']; ?></td>

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

    function printArea() {
        var printFrame = document.querySelector(".printFrame");
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;


        // URL halaman yang ingin dicetak 
        var printPageURL = "<?= base_url('laporan/cetakPenerimaan'); ?>?start=" + start + "&end=" + end;

        // Set source iframe dengan URL halaman yang ingin dicetak 
        printFrame.src = printPageURL;

        // Tunggu beberapa saat untuk memastikan iframe terunduh dengan benar 
        printFrame.onload = function() {
            // Panggil fungsi print() pada iframe 
            printFrame.contentWindow.print();
        };
    }
</script>
<?= $this->endSection('script') ?>
<!DOCTYPE html>
<html lang="en">

<?php

$alert = new App\Libraries\Alert();

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?> | SIMLog</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- pace-progress -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- adminlte-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">


    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">


    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/DataTables/datatables.min.css" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <?= $this->renderSection('head'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed pace-primary">
    <?= $alert->get(); ?>

    <div class="wrapper">

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col">

                        <div class="card">
                            <div class="card-body">
                                <p><img src="<?= base_url(); ?>assets/front/img/logistik.png" alt="" width="100" height="100"></p>
                                <h1 class="text-center fw-bold">Laporan Penerimaan Barang</h1>

                                <table class="table">
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

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023 <a href="<?= base_url(); ?>">SIMLog</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>


    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard.js"></script> -->

    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url(); ?>assets/plugins/select2/js/select2.full.min.js"></script>
    <!-- sweetalert -->
    <script src="<?= base_url(); ?>assets/sweetalert2/sweetalert2.all.min.js"></script>

    <script>
        $.fn.select2.defaults.set("theme", "bootstrap");

        //Initialize Select2 Elements
        // $('.select2bs4').select2({
        //     theme: 'bootstrap4'
        // })

        $('select.form-control').select2({
            theme: 'bootstrap4',
            width: '100%' // need to override the changed default
            // width: 'resolve' // need to override the changed default
        })
    </script>


    <!-- <script type="text/javascript" language="javascript" src="https://nightly.datatables.net/responsive/js/dataTables.responsive.min.js">
    </script> -->

    <script type="text/javascript" src="<?= base_url(); ?>assets/DataTables/datatables.min.js"></script>

    <!-- pace-progress -->
    <script src="<?= base_url(); ?>assets/plugins/pace-progress/pace.min.js"></script>

    <!-- <script src="<?= base_url(); ?>assets/fullcalendar/main.js"></script>
    <script src="<?= base_url(); ?>assets/fullcalendar/moment.min.js"></script> -->

    <?= $alert->init('jquery'); ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.3/fullcalendar.min.js"></script> -->
    <!-- <script src="<?= base_url(); ?>assets/moment.js/2.7.0/moment.min.js"></script>
    <script src="<?= base_url(); ?>assets/fullcalendar/2.0.3/fullcalendar.min.js"></script> -->





    <?= $this->renderSection('script'); ?>
</body>

</html>
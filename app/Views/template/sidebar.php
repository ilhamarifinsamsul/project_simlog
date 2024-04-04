<?php

$user = new App\Models\UserModel();
$request = \Config\Services::request();
$segment = $request->uri->getSegment(1);
$segment2 = $request->uri->getSegment(2);

$resUser = $user->join('tb_role', 'tb_role.id_role = tb_user.id_role')->find(session()->get('id_user'));

?>

<aside class="main-sidebar sidebar-light-primary bg-info elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url(); ?>assets/front/img/logistik.png" alt="SILA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>SIMLog</strong></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url(); ?>assets/dist/img/avatar5.png" class="img-circle elevation-2 mb-4" alt="User Image">
                <div class="info">
                    <a href="#" class="d-block"><?= $resUser['nama_lengkap']; ?> -- <?= $resUser['nama_role']; ?></a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= ($segment == 'user') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <?php if (session()->get('id_role') == 1) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('user'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kelola User
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>
                                Kelola Barang
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('barangview/list'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-dark"></i>
                                    <p class="text-dark">
                                        List
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('barangview/kategori'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-dark"></i>
                                    <p class="text-dark">
                                        Kategori
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('barangview/satuan'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-dark"></i>
                                    <p class="text-dark">
                                        Satuan
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if (session()->get('id_role') != 2 && session()->get('id_role') != 3 && session()->get('id_role') != 4) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('pengajuanview/list'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                Pengajuan Barang
                            </p>
                        </a>

                    </li>
                <?php endif; ?>


                <?php if (session()->get('id_role') != 5) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('penerimaanview/list'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-box"></i>
                            <p>
                                Penerimaan Barang
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('pengeluaranview/list'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Pengeluaran Barang
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-mail-bulk"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/barangLaporan'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-dark"></i>
                                    <p class="text-dark">
                                        Barang
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/penerimaanLaporan'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-dark"></i>
                                    <p class="text-dark">
                                        Penerimaan Barang
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('laporan/pengeluaranLaporan'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon text-dark"></i>
                                    <p class="text-dark">
                                        Pengeluaran Barang
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="<?= base_url(); ?>logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
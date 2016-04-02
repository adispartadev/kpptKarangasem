<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 0:56
 */
?>


<aside class="sidebar sidebar-left sidebar-menu">
    <!-- START Sidebar Content -->
    <section class="content slimscroll">
        <h5 class="heading">Main Menu</h5>
        <!-- START Template Navigation/Menu -->
        <ul class="topmenu topmenu-responsive" data-toggle="menu">

            <li class="dashboard">
                <a href="<?php echo base_url('/frontoffice'); ?>" data-target="#dashboard" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-dashboard2"></i></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="permohonan-ijin">
                <a href="javascript:void(0);" data-target="#ijin" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-file6"></i></span>
                    <span class="text">Permohonan Ijin</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="ijin" class="submenu collapse">
                    <li class="submenu-header ellipsis">Permohonan Ijin</li>
                    <li class="lihat-data">
                        <a href="<?php echo base_url('frontoffice/permohonan-ijin/lihat-data') ?>">
                            <span class="text">Lihat Semua</span>
                        </a>
                    </li>
                    <li class="ijin-baru">
                        <a href="<?php echo base_url('frontoffice/permohonan-ijin/ijin-baru') ?>">
                            <span class="text">Ijin Baru</span>
                        </a>
                    </li>
                    <li class="perpanjangan-ijin">
                        <a href="component-animation.html">
                            <span class="text">Perpanjangan Ijin</span>
                        </a>
                    </li>
                    <li class="perubahan-ijin">
                        <a href="component-animation.html">
                            <span class="text">Perubahan Ijin</span>
                        </a>
                    </li>
                    <li class="perluasan-ijin">
                        <a href="component-animation.html">
                            <span class="text">Perluasan Ijin</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->

            </li>

            <li class="pengaturan">
                <a href="javascript:void(0);" data-target="#pengaturan" data-toggle="submenu" data-parent=".topmenu">
                    <span class="figure"><i class="ico-settings"></i></span>
                    <span class="text">Pengaturan</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="pengaturan" class="submenu collapse">
                    <li class="submenu-header ellipsis">Pengaturan</li>
                    <li class="lihat-data">
                        <a href="<?php echo base_url('frontoffice/permohonan-ijin/lihat-data') ?>">
                            <span class="text">Profil</span>
                        </a>
                    </li>
                    <li class="ijin-baru">
                        <a href="<?php echo base_url('pengaturan-akun') ?>">
                            <span class="text">Ijin Baru</span>
                        </a>
                    </li>
                    <li class="perpanjangan-ijin">
                        <a href="component-animation.html">
                            <span class="text">Akun Pengguna</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <!--/ END Template Navigation/Menu -->

        <!-- START Sidebar summary -->
        <!-- Summary -->
        <h5 class="heading">Summary</h5>
        <div class="wrapper">
           
        </div>
        <!--/ Summary -->
        <!--/ END Sidebar summary -->
    </section>
    <!--/ END Sidebar Container -->
</aside>
<section id="main" role="main">
    <div class="container-fluid">
<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 0:55
 */
?>

<header id="header" class="navbar">
    <!-- START navbar header -->
    <div class="navbar-header">
        <!-- Brand -->
        <a class="navbar-brand" href="javascript:void(0);" style="text-align: center;">
            <img src="<?php echo base_url('resources/icons/karangasem.png') ?>" style="height: 100%; text-align: center;">
        </a>
        <!--/ Brand -->
    </div>
    <!--/ END navbar header -->

    <!-- START Toolbar -->
    <div class="navbar-toolbar clearfix">
        <!-- START Left nav -->
        <ul class="nav navbar-nav navbar-left">
            <!-- Sidebar shrink -->
            <li class="hidden-xs hidden-sm">
                <a href="javascript:void(0);" class="sidebar-minimize" data-toggle="minimize" title="Minimize sidebar">
                    <span class="meta">
                        <span class="icon"></span>
                    </span>
                </a>
            </li>

            <li class="navbar-main hidden-lg hidden-md hidden-sm">
                <a href="javascript:void(0);" data-toggle="sidebar" data-direction="ltr" rel="tooltip" title="Menu sidebar">
                    <span class="meta">
                        <span class="icon"><i class="ico-paragraph-justify3"></i></span>
                    </span>
                </a>
            </li>
            <li class="dropdown custom" id="header-dd-notification">
                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" onclick="lihat_notif()">
                    <span class="meta">
                        <span class="icon"><i class="ico-bell"></i></span>
                        <span class="hasnotification hasnotification-danger" style="display: none;"></span>
                    </span>
                </a>
                <div class="dropdown-menu" role="menu">
                    <div class="dropdown-header">
                        <span class="title">Pemberitahuan <span class="count"></span></span>
                        <span class="option text-right"><a href="javascript:void(0);">Clear all</a></span>
                    </div>
                    <div class="dropdown-body slimscroll">
                        <!-- indicator -->
                        <div class="indicator inline" id="notif_loading"><span class="spinner spinner16"></span></div>
                        <!--/ indicator -->

                        <!-- Message list -->
                        <div class="media-list" id="notif_target">

                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <!--/ END Left nav -->

        <!-- START navbar form -->
        <div class="navbar-form navbar-left dropdown" id="dropdown-form">
            <form action="" role="search">
                <div class="has-icon">
                    <input type="text" class="form-control" placeholder="Search application...">
                    <i class="ico-search form-control-icon"></i>
                </div>
            </form>
        </div>
        <!-- START navbar form -->

        <!-- START Right nav -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Profile dropdown -->
            <li class="dropdown profile">
                <a href="javascript:void(0);" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                        <span class="meta">
                            <!-- <span class="avatar"><img src="<?php echo base_url('resources/icons/user.png') ?>" class="img-circle" alt="" /></span> -->
                            <span class="ico ico-user"></span>
                            <span class="text hidden-xs hidden-sm pl5"><?php echo $this->session->userdata['pengguna']['username']; ?></span>
                            <span class="caret"></span>
                        </span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo base_url('pengaturan/akun') ?>"><span class="icon"><i class="ico-cog4"></i></span> Profile Setting</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url('logout'); ?>"><span class="icon"><i class="ico-exit"></i></span> Logout</a></li>
                </ul>
            </li>

        </ul>
        <!--/ END Right nav -->
    </div>
    <!--/ END Toolbar -->
</header>
<!--/ END Template Header -->

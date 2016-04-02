<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 13:13
 */
?>
<link rel="stylesheet" href="<?php echo base_url('resources/stylesheet/themes/theme4.css') ?>">


<header id="header" class="navbar">
    <div class="navbar-toolbar clearfix" style="margin-left: 0px !important">
    </div>
</header>


<section id="main" role="main">
    <section class="container">
    <div class="container-fluid">
      <div class="page-header page-header-block" style="margin-left: -30px; margin-right: -30px;">
          <div class="page-header-section">
              <h4 class="title semibold">KPPT Kabupaten Karangasem</h4>
          </div>
      </div>
    </div>
      
      <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5" style="padding: 60px 0;">
                <div class="text-center mb30 mt30">
                    <img class="" src="<?php echo base_url('resources/icons/logo.png') ?>" alt="" width="100px" height="100px" />
                </div>
                <h2 class="title semibold" style="text-align: center">Selamat Datang Di KPPT</h2>
                <h3 class="title semibold ellipsis nm text-primary" style="text-align: center">Kabupaten Karangasem</h3>
                

            </div>
            <div class="col-md-5">
                <form class="panel panel-default" method="POST" name="form-login" action="<?php echo base_url('login/submit') ?>" style="margin-top: 50px;">
                      <div class="panel-heading">
                          <h3 class="panel-title">Login akun admin</h3>
                      </div>
                    <div class="panel-body">
                        <!-- Alert message -->
                        <div class="alert alert-success fade in">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p class="mb10">Silahkan memasukan akun admin untuk melanjutkan ke halaman utama.</p>
                        </div>
                        <div class="form-group">
                            <div class="has-icon pull-left">
                                <input name="username" value="" type="text" class="form-control" placeholder="Username">
                                <i class="ico-user2 form-control-icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="has-icon pull-left">
                                <input name="passwd" value="" type="password" class="form-control" placeholder="Password">
                                <i class="ico-lock2 form-control-icon"></i>
                            </div>
                        </div>
                        <div class="form-group nm">
                            <button type="submit" class="btn btn-primary"><span class="semibold">Login</span></button>
                        </div>
                    </div>
                </form>
                <!-- Login form -->

            </div>
          </div>
        </div>
        <!--/ END row -->
    </section>
    <!--/ END Template Container -->
</section>
<footer id="footer">
   <!-- START container-fluid -->
   <div class="container-fluid">
       <div class="row">
           <div class="col-sm-6">
               <!-- copyright -->
               <p class="nm text-muted">KPPT Kabupaten Karangasem &copy; <span class="semibold"><?php echo date('Y'); ?></span></p>
               <!--/ copyright -->
           </div>
       </div>
   </div>
   <!--/ END container-fluid -->
</footer>
<script>
    toastr.options = {
          "closeButton": true,
          "debug": false,
          "progressBar": false,
          "positionClass": "toast-top-full-width",
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
    };

<?php
    if($this->session->flashdata('item') != null) {
        $message = $this->session->flashdata('item');
        ?>
            toastr.<?php echo $message['class'] ?>("<strong><?php echo $message['message'] ?></strong>");
        <?php
    }
?>
</script>

</body>
</html>


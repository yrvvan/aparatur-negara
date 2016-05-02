<!DOCTYPE html>
<html lang="en">

    <!-- Head BEGIN -->
    <head>
        <meta charset="utf-8">
        <title>Aparatur Negara</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <meta content="Aparatur Negara" name="description">
        <meta content="Bappenas" name="keywords">
        <meta content="Irwan Rosyadi" name="author">

        <link rel="shortcut icon" href="favicon.ico">

        <!-- Fonts START -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
        <!-- Fonts END -->

        <!-- Global styles START -->          
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Global styles END --> 

        <!-- Page level plugin styles START -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/global/plugins/slider-revolution-slider/rs-plugin/css/settings.css" rel="stylesheet">
        <!-- Page level plugin styles END -->

        <!-- Theme styles START -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/frontend/layout/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/frontend/pages/css/style-revolution-slider.css" rel="stylesheet"><!-- metronic revo slider styles -->
        <link href="<?php echo base_url(); ?>assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
        <link href="<?php echo base_url(); ?>assets/frontend/layout/css/custom.css" rel="stylesheet">
        <!-- Theme styles END -->
    </head>
    <!-- Head END -->

    <!-- Body BEGIN -->
    <body class="corporate">
        <!-- BEGIN STYLE CUSTOMIZER -->
        <!-- END BEGIN STYLE CUSTOMIZER --> 

        <!-- BEGIN TOP BAR -->
        <div class="pre-header">
            <div class="container">
                <div class="row">
                    <!-- BEGIN TOP BAR LEFT PART -->
                    <div class="col-md-6 col-sm-6 additional-shop-info">
                        <ul class="list-unstyled list-inline">
                            <li><i class="fa fa-phone"></i><span> 021-3148551</span></li>
                            <li><i class="fa fa-fax"></i><span> 021-3148551</span></li>
                            <li><i class="fa fa-envelope-o"></i><span>aparatur@bappenas.go.id</span></li>
                        </ul>
                    </div>
                    <!-- END TOP BAR LEFT PART -->
                    <!-- BEGIN TOP BAR MENU -->
                    <div class="col-md-6 col-sm-6 additional-nav">
                        <ul class="list-unstyled list-inline pull-right">
                            <?php if ($this->session->userdata('privillege') == "superadmin") { ?>
                                <li><a href="<?php echo base_url() . "c_admin/"; ?>admin">Admin</a></li>
                            <?php } elseif ($this->session->userdata('privillege') == "common") { ?>
                                <li><a href="<?php echo base_url() . "c_admin/"; ?>user">Halaman Privasi</a></li>
                            <?php } elseif ($this->session->userdata('privillege') == NULL && $this->session->userdata('is_logged_in') == NULL && $this->session->userdata('username') != NULL) {
                                ?>
                                <li><a href = "<?php echo base_url() . "c_admin/"; ?>lock">Unlock</a></li>
                            <?php } else { ?>
                                <li><a href = "<?php echo base_url() . "c_admin/usrs"; ?>">Disposisi</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- END TOP BAR MENU -->
                </div>
            </div>        
        </div>
        <!-- END TOP BAR -->
        <!-- BEGIN HEADER -->
        <div class="header">
            <div class="container">
                <a class="site-logo" href="<?php echo base_url(); ?>c_admin/index">Aparatur Negara</a>

                <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

                <!-- BEGIN NAVIGATION -->
                <?php $this->load->view('topmenu'); ?>
                <!-- END NAVIGATION -->
            </div>
        </div>
        <!-- Header END -->

        <!-- BEGIN SLIDER -->
        <?php $this->load->view($isi); ?>

        <!-- BEGIN PRE-FOOTER -->
        <?php $this->load->view('footer'); ?>
        <!-- END FOOTER -->

        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
        <script src="<?php echo base_url(); ?>assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

        <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

        <!-- BEGIN RevolutionSlider -->  
        <script src="<?php echo base_url(); ?>assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
        <!-- END RevolutionSlider -->

        <script src="<?php echo base_url(); ?>assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
        <script type="text/javascript">
            jQuery(document).ready(function() {
                Layout.init();
                Layout.initOWL();
                RevosliderInit.initRevoSlider();
                Layout.initTwitter();
                Metronic.init();
                //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
                //Layout.initNavScrolling(); 
            });
        </script>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>
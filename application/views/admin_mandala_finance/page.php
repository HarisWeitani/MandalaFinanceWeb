<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $page_title; ?></title>

    <link href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/img/favicon-mandala.png" rel="icon" type="image/png">

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vendors Styles -->
    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jscrollpane/style/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/cleanhtmlaudioplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/cleanhtmlvideoplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/chartist/dist/chartist.min.css">
    <!-- v.1.4.0 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/nprogress/nprogress.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jquery-steps/demo/css/jquery.steps.css">
    <!-- v.1.4.2 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/css/source/main.css">
    <style>
        nav.left-menu .logo-container {
            padding: 0px 25px 0px;
        }
        nav.left-menu .logo-container .logo
        {
            height: 89px;
        }
    </style>
    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/tether/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/spin.js/spin.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/ladda/dist/ladda.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/autosize/dist/autosize.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/summernote/dist/summernote.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/nestable/jquery.nestable.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/d3/d3.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/c3/c3.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/peity/jquery.peity.min.js"></script>
    <!-- v1.0.1 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- v1.1.1 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/gsap/src/minified/TweenMax.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/hackertyper/hackertyper.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jquery-countTo/jquery.countTo.js"></script>
    <!-- v1.4.0 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/nprogress/nprogress.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/jquery-steps/build/jquery.steps.min.js"></script>
    <!-- v1.4.2 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>vendors/chart.js/src/Chart.bundle.min.js"></script>

    <!-- Clean UI Scripts -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/js/common.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/js/demo.temp.js"></script>

<!-- Page Scripts -->

</head>
<body class="theme-default">
<nav class="left-menu" left-menu>
    <div class="logo-container">
        <a href="<?php echo base_url() . ADMIN_URL . ADMIN_URL_CALCULATION; ?>" class="logo">
            <img src="<?php echo base_url() . ASSETS_BACKEND_URL . "common/img/rsz_logo-mandala.png"?>" alt='Admin Mandala Finance' />
        </a>
    </div>
    <div class="left-menu-inner scroll-pane">
        <ul class="left-menu-list left-menu-list-root list-unstyled">
            <!-- Add More Page Here -->

             <?php if(isset($side_bar_menu)) { ?>
                <?php echo $side_bar_menu; ?>
            <?php } ?>

        </ul>
    </div>
</nav>
<nav class="top-menu">
    <div class="menu-icon-container hidden-md-up">
        <div class="animate-menu-button left-menu-toggle">
            <div><!-- --></div>
        </div>
    </div>
    <div class="menu">
        <div class="menu-user-block">
            <div class="dropdown dropdown-avatar">
                <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="avatar" href="javascript:void(0);">
                        <img src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/img/temp/avatars/1.jpg" alt="Alternative text to the image">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="" role="menu">
                    <a class="dropdown-item" href="<?php echo base_url() . ADMIN_URL_LOGOUT; ?>"><i class="dropdown-icon icmn-exit"></i> Logout</a>
                </ul>
            </div>
        </div>
        <!-- <div class="menu-info-block">
            <div class="left">
                ADMIN PANEL Ver 0.9
            </div>
            <div class="right hidden-md-down margin-left-20">
                <div class="dropdown">
                    <button type="button" class="btn btn-icon btn-link icmn-bell margin-inline" data-toggle="dropdown" aria-expanded="false">
                        <span class="label label-danger" id="notification_count"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-animate" aria-labelledby="" role="menu" id="notification_body">

                    </ul>
                </div>
            </div>
        </div> -->
    </div>
</nav>

<section class="page-content">
<div class="page-content-inner">

    <?php if(isset($content)) { ?>
        <?php echo $content; ?>
    <?php } ?>

</div>

</section>

<div class="main-backdrop"><!-- --></div>

<!-- SUMMERNOTE -->
<script>
    $(function() {
        $('#summernote').summernote({
            height: 350
        });
        $('#summernote2').summernote({
            height: 350
        });
    });
</script>

<!-- DATEPICKER -->
<script>
    $(function(){

        $('.datepicker-only-init').datetimepicker({
            widgetPositioning: {
                horizontal: 'left'
            },
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            defaultDate: "<?php echo date('Y-M-d'); ?>",
            format: 'YYYY-MM-D'
        });

    })
</script>

<!-- DELETE MODAL -->
<script>
    //Modal For Delete
    $(document).on('click', '.open-deleteModal', function () {
         var deleteId = $(this).data('id');
         $('.modal-body #modal').val( deleteId );
    });


</script>

<!-- End Page Scripts -->

</body>
</html>

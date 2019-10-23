<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo COMPANY; ?></title>

    <link href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/img/favicon-mandala.png" rel="icon" type="image/png">

    <!-- HTML5 shim and Respond.js for < IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Vendors Styles -->
    <!-- v1.0.0 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jscrollpane/style/jquery.jscrollpane.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/ladda/dist/ladda-themeless.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/cleanhtmlaudioplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/cleanhtmlvideoplayer/src/player.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/bootstrap-sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/summernote/dist/summernote.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/ionrangeslider/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/datatables/media/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/c3/c3.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/chartist/dist/chartist.min.css">
    <!-- v.1.4.0 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jquery-steps/demo/css/jquery.steps.css">
    <!-- v.1.4.2 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/bootstrap-select/dist/css/bootstrap-select.min.css">

    <!-- Clean UI Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/common/css/source/main.css">

    <!-- Vendors Scripts -->
    <!-- v1.0.0 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/tether/dist/js/tether.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jquery-mousewheel/jquery.mousewheel.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jscrollpane/script/jquery.jscrollpane.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/spin.js/spin.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/ladda/dist/ladda.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/html5-form-validation/dist/jquery.validation.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jquery-typeahead/dist/jquery.typeahead.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/autosize/dist/autosize.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/bootstrap-show-password/bootstrap-show-password.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/cleanhtmlaudioplayer/src/jquery.cleanaudioplayer.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/cleanhtmlvideoplayer/src/jquery.cleanvideoplayer.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/summernote/dist/summernote.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/ionrangeslider/js/ion.rangeSlider.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/nestable/jquery.nestable.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/datatables/media/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/datatables-fixedcolumns/js/dataTables.fixedColumns.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/editable-table/mindmup-editabletable.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/d3/d3.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/c3/c3.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/peity/jquery.peity.min.js"></script>
    <!-- v1.0.1 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/chartist-plugin-tooltip/dist/chartist-plugin-tooltip.min.js"></script>
    <!-- v1.1.1 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/gsap/src/minified/TweenMax.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/hackertyper/hackertyper.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jquery-countTo/jquery.countTo.js"></script>
    <!-- v1.4.0 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/nprogress/nprogress.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/jquery-steps/build/jquery.steps.min.js"></script>
    <!-- v1.4.2 -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/vendors/chart.js/src/Chart.bundle.min.js"></script>

    <!-- Clean UI Scripts -->
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/common/js/common.js"></script>
    <script src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>/common/js/demo.temp.js"></script>
    <style>
        .single-page-block-header .logo {
            max-width: 135px;
            height: 88.2px;
        }
    </style>
</head>
<body class="theme-default">

<section class="page-content">
<div class="page-content-inner" style="background-image: url(<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/img/temp/login/4.jpg)">

    <!-- Login Omega Page -->
    <div class="single-page-block-header" style="padding-left: 0px; padding-top: 0px; padding-bottom: 0px;">
        <div class="row">
            <div class="col-lg-4">
                <div class="logo">
                    <a href="javascript: history.back();">
                        <img src="<?php echo base_url() . ASSETS_BACKEND_URL; ?>common/img/logo-mandala.png" width="100%" alt="Admin Mandala Finance" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                
            </div>
        </div>
    </div>
    <div class="single-page-block">
        <div class="single-page-block-inner effect-3d-element">
            <div class="blur-placeholder"><!-- --></div>
            <div class="single-page-block-form">
                <h3 class="text-center">
                    <i class="icmn-enter margin-right-10"></i>
                    Login Form
                </h3>
                <br />
                <?php echo form_open(current_url()); ?>
                    <div class="form-group">
                        <input class="form-control"
                               placeholder="Username"
                               name="username"
                               type="text">
                    </div>
                    <div class="form-group">
                        <input class="form-control password"
                               placeholder="Password"
                               name="password"
                               type="password">
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary width-150">Sign In</button>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
    
    <div class="single-page-block-footer text-center">
        <!--
        <ul class="list-unstyled list-inline">
            <li><a href="javascript: void(0);">Terms of Use</a></li>
            <li class="active"><a href="javascript: void(0);">Compliance</a></li>
            <li><a href="javascript: void(0);">Confidential Information</a></li>
            <li><a href="javascript: void(0);">Support</a></li>
            <li><a href="javascript: void(0);">Contacts</a></li>
        </ul>-->
    </div>
    
    <!-- End Login Omega Page -->

</div>

<!-- Page Scripts -->
<script>
    $(function() {

        // Add class to body for change layout settings
        $('body').addClass('single-page single-page-inverse');

        // Form Validation
        $('#form-validation').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-control-error',
                    errorClass: 'has-danger'
                }
            }
        });

        // Show/Hide Password
        $('.password').password({
            eyeClass: '',
            eyeOpenClass: 'icmn-eye',
            eyeCloseClass: 'icmn-eye-blocked'
        });

        // Set Background Image for Form Block
        function setImage() {
            var imgUrl = $('.page-content-inner').css('background-image');

            $('.blur-placeholder').css('background-image', imgUrl);
        };

        function changeImgPositon() {
            var width = $(window).width(),
                    height = $(window).height(),
                    left = - (width - $('.single-page-block-inner').outerWidth()) / 2,
                    top = - (height - $('.single-page-block-inner').outerHeight()) / 2;


            $('.blur-placeholder').css({
                width: width,
                height: height,
                left: left,
                top: top
            });
        };

        setImage();
        changeImgPositon();

        $(window).on('resize', function(){
            changeImgPositon();
        });

        // Mouse Move 3d Effect
        var rotation = function(e){
            var perX = (e.clientX/$(window).width())-0.5;
            var perY = (e.clientY/$(window).height())-0.5;
            TweenMax.to(".effect-3d-element", 0.4, { rotationY:15*perX, rotationX:15*perY,  ease:Linear.easeNone, transformPerspective:1000, transformOrigin:"center" })
        };

        if (!cleanUI.hasTouch) {
            $('body').mousemove(rotation);
        }

    });
</script>
<!-- End Page Scripts -->
</section>

<div class="main-backdrop"><!-- --></div>

</body>
</html>
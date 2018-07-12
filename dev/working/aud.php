<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Miles Online Testbank | Dashboard</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
            sessionStorage.fonts = true;}
                });
        </script>
        <style type="text/css" media="screen">
            .m--font-boldest{font-weight: 800!important;}
            .homepage-video{width: 410px; height: 220px;margin-left: -25px;border: 3px solid;box-shadow: 2px 2px 2px 2px #eee;}
            body{
                font-family: sans-serif !important;
            }
        </style>
        <link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="assets/demo/demo7/base/style.bundle.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <header class="m-grid__item m-header"  data-minimize-offset="200" data-minimize-mobile-offset="200">
            <?php include("include/header.php");?>
            </header>
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
                <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-light ">
                    <?php include("include/header/branding_desktop.php");?>
                    <div id="m_ver_menu" class="m-aside-menu m-aside-menu--skin-light m-aside-menu--submenu-skin-light" data-menu-vertical="true" data-menu-scrollable="true" data-menu-dropdown-timeout="500">
                        <?php include("include/menu.php");?>
                    </div>
                </div>
                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <div class="m-content">
                    <!--Begin::Section-->
<<<<<<< HEAD
                   <?php  include("pages/dashboard/Aud.php");?> 
=======
                   <?php // include("pages/dashboard/Aud.php");?>
>>>>>>> 5054208c6a26b04e6c7d0af8ece101537febcd21
                    <?php //include("pages/dashboard/Far_Begin.php");?>
                    <?php include("pages/dashboard/Far_Subtopic_Begin.php");?>

                    <!--End::Section-->
                    </div>
                </div>
            </div>
            <?php include("include/footer.php");?>
        </div>
        <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300"><i class="la la-arrow-up"></i></div>
        <script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="assets/demo/demo7/base/scripts.bundle.js" type="text/javascript"></script>
        <script src="pages/dashboard/dashboard.js" type="text/javascript"></script><!-- PageLevel Script -->
    </body>
</html>

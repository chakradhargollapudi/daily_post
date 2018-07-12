<!DOCTYPE html>
<html lang="en" >
   <head>
      <meta charset="utf-8" />
      <title>
         Internspace
      </title>
      <meta name="description" content="Latest updates and statistic charts">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
      <script>
         WebFont.load({
           google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
           active: function() {
               sessionStorage.fonts = true;
           }
         });
      </script>
      <link rel="stylesheet" type="text/css" href="<?=URL?>public/assets/css/imgareaselect-default.css" />
     
      <link href="<?=URL?>public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
      <link href="<?=URL?>public/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
      <link href="<?=URL?>public/assets/demo/demo9/base/style.bundle.css" rel="stylesheet" type="text/css" />

      <link rel="shortcut icon" href="<?=URL?>public/assets/demo/demo9/media/img/logo/favicon.ico" />
      <link rel="icon" href="{{ URL::to('/') }}/assets/img/favicon.png" type="image/png">
      <link rel="stylesheet" href="<?=URL?>public/assets/css/croppie.css" rel="stylesheet" type="text/css" />
<style>
</style>
      <link rel="stylesheet" href="<?=URL?>public/assets/css/summernote.css" rel="stylesheet" type="text/css" />
   </head>
   <body  class="m--skin- m-page--loading-enabled m-page--loading m-content--skin-light m-header--fixed m-header--fixed-mobile m-aside-left--offcanvas-default m-aside-left--enabled m-aside-left--fixed m-aside-left--skin-dark m-aside--offcanvas-default"  >
      <div class="m-page-loader m-page-loader--base">
         <div class="m-blockui">
            <span>
            Please wait...
            </span>
            <span>
               <div class="m-loader m-loader--brand"></div>
            </span>
         </div>
      </div>
      <div class="m-grid m-grid--hor m-grid--root m-page">
         <!-- BEGIN: Header -->
         <?php 
          include("application/views/adminpanel/layouts/header.php");
          include("application/views/adminpanel/layouts/leftmenu.php");
         ?>
         <!-- END: Header -->


<!-- -----------Begin: BODY Content----------- -->
         <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor-desktop m-grid--desktop m-body">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop">
               <div class="m-grid__item m-grid__item--fluid m-wrapper">
                  <div class="m-subheader ">
                     <div class="d-flex align-items-center">
                        <div class="mr-auto">
                           <h3 class="m-subheader__title"></h3>
                        </div>
                        <div>
                        </div>
                     </div>
                  </div>
                  <div class="m-content">
                     <div class="row">
                        <div class="col-md-12">
                           
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<!-- -----------End: BODY Content----------- -->

      </div>
      <div id="m_scroll_top" class="m-scroll-top">
         <i class="la la-arrow-up"></i>
      </div>
      <script src="<?=URL?>public/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
      <script src="<?=URL?>public/assets/demo/demo9/base/scripts.bundle.js" type="text/javascript"></script>

      <script src="<?=URL?>public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
      <script src="<?=URL?>public/assets/app/js/dashboard.js" type="text/javascript"></script>

      <script src="<?=URL?>public/assets/demo/default/custom/crud/forms/widgets/select2.js" type="text/javascript"></script>
      <script src="<?=URL?>public/assets/demo/default/custom/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
      <script src="<?=URL?>public/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
      <script src="<?=URL?>public/assets/demo/default/custom/crud/datatables/basic/headers.js" type="text/javascript"></script>
      <script src="<?=URL?>public/assets/js/summernote.js" type="text/javascript"></script>

      <script type="text/javascript" src="<?=URL?>public/assets/scripts/jquery.imgareaselect.pack.js"></script>
     <script type="text/javascript" src="<?=URL?>public/assets/js/croppie.js"></script>

      <script type="text/javascript">
     $(window).on('load', function() {
         $('body').removeClass('m-page--loading');         
     });
     </script>
   </body>
</html>

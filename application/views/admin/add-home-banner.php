<!DOCTYPE html>
 <html lang="en">
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Property Nidhi ||Add Home Banner</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="<?php echo base_url()?>assets/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/css/style_responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/css/style_default.css" rel="stylesheet" id="style_color" />

   <link href="<?php echo base_url()?>assets/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/uniform/css/uniform.default.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/theme-default.min.css"
    rel="stylesheet" type="text/css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <?php include('header.php') ?>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <?php include('side-bar.php') ?>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                   <!-- END THEME CUSTOMIZER-->
                  <h3 class="page-title">
                  Banner
                    
                  </h3>
                  <div class="spn6">
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Banner</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Add Banners</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                   </div>
                   <div class="spn6 chn">
                   <span class="pull-right spn6"><a href="<?php echo base_url() ?>admin/banners/banner" class="btn btn-primary"><i class="icon-eye-open icon-white"></i> View Home Banners  </a></span>
                   </div>
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
               <div class="span12">
                  <!-- BEGIN SAMPLE FORM widget-->   
                  <div class="widget">
                     <div class="widget-title">
                        <h4><i class="icon-reorder"></i>Sliders:</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="<?php echo base_url() ?>admin/banners/banner_insert" method="post" enctype="multipart/form-data" class="form-horizontal clearfix">
                          <div class="clearfix">
                            <div class="span6">

                             
                               <div class="control-group">
                                  <label class="control-label">Banner Name:</label>
                                  <div class="controls">
                                      <input type="text" name="title" data-validation="required" class="span12">
                                  </div>
                               </div>

                                <div class="control-group">
                                  <label class="control-label">Sort Order</label>
                                  <div class="controls">
                                      <input type="text" name="sort_order" data-validation="number required" class="span12">
                                  </div>
                               </div>

                               
                               <div class="control-group img-add">
                                  <label class="control-label">
                                    Image:
                                  </label>
                                    <div class="controls">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="icon-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                       <span class="btn btn-file">
                                       <span class="fileupload-new">Select file</span>
                                       <span class="fileupload-exists">Change</span>
                                       <input name="photo" data-validation="required"  type="file" class="default"  data-validation-error-msg="Please Select an Image" 
     data-validation-error-msg-container="#email-error-dialog">
                                       </span>
                                              <!--   <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a> -->
                                            </div>
                                            <div id="email-error-dialog"></div>
                                        </div>
                                        <span>(545*300px )</span>
                                    </div>
                                   <!--  <img src="<?php echo base_url()?>assets/admin/img/1.jpg" class="img-responsive"> -->
                               </div>

                              
                            </div>
                            <div class="span6">

                               <div class="control-group">
                                  <label class="control-label">Hyper Link:</label>
                                  <div class="controls">
                                      <input type="text" name="url"  data-validation="url" class="span12">
                                  </div>
                               </div>
                               
                               <div class="control-group">
                                  <label class="control-label">Status:</label>
                                  <div class="controls">
                                     <select class="span12 " name="status" data-placeholder="Choose a Category" data-validation="required" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="1">Active</option>
                                        <option value="0">In Active</option>
                                        
                                     </select>
                                  </div>
                               </div>

                              
                             
                            </div>
                            
                          </div>
                         
                          
                          
                          <div class="clearfix">
                            <div class="span12 text-right">
                              <button class="btn btn-large btn-primary">Submit</button>
                            </div>
                          </div>
                        </form>
                        <!-- END FORM-->           
                     </div>
                  </div>
                  <!-- END SAMPLE FORM widget-->
               </div>
            </div>
          
        
            <!-- END PAGE CONTENT-->         
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->  
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
  <?php include "footer.php" ?>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url()?>assets/admin/js/jquery-1.8.2.min.js"></script>    
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/ckeditor/ckeditor.js"></script>
   <script src="<?php echo base_url()?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="<?php echo base_url()?>assets/admin/js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url()?>assets/admin/js/excanvas.js"></script>
   <script src="<?php echo base_url()?>assets/admin/js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="<?php echo base_url()?>assets/admin/assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="<?php echo base_url()?>assets/admin/js/scripts.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins

         App.init();

      });
    $.validate(); 
   </script>
    <script>
     $.validate({
     modules : 'security, file,html5',
      // Instead of 'inline' which is default
    scrollToTopOnError : false
   });
  </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>
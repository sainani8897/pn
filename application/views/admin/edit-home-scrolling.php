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
                 Scrolling     
                  </h3>
                  <div class="spn6">
                   <ul class="breadcrumb">
                       <li>
                           <a href="<?php echo base_url() ?>admin/scrolls/scroll"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="<?php echo base_url() ?>admin/scrolls/scroll">Scrolling</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Add Scrolling</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                   </div>
                   <div class="spn6 chn">
                   <span class="pull-right spn6"><a href="<?php echo base_url() ?>admin/scrolls/scroll" class="btn btn-primary"><i class="icon-eye-open icon-white"></i> View Home Scrolling  </a></span>
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
                        <h4><i class="icon-reorder"></i>Scrolling:</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <?php if($this->session->flashdata("success_msg")){?>
                      <div class='alert alert-success'>
                  <button class='close' data-dismiss='alert'>×</button>
                  <strong><?php echo $this->session->flashdata("success_msg")?></strong>
                  </div>
                <?php } ?>
                <?php if($this->session->flashdata("error_msg")){?>
                      <div class='alert alert-info'>
                  <button class='close' data-dismiss='alert'>×</button>
                  <strong><?php echo $this->session->flashdata("error_msg")?></strong>
                  </div>
                <?php } ?>


                        <!-- BEGIN FORM-->
                        <form action="<?php echo base_url() ?>admin/scrolls/scroll_update" class="form-horizontal clearfix" method="post">
                          <div class="clearfix">
                            <div class="span6">

                                                            
                               

                             <!--   <div class="control-group">
                                    <label class="control-label">Date Range</label>
                                    <div class="controls">
                                        <div class="input-prepend">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                            <input type="text" data-validation="required" class="span12 date-range">
                                        </div>
                                    </div>
                                </div> -->

                                    <div class="control-group">
                                  <label class="control-label">URL :</label>
                                  <div class="controls">
                                    <input name="url" value="<?php echo $scrolls['link']; ?>" type="text" data-validation="url required" class="span12">
                                  </div>
                               </div>

                                <div class="control-group">
                                  <label class="control-label">Scrolling-Text:</label>
                                  <div class="controls">
                                    <textarea name="scroll_text" data-validation="required" class="span12" rows="5"><?php echo  $scrolls['scroll_name'] ?></textarea>
                                  </div>
                               </div>

                               
                            </div>
                            <div class="span6">

                              <input type="hidden" name="scroll_id" value="<?php echo $scrolls['sid']  ?>">
                              

                               <div class="control-group">
                                  <label class="control-label">Sort Order</label>
                                  <div class="controls">
                                  <input type="text" name="sort_order" value="<?php echo  $scrolls['sort_order'] ?>" data-validation="required number" class="span12">
                                  </div>
                               </div>
                              
                               
                               <div class="control-group">
                                  <label class="control-label">Status:</label>
                                  <div class="controls">
                                     <select name="status" data-validation="required" class="span12 " data-placeholder="Choose a Category" tabindex="1">
                                       <option value="">Select...</option>
                        
                                        <option value="1" <?php if ($scrolls['status'] == 1) echo "selected"; ?>>Active</option>
                                        <option value="0" <?php if ($scrolls['status'] == 0) echo "selected"; ?>>In Active</option>
                                        
                                     </select>
                                  </div>
                               </div>
                             
                            </div>
                          </div><br>
                          <div class="clearfix">
                            <div class="span12 text-right">
                              <button type="submit" class="btn btn-large btn-primary">Submit</button>
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
    <?php include('footer.php') ?>
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
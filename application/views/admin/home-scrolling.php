<!DOCTYPE html>
 <html lang="en"> 
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Property Nidhi|| Home Banner</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="<?php echo base_url()?>assets/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/css/style_responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url()?>assets/admin/css/style_default.css" rel="stylesheet" id="style_color" />

   <link href="<?php echo base_url()?>assets/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/assets/uniform/css/uniform.default.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
    <?php include("header.php") ?>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
     <?php include('side-bar.php') ?>
      <!-- END SIDEBAR MENU -->
    </div>
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
                  <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
                  <h3 class="page-title">
                  Scrolling
                    
                  </h3>
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Scrolling</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Home Scrolling</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                   <div class="chn">
                   <span class="pull-right"><a href="<?php echo base_url() ?>admin/scrolls/scroll_add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Add Home Scrolling </a></span>
                   </div>
                  <!-- END PAGE TITLE & BREADCRUMB-->
               </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->          
            
            
           
            <!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <?php if($this->session->flashdata("success_msg")){?>
                      <div class='alert alert-success'>
                  <button class='close' data-dismiss='alert'>×</button>
                  <strong> <?php echo($this->session->flashdata("success_msg"))?></strong>
                  </div>
                <?php } ?>
                <?php if($this->session->flashdata("error_msg")){?>
                      <div class='alert alert-error'>
                  <button class='close' data-dismiss='alert'>×</button>
                  <strong> <?php echo($this->session->flashdata("error_msg"))?></strong>
                  </div>
                <?php } ?>

                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Managed Table</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                
                                    <th>S.No</th>
                                    <th>SCRID</th>
                                    <th class="hidden-phone">Text</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Hyper Link</th>
                                    <th class="hidden-phone">Status</th>
                                    <th class="hidden-phone">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1;
                               foreach ($scrolling->result() as $scr) { ?>
                                <tr class="odd gradeX">
                                  
                                    <td><?php echo $i; ?></td>
                                     <td>SCRID<?php echo $scr->sid ?> </td>
                                    <td class="hidden-phone"><?php echo $scr->scroll_name ?></td>
                                    <td class="hidden-phone">22-11-2017 to 23-12-2018</td>
                                    <td class="center hidden-phone"><?php echo $scr->link ?></td>
                                 <td class="hidden-phone">
                                      <?php if ($scr->status == 1): ?>

                                      <span class="label label-success">Active</span>
                                    <?php else: ?>

                                        
                                      <span class="label label-warning">In-Active</span>

                                    <?php endif; ?>


                                       
                                    </td>
                                    <td class="hidden-phone" width="160px">
                                      <a class="dropdown-toggle element icons" data-placement="top" data-toggle="tooltip" href="<?php echo base_url() ?>admin/scrolls/scroll_edit/<?php echo $scr->sid ?>" data-original-title="Edit">
                                       <i class="icon-edit"></i>
                                      </a>
                                      <a class="dropdown-toggle element icons green" data-placement="top" data-toggle="tooltip" href="<?php echo base_url() ?>admin/scrolls/scroll_view/<?php echo $scr->sid ?>" data-original-title="View">
                                       <i class="icon-eye-open"></i>
                                      </a>
                                      <a onclick="deleteRecord(<?php echo $scr->sid ?>)" class="dropdown-toggle element icons red"  data-toggle="modal" href="#deleteEmployeeModal">
                                       <i class="icon-trash"></i>
                                      </a>
                                    </td>
                                </tr>
                              <?php $i++; } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->

            <!-- END PAGE CONTENT-->
         </div>
         <!-- END PAGE CONTAINER-->
      </div>
      <!-- END PAGE -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <?php include('footer.php') ?>
    <div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo base_url() ?>admin/scrolls/scroll_delete" method="post">
          <div class="modal-header">  
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>          
            <h4 class="modal-title">Delete this Record</h4>

          </div>
          <div class="modal-body">          
            <p>Are you sure you want to delete these Records?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="scroll_id" id="delete_id" value="">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger delete-row" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="<?php echo base_url()?>assets/admin/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url()?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>   
   <script src="<?php echo base_url()?>assets/admin/js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="<?php echo base_url()?>assets/admin/js/excanvas.js"></script>
   <script src="<?php echo base_url()?>assets/admin/js/respond.js"></script>
   <![endif]-->   
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="<?php echo base_url()?>assets/admin/assets/data-tables/DT_bootstrap.js"></script>
   <script src="<?php echo base_url()?>assets/admin/js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
   <script type="text/javascript">
     function deleteRecord(id){
      $('#delete_id').val(id);
     }
   </script>
</body>
<!-- END BODY -->
</html>

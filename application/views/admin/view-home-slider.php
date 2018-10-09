<!DOCTYPE html>
 <html lang="en">
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Property Nidhi ||Add Home Slider</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style_responsive.css" rel="stylesheet" />
   <link href="css/style_default.css" rel="stylesheet" id="style_color" />

   <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
   <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
   <link rel="stylesheet" type="text/css" href="assets/uniform/css/uniform.default.css" />
   <link rel="stylesheet" type="text/css" href="assets/chosen-bootstrap/chosen/chosen.css" />
   <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css" />    
   <link rel="stylesheet" type="text/css" href="assets/clockface/css/clockface.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css" />
   <link rel="stylesheet" href="assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
   <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker.css" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN HEADER -->
   <div id="header" class="navbar navbar-inverse navbar-fixed-top">
       <!-- BEGIN TOP NAVIGATION BAR -->
       <div class="navbar-inner">
      <div class="container-fluid">
        <!-- BEGIN LOGO -->
        <a class="brand" href="index.php">
            <img src="img/logo.png" alt="Admin Lab" />
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="arrow"></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div id="top_menu" class="nav notify-row">
                    <!-- BEGIN NOTIFICATION -->
          <ul class="nav top-menu">
                        <!-- BEGIN SETTINGS -->
                        <li class="dropdown">
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Settings">
                                <i class="icon-cog"></i>
                            </a>
                        </li>
                        <!-- END SETTINGS -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <li class="dropdown" id="header_inbox_bar">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-envelope-alt"></i>
                                <span class="badge badge-important">5</span>
                            </a>
                            <!-- <ul class="dropdown-menu extended inbox">
                                <li>
                                    <p>You have 5 new messages</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                  <span class="subject">
                  <span class="from">Dulal Khan</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                      Hello, this is an example messages please check
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                  <span class="subject">
                  <span class="from">Rafiqul Islam</span>
                  <span class="time">10 mins</span>
                  </span>
                  <span class="message">
                   Hi, Mosaddek Bhai how are you ?
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                  <span class="subject">
                  <span class="from">Sumon Ahmed</span>
                  <span class="time">3 hrs</span>
                  </span>
                  <span class="message">
                      This is awesome dashboard templates
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img src="./img/avatar-mini.png" alt="avatar" /></span>
                  <span class="subject">
                  <span class="from">Dulal Khan</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                      Hello, this is an example messages please check
                  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">See all messages</a>
                                </li>
                            </ul> -->
                        </li>
                        <!-- END INBOX DROPDOWN -->
            <!-- BEGIN NOTIFICATION DROPDOWN -->
            <li class="dropdown" id="header_notification_bar">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="icon-bell-alt"></i>
              <span class="badge badge-warning">7</span>
              </a>
              <!-- <ul class="dropdown-menu extended notification">
                <li>
                  <p>You have 7 new notifications</p>
                </li>
                <li>
                  <a href="#">
                  <span class="label label-important"><i class="icon-bolt"></i></span>
                  Server #3 overloaded.
                  <span class="small italic">34 mins</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <span class="label label-warning"><i class="icon-bell"></i></span>
                  Server #10 not respoding.
                  <span class="small italic">1 Hours</span>
                  </a>
                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-important"><i class="icon-bolt"></i></span>
                                        Database overloaded 24%.
                                        <span class="small italic">4 hrs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-success"><i class="icon-plus"></i></span>
                                        New user registered.
                                        <span class="small italic">Just now</span>
                                    </a>
                                </li>
                <li>
                  <a href="#">
                  <span class="label label-info"><i class="icon-bullhorn"></i></span>
                  Application error.
                  <span class="small italic">10 mins</span>
                  </a>
                </li>
                <li>
                  <a href="#">See all notifications</a>
                </li>
              </ul> -->
            </li>
            <!-- END NOTIFICATION DROPDOWN -->

          </ul>
                </div>
                    <!-- END  NOTIFICATION -->
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu" >
                        <!-- BEGIN SUPPORT -->
                        <li class="dropdown mtop5">

                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                                <i class="icon-comments-alt"></i>
                            </a>
                        </li>
                        <li class="dropdown mtop5">
                            <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                                <i class="icon-headphones"></i>
                            </a>
                        </li>
                        <!-- END SUPPORT -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="img/avatar1_small.jpg" alt="">
                                <span class="username">Property Nidhi</span>
              <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>
                <li><a href="#"><i class="icon-calendar"></i> Calendar</a></li>
                <li class="divider"></li>
                <li><a href="login.php"><i class="icon-key"></i> Log Out</a></li>
              </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
          </ul>
          <!-- END TOP NAVIGATION MENU -->
        </div>
      </div>
    </div>
       <!-- END TOP NAVIGATION BAR -->
   </div>
   <!-- END HEADER -->
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <?php include('includes/side-bar.php') ?>
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
                    Sliders
                    
                  </h3>
                  <div class="spn6">
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Sliders</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Add Sliders</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                   </div>
                   <div class="spn6 chn">
                   <span class="pull-right spn6"><a href="home-slider.php" class="btn btn-primary"><i class="icon-eye-open icon-white"></i> View Home Sliders  </a></span>
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
                        <form action="#" class="form-horizontal clearfix">
                          <div class="clearfix">
                            <div class="span6">

                              
                               <div class="control-group">
                                  <label class="control-label">Slider Name:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>

                               <div class="control-group">
                                  <label class="control-label">Sort Order</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
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
                                       <input type="file" class="default">
                                       </span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                        <span>(1920*350px)</span>
                                    </div>
                                    <img src="img/1.jpg" class="img-responsive">
                               </div>

                              
                            </div>
                            <div class="span6">

                               <div class="control-group">
                                  <label class="control-label">Hyper Link:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               
                               <div class="control-group">
                                  <label class="control-label">Status:</label>
                                  <div class="controls">
                                     <select class="span12 " data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="Category 1">Active</option>
                                        <option value="Category 2">In Active</option>
                                        
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
   <div id="footer">
    2018 &copy; Admin Property Nidhi.
    <div class="span pull-right">
      <span class="go-top"><i class="icon-arrow-up"></i></span>
    </div>
  </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <script src="js/jquery-1.8.2.min.js"></script>    
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap/js/bootstrap-fileupload.js"></script>
   <script src="js/jquery.blockui.js"></script>
   <!-- ie8 fixes -->
   <!--[if lt IE 9]>
   <script src="js/excanvas.js"></script>
   <script src="js/respond.js"></script>
   <![endif]-->
   <script type="text/javascript" src="assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
   <script type="text/javascript" src="assets/uniform/jquery.uniform.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/clockface/js/clockface.js"></script>
   <script type="text/javascript" src="assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
   <script type="text/javascript" src="assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
   <script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>   
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/date.js"></script>
   <script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
   <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>  
   <script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
   <script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
   <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
   <script src="js/scripts.js"></script>
   <script>
      jQuery(document).ready(function() {       
         // initiate layout and plugins
         App.init();
      });
   </script>
   <!-- END JAVASCRIPTS -->   
</body>
<!-- END BODY -->
</html>
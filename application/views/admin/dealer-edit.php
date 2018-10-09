<!DOCTYPE html>
 <html lang="en">
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8" />
   <title>Property Nidhi||Dealers</title>
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
                           <ul class="dropdown-menu extended inbox">
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
                           </ul>
                       </li>
                       <!-- END INBOX DROPDOWN -->
                       <!-- BEGIN NOTIFICATION DROPDOWN -->
                       <li class="dropdown" id="header_notification_bar">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                               <i class="icon-bell-alt"></i>
                               <span class="badge badge-warning">7</span>
                           </a>
                           <ul class="dropdown-menu extended notification">
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
                           </ul>
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
                               <span class="username">Mosaddek Hossain</span>
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
                  Dealers
                  </h3>
                  <div class="spn6">
                   <ul class="breadcrumb">
                       <li>
                           <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#">Users</a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#">Dealers</a><span class="divider-last">&nbsp;</span></li>
                   </ul>
                   </div>
                   <div class="spn6 chn">
                   <span class="pull-right spn6"><a href="dealers.php" class="btn btn-primary"><i class="icon-eye-open icon-white"></i> View Dealers  </a></span>
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
                        <h4><i class="icon-reorder"></i>Employees:</h4>
                        <span class="tools">
                           <a href="javascript:;" class="icon-chevron-down"></a>
                           <a href="javascript:;" class="icon-remove"></a>
                        </span>
                     </div>
                     <div class="widget-body form">
                        <!-- BEGIN FORM-->
                        <form action="#" class="form-horizontal clearfix">
                          
                        <div class="clearfix m-b-30">
                            <div class="span6">
                              <h5 class="heding"><b>Dealers Details:</b></h5>

                              <div class="control-group">
                                <label class="control-label">Type:</label>
                                <div class="controls">
                                    <label class="radio">
                                    <div class="radio" id="uniform-undefined"><span><div class="radio" id="uniform-undefined"><span><input type="radio" name="optionsRadios1" value="option1" style="opacity: 0;"></span></div></span></div>
                                    Individual
                                    </label>
                                    <label class="radio">
                                    <div class="radio" id="uniform-undefined"><span class="checked"><div class="radio" id="uniform-undefined"><span><input type="radio" name="optionsRadios1" value="option2" checked="" style="opacity: 0;"></span></div></span></div>
                                    Company
                                    </label>  
                                     
                                </div>
                            </div>


                            <div class="control-group">
                                  <label class="control-label">State:</label>
                                  <div class="controls">
                                     <select class="span12 " data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="Category 1">Telangana</option>
                                        <option value="Category 2">Telangana</option>
                                        <option value="Category 3">Telangana</option>
                                        <option value="Category 4">Telangana</option>
                                     </select>
                                  </div>
                               </div>

                               <div class="control-group">
                                  <label class="control-label">City:</label>
                                  <div class="controls">
                                     <select class="span12 " data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="Category 1">Hyderabad</option>
                                        <option value="Category 2">Hyderabad</option>
                                        <option value="Category 3">Hyderabad</option>
                                        <option value="Category 4">Hyderabad</option>
                                     </select>
                                  </div>
                               </div>

                               <div class="control-group">
                                  <label class="control-label">Dealer Name:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Owner Name:</label>
                                  <div class="controls">
                                     <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Phone Number:</label>
                                  <div class="controls">
                                     <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Alternate Number:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Email:</label>
                                    <div class="controls">
                                    <input type="text" class="span12">
                                    </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Logo:</label>
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
                                    </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Dealing In:</label>
                                  <div class="controls">
                                     <select class="span12 " data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="Category 1">Hyderabad</option>
                                        <option value="Category 2">Hyderabad</option>
                                        <option value="Category 3">Hyderabad</option>
                                        <option value="Category 4">Hyderabad</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Expertise:</label>
                                  <div class="controls">
                                     <select class="span12 " data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="Category 1">Expertise</option>
                                        <option value="Category 2">Expertise</option>
                                        <option value="Category 3">Expertise</option>
                                        <option value="Category 4">Expertise</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Available Timings:</label>
                                  <div class="controls">
                                     <select class="span12 " data-placeholder="Choose a Category" tabindex="1">
                                        <option value="">Select...</option>
                                        <option value="Category 1">10am-11am</option>
                                        <option value="Category 2">10am-11am</option>
                                        <option value="Category 3">10am-11am</option>
                                        <option value="Category 4">10am-11am</option>
                                     </select>
                                  </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Dealing Property</label>
                                    <div class="controls">
                                        <label class="checkbox">
                                        <div class="checker" id="uniform-undefined"><span><input type="checkbox" value="" style="opacity: 0;"></span></div> Lands
                                        </label>
                                        <label class="checkbox">
                                        <div class="checker" id="uniform-undefined"><span><input type="checkbox" value="" style="opacity: 0;"></span></div> Lands
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Banner:</label>
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
                                    </div>
                               </div>



                               
                               
                            </div>
                            <div class="span6">
                              <h5 class="heding"><b>Personal Details:</b></h5>
                              <div class="control-group">
                                  <label class="control-label">Adhar Number:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Pan Number:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               
                               <div class="control-group">
                                    <label class="control-label">Photo:</label>
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
                                    </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Local Address Proof:</label>
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
                                    </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Permanent Address Proof:</label>
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
                                    </div>
                               </div>
                               
                               <div class="control-group">
                                    <label class="control-label">Adhar Card:</label>
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
                                    </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Pan Card:</label>
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
                                    </div>
                               </div>

                               <h5 class="heding"><b>Bank Details::</b></h5>
                               <div class="control-group">
                                  <label class="control-label">Bank Name:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Branch Name:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Account Number:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">IFSC Code:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>

                              
                               
                            </div>
                        </div>
                            <hr>
                          <div class="clearfix">
                            <div class="span6">
                              <h5 class="heding"><b>Company Details:</b></h5>
                              <div class="control-group">
                                  <label class="control-label">Company Name:</label>
                                  <div class="controls">
                                     <input type="text" class="span12">
                                    </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">GST No:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Change Password:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Logo:</label>
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
                                    </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Establishment Year:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Address:</label>
                                    <div class="controls">
                                        <textarea class="span12" rows="3"></textarea>
                                    </div>
                               </div>
                               <div class="control-group">
                                    <label class="control-label">Description:</label>
                                    <div class="controls">
                                        <textarea class="span12" rows="3"></textarea>
                                    </div>
                               </div>
                               
                            </div>
                            <div class="span6">
                              <h5 class="heding"><b>Company Bank Details:</b></h5>
                              <div class="control-group">
                                  <label class="control-label">Bank Name:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Branch Name:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">Account Number:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
                                  </div>
                               </div>
                               <div class="control-group">
                                  <label class="control-label">IFSC Code:</label>
                                  <div class="controls">
                                      <input type="text" class="span12">
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
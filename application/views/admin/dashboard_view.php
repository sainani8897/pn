<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title> Property Nidhi||Admin Dashboard </title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/css/style_default.css" rel="stylesheet" id="style_color" />

	<link href="<?php echo base_url(); ?>assets/admin/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/assets/uniform/css/uniform.default.css" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
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
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Dashboard
							<small> General Information </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            <li>
                                <a href="#">Property Nidhi</a> <span class="divider">&nbsp;</span>
                            </li>
							<li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
                            <li class="pull-right search-wrap">
                                <form class="hidden-phone">
                                    <div class="search-input-area">
                                        <input id=" " class="search-query" type="text" placeholder="Search">
                                        <i class="icon-search"></i>
                                    </div>
                                </form>
                            </li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div id="page" class="dashboard">
                    <!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
                    <div class="square-state">
                        <div class="row-fluid">
                            <a class="icon-btn span2" href="#">
                                
                                <div>Users</div>
                                <p>5000</p>
                            </a>
                            <a class="icon-btn span2" href="#">
                                
                                <div>Franchises</div>
                                <p>5000</p>
                            </a>
                            <a class="icon-btn span2" href="#">
                                
                                <div>Dealers</div>
                                <p>500</p>
                            </a>
                            <a class="icon-btn span2" href="#">
                                
                                <div>Builders</div>
                                <p>200</p>
                            </a>
                            <a class="icon-btn span2" href="#">
                                
                                <div>Colonies</div>
                                <p>5000</p>
                            </a>
                            <a class="icon-btn span2" href="#">
                               
                                <div>States</div>
                                <p>10</p>
                               
                            </a>
                        </div>
                        <div class="row-fluid">
                            <a class="icon-btn span2" href="#">
                               
                                <div>Cities</div>
                                <p>6000</p>
                               
                            </a>
                            <a class="icon-btn span2" href="#">
                               
                                <div>Projects</div>
                                <p>6000</p>
                            </a>
                            <a class="icon-btn span2" href="#">
                               
                                <div>Packages</div>
                                <p>2000</p>
                            </a>
                            <a class="icon-btn span2" href="#">
                                
                                <div>Service Categories</div>
                                <p>5000</p>
                            </a>
                            
                        </div>
                    </div>

                    <!-- END OVERVIEW STATISTIC BLOCKS-->

                    <!-- END SQUARE STATISTIC BLOCKS-->
					<div class="row-fluid">
                        <div class="span6">
                            <!-- BEGIN RECENT ORDERS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-tags"></i> Recent Users</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th><i class="icon-user"></i> <span class="hidden-phone">Name</span></th>

                                            <th><i class="icon-envelope"></i> <span class="hidden-phone ">Email</span></th>

                                            <th><i class="icon-phone"> </i><span class="hidden-phone">Phone</span></th>

                                            <th><i class="icon-info-sign"> </i><span class="hidden-phone">Details</span></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                      
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <!-- END RECENT ORDERS PORTLET-->
                        </div>
                        <div class="span6">
                            <!-- BEGIN RECENT ORDERS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-tags"></i> Recents Franchises</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th><i class="icon-user"></i> <span class="hidden-phone">Name</span></th>

                                            <th><i class="icon-envelope"></i> <span class="hidden-phone ">Email</span></th>

                                            <th><i class="icon-phone"> </i><span class="hidden-phone">Phone</span></th>

                                            <th><i class="icon-info-sign"> </i><span class="hidden-phone">Details</span></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                      
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <!-- END RECENT ORDERS PORTLET-->
                        </div>
					</div>
					<div class="row-fluid">
                        <div class="span6">
                            <!-- BEGIN RECENT ORDERS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-tags"></i> Recents Dealers</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th><i class="icon-user"></i> <span class="hidden-phone">Name</span></th>

                                            <th><i class="icon-envelope"></i> <span class="hidden-phone ">Email</span></th>

                                            <th><i class="icon-phone"> </i><span class="hidden-phone">Phone</span></th>

                                            <th><i class="icon-info-sign"> </i><span class="hidden-phone">Details</span></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                      
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <!-- END RECENT ORDERS PORTLET-->
                        </div>
                        <div class="span6">
                            <!-- BEGIN RECENT ORDERS PORTLET-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-tags"></i> Recents Builders</h4>
                                        <span class="tools">
                                        <a href="javascript:;" class="icon-chevron-down"></a>
                                        <a href="javascript:;" class="icon-remove"></a>
                                        </span>
                                </div>
                                <div class="widget-body">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th><i class="icon-user"></i> <span class="hidden-phone">Name</span></th>

                                            <th><i class="icon-envelope"></i> <span class="hidden-phone ">Email</span></th>

                                            <th><i class="icon-phone"> </i><span class="hidden-phone">Phone</span></th>

                                            <th><i class="icon-info-sign"> </i><span class="hidden-phone">Details</span></th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="highlight">
                                                <a href="#">Suresh</a>
                                            </td>
                                            <td>
                                              Suresh@gmail.com
                                            </td>
                                            <td>
                                             +91 1234567890
                                            </td>
                                            <td>
                                            	<a href="#" class="btn btn-mini hidden-phone hidden-tablet">View More</a>
                                            </td>
                                        </tr>
                                      
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <!-- END RECENT ORDERS PORTLET-->
                        </div>
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
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.8.3.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.blockui.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.cookie.js"></script>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="js/excanvas.js"></script>
	<script src="js/respond.js"></script>
	<![endif]-->
	<script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/admin/assets/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
	


	<script src="<?php echo base_url(); ?>assets/admin/js/jquery.peity.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/assets/uniform/jquery.uniform.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
	<script>
		jQuery(document).ready(function() {
			// initiate layout and plugins
			App.setMainPage(true);
			App.init();
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
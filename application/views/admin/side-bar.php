<div id="sidebar" class="nav-collapse collapse">
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->

			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<div class="navbar-inverse">
				<form class="navbar-search visible-phone">
					<input type="text" class="search-query" placeholder="Search" />
				</form>
			</div>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="sidebar-menu">
				<li class="has-sub active">
					<a href="index.php" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span> Dashboard
                        
                    </a>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span>Sliders
					    <span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="home-slider.php">Main Home</a></li>
						<li><a class="" href="state-wise-slider.php">State wise</a></li>
						<!-- <li><a class="" href="city-wise-slider.php">City Wise</a></li>
						<li><a class="" href="area-wise-slider.php">Area Wise</a></li> -->
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span>Sub Slider
					    <span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="home-slider2.php">Main Home</a></li>
						<li><a class="" href="state-wise-slider2.php">State wise</a></li>
						<!-- <li><a class="" href="city-wise-slider2.php">City Wise</a></li>
						<li><a class="" href="area-wise-slider2.php">Area Wise</a></li> -->
					</ul>
				</li>
				<li class="has-sub <?php if($this->uri->segment(2)=='banners') echo 'open'; ?>">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span>Banners
					    <span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="<?php echo base_url() ?>admin/banners/banner">Main Home</a></li>
						<li><a class="" href="state-banner.php">State wise</a></li>
						<!-- <li><a class="" href="city-banner.php">City Wise</a></li>
						<li><a class="" href="area-banner.php">Area Wise</a></li> -->
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span>scrolling
					    <span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="home-scrolling.php">Main Home</a></li>
						<li><a class="" href="state-scrolling.php">State wise</a></li>
						<!-- <li><a class="" href="city-scrolling.php">City Wise</a></li>
						<li><a class="" href="area-scrolling.php">Area Wise</a></li> -->
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span>Users
					    <span class="arrow"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="admins.php">Admins</a></li>
						<li><a class="" href="franchises.php">Franchises</a></li>
						<li><a class="" href="dealers.php">Dealers</a></li>
						<li><a class="" href="users.php">Users</a></li>
						<li><a class="" href="builders.php">Builders</a></li>
						<li><a class="" href="#">Service Vendors</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span>Posts
					    <span class="arrow"></span>
					</a>
					<ul class="sub">
					    <li><a class="" href="post-requirement.php">Post Requirement</a></li>
						<li class="has-sub"><a href="post-property.php" class="">Post Property </a></li>
						
					</ul>
				</li>
				<li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-arrow-right"></i></span> Values
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="state-values.php">States</a></li>
                        <li><a class="" href="city-values.php">Cities</a></li>
						<li><a class="" href="area-values.php">Areas</a></li>
                        <li><a class="" href="service-categories.php">Service Categories</a></li>
						<li><a class="" href="#">Sub Services</a></li>

						
						
                    </ul>
                </li>
				<li class="has-sub">
                    <a href="javascript:;" class="">
                        <span class="icon-box"><i class="icon-arrow-right"></i></span> Pages
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li><a class="" href="about-us.php">About Us</a></li>
                        <li><a class="" href="terms-conditions.php">Terms & Conditions</a></li>
                        <li><a class="" href="privacy-policy.php">Privacy & Policy</a></li>
                        <li><a class="" href="faqs.php">FAQ'S</a></li>
                        <li><a class="" href="testimonials.php">Testimonials</a></li>
                        
                        
                        <li><a class="" href="packages.php">Packages</a></li>
                        <li><a class="" href="customer-services.php">Customer Services</a></li>
                        <li><a class="" href="become-a-dealer.php">Become a Dealer</a></li>
                    </ul>
                </li>
				<li class="has-sub">
					<a href="seo.php" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span> Seo
                        
                    </a>
				</li>
				
				<li class="has-sub">
					<a href="javascript:;" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span>Services
					    <span class="arrow"></span>
					</a>
					<ul class="sub">
					    <li><a class="" href="sub-services.php">Sub Services</a></li>
						
						
					</ul>
				</li>
				<li class="has-sub">
					<a href="alerts.php" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span> Alerts
                        
                    </a>
				</li>
                <li class="has-sub">
					<a href="partner-with-us.php" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span> Partner With Us
                        
                    </a>
				</li>
				<li class="has-sub">
					<a href="info-colony.php" class="">
					    <span class="icon-box"> <i class="icon-arrow-right"></i></span> Colonies
                        
                    </a>
				</li>
				<li><a class="" href="projects.php"><span class="icon-box"><i class="icon-arrow-right"></i></span> Projects</a></li>
				<li><a class="" href="feedback.php"><span class="icon-box"><i class="icon-arrow-right"></i></span> Feedback</a></li>
				<li><a class="" href="glossary.php"><span class="icon-box"><i class="icon-arrow-right"></i></span> Glossary</a></li>
				<li><a class="" href="web-settings.php"><span class="icon-box"><i class="icon-arrow-right"></i></span> Web Settings</a></li>
				<li><a class="" href="blog.php"><span class="icon-box"><i class="icon-arrow-right"></i></span> Blog</a></li>
				<li><a class="" href="#"><span class="icon-box"><i class="icon-arrow-right"></i></span> Buy</a></li>
				<li><a class="" href="#"><span class="icon-box"><i class="icon-arrow-right"></i></span> Rent</a></li>
				<li><a class="" href="#"><span class="icon-box"><i class="icon-arrow-right"></i></span> Info</a></li>
				<li><a class="" href="#"><span class="icon-box"><i class="icon-arrow-right"></i></span> Test</a></li>
				
				
				
				
				
                
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>



		<!-- Delete Modal HTML -->

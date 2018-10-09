<!DOCTYPE html>
 <html lang="en"> 
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Property Nidhi || Login</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>assets/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin/css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
      <div id="logo" class="center">
          <img src="<?php echo base_url(); ?>assets/admin/img/logo.png" alt="logo" class="center" />
      </div>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" method="post" action="<?php echo base_url(); ?>admin/login/user_login">
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
          <h4>User Login</h4>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span><input id="input-username" type="email" name="email" placeholder="Email" required />
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-key"></i></span><input id="input-password" name="password" type="password" placeholder="Password" required />
                  </div>
                  <div class="mtop10">
                      <div class="block-hint pull-left small">
                          <input type="checkbox" id=""> Remember Me
                      </div>
                      <div class="block-hint pull-right">
                          <a href="javascript:;" class="" id="forget-password">Forgot Password?</a>
                      </div>
                  </div>

                  <div class="clearfix space5"><?php echo $this->session->flashdata('error'); ?></div>
              </div>

          </div>
      </div>
       <button type="submit" class="btn btn-block login-btn">Submit</button>
      
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="<?php echo base_url(); ?>assets/admin/index.html">
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      2018 &copy; Property Nidhi.
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/admin/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/jquery.blockui.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
  <script>
    jQuery(document).ready(function() {     
      App.initLogin();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
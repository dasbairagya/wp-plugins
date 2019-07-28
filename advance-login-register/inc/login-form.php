
<div id="msg-success"></div>
  <div id="loadersmall"></div>
  <div id="overlay"></div>
    <div class="row">

        <div class="col-md-12">
        <div id="msg-log" style="margin-top: 15px;"></div>
        <div id="msg-reg"></div>
      <div class="flip">
        <div class="card"> 
          <div class="face front"> 
            <div class="panel panel-default">
              <!-- start: login form -->
               <!-- <?php echo do_shortcode('[wordpress_social_login]'); ?> --> 
              <form class="form-horizontal" id="login-form">
                
                <br>
                 <div class="logo center">
                  
                    <a href="<?php echo home_url();?>">
                    <img src="<?php echo $redux_demo['logo_media'] ['url']; ?>" alt="main logo">
                        
                    </a>
                </div>

                <br>
                <input id="login_username" class="form-control" name="username" 
                 placeholder="*Email" type="text" >
                <!-- <input class="form-control" placeholder="Username"/> -->
                <input id="login_password" class="form-control" name="password" 
                 placeholder="*password" type="password">
                <!-- <input class="form-control" placeholder="Password"/> -->
                <div class="text-left" style="float: left;">
                  <input id="remember_me_checkbox" name="remember_me_checkbox"
                  class="checkbox1"  type="checkbox"> Remember me</div>
                <div class="text-right" style="float: right;"><a href="#" onclick="forgot()">Forgot Password?</a></div>
                <button class="btn btn-primary btn-block" id="log_btn_sub">LOG IN</button>
             
                <div class="text-center">
                  <a href="#" class="fliper-btn">Create new account?</a>
                </div>
                <?php wp_nonce_field( 'login-form' ); ?>
              </form>
              <!-- end: login form -->
              <!-- start:forgot password -->
                <div id="list1" class="form-horizontal">
                 <br>
                 <div class="logo center">
                   <a href="<?php echo home_url();?>">
                    <img src="<?php echo $redux_demo['logo_media'] ['url']; ?>" alt="main logo">
                        
                    </a>
                </div>
                      <form name="lostpasswordform" id="lostpasswordform" >

                              <input type="text" name="user_login" id="lost_email" class="form-control"  placeholder="Enter your email here" required>
                            <input type="hidden" name="action" value="reset" id="action"/>
                              <button id="wp-submit" class="btn btn-primary btn-block">Get New Password</button>
                              <p class="text-center">
                                <a href="#" onclick="back_to_login()">Back to Login</a>
                              </p>
                              
                      </form>
            
              </div>
              <!-- ends:forgot password -->
            </div>
          </div> 




          <div class="face back"> 
              <div class="panel panel-default">
              <form class="form-horizontal" id="register-form">
                <br>

                <div class="logo center">
                    <a href="<?php echo home_url();?>">
                       <img src="<?php echo $redux_demo['logo_media'] ['url']; ?>" alt="main logo">
                    </a>
                </div>
                <br>
                <input id="uname" class="form-control required" name="uname" 
                 placeholder="*Name" type="text">
                <input id="businessname" class="form-control required" name="businessname" 
                 placeholder="*Business Name" type="text">
                 <input id="uphone" class="form-control number required" name="uphone" 
                 placeholder="*Contact Number" type="text">
                 <input id="uemail" class="form-control email_required" name="uemail" 
                 placeholder="*Email" type="email">
                 <input id="upass" class="form-control required" name="upassword" 
                 placeholder="*Password" type="password">
                 <input id="cpass" class="form-control chk_password" name="cpassword" 
                 placeholder="*Re Enter Password " type="password">

                <button class="btn btn-primary btn-block" id="register-submit">SIGN UP</button>
                <p class="text-center">
                  <a href="#" class="fliper-btn">Already have an account?</a>
                </p>
                
              </form>

            </div>

          </div>
        </div>   
      </div>

        </div>


      </div>
      <script type="text/javascript">
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
      </script>


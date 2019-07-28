<?php
 if ( !is_user_logged_in() ) : ?>
  <p class="warning">
      <?php _e('You must be <a href="'.site_url().'/alrl">logged</a> in to edit your profile.', 'profile'); ?>
  </p>
<?php exit; endif; ?>
<hr>
<div class="bootstrap snippet">
  <div class="row">
    <div class="col-sm-9">
      <h1> Hello <?php echo ' '. $current_user->display_name;?> !
      </h1>
    </div>
    <div class="col-sm-3">
      <div class="pull-right"  id="time">

    </div>
  </div>
  </div>
  <div class="row">
    <div class="col-sm-3">
      <!--left col-->
      <div class="text-center">

        <img src="<?php echo $img;?>" class="avatar img-circle img-thumbnail" alt="avatar">
      </div>
      </hr>
    <br>
    <a href="#" class="nav-tabs-dropdown btn btn-block btn-primary"> 
      <i class="fa fa-dashboard fa-1x">
      </i> Dashboard
    </a>
    <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
      <li class="active">
        <a href="#vtab1" data-toggle="tab">
          <i class="fa fa-user-o" aria-hidden="true">
          </i>
          Accounts
        </a>
      </li>
      <li>
        <a href="#vtab2" data-toggle="tab">
          <i class="fa fa-lock" aria-hidden="true">
          </i>
          Security
        </a>
      </li>
      <li>
        <a href="#vtab3" data-toggle="tab">
          <i class="fa fa-envelope-o" aria-hidden="true">
          </i>
          Email & Notifications
        </a>
      </li>
      <li>
        <a href="#vtab4" data-toggle="tab"> 
          <i class="fa fa-comments-o" aria-hidden="true">
          </i>
          Messages
        </a>
      </li> 
      <li>
        <a href="<?php echo wp_logout_url( $redirect = '' );?>"> 
          <i class="fa fa-sign-out" aria-hidden="true"></i>

          Log Out
        </a>
      </li>
    </ul>
  </div>
  <!--/col-3-->
  <div class="col-sm-9">
    <form class="form" action="<?php esc_url( $_SERVER['REQUEST_URI'] );?>" method="POST" id="my_account_update" enctype="multipart/form-data">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
          <h3>Accounts
          </h3>
          <hr>
          <ul class="nav nav-tabs">
            <li class="active">
              <a data-toggle="tab" href="#profile">Profile
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#address">Address
              </a>
            </li>
            <li>
              <a data-toggle="tab" href="#info">Info
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <div class="form-group">
                <div class="col-xs-6">
                  <label for="first_name">
                    <h4>First name
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any." value="<?php echo $current_user->first_name;?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-6">
                  <label for="last_name">
                    <h4>Last name
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any." value="<?php echo $current_user->last_name;?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-6">
                  <label for="phone">
                    <h4>Phone
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any." value="<?php echo $current_user->phone;?>">
                </div>
              </div>
              <div class="form-group">
                <div class="col-xs-6">
                  <label for="mobile">
                    <h4>Website
                    </h4>
                  </label>
                  <input type="text" class="form-control" name="url" id="url" placeholder="enter your web url" title="enter your web url" value="<?php echo $current_user->user_url;?>">
                </div>
              </div>
             
              <div class="form-group">
                <div class="col-xs-12">
                  <br>

                  <label for="password2">
                    <h4>Upload a different photo...
                    </h4>
                  </label>
                  <input type="file" name="user_pic" id="inputFile" class="file-upload">
                </div>
              </div> 
              <hr>
            </div>
            <!--/tab-pane-->
            <div class="tab-pane" id="address">
              <div class="form-group">
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="address1">
                      <h4>Addres Line 1
                      </h4>
                    </label>
                    <input type="text" name="address1" class="form-control" id="location" placeholder="Address line 1" title="enter a location" value="<?php echo  get_user_meta( $current_user->ID, 'address1', true );?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="address2">
                      <h4>Address Line 2
                      </h4>
                    </label>
                    <input type="text" name="address2" class="form-control" id="address2" placeholder="Address line 2" title="enter a location" value="<?php echo  get_user_meta( $current_user->ID, 'address2', true );?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="city">
                      <h4>City
                      </h4>
                    </label>
                    <input type="text" name="city" class="form-control" id="city" placeholder="enter your city" title="enter a city" value="<?php echo  get_user_meta( $current_user->ID, 'city', true );?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="country">
                      <h4>Country
                      </h4>
                    </label>
                    <input type="text" name="country" class="form-control" id="country" placeholder="enter your country name" title="enter your country name" value="<?php echo  get_user_meta( $current_user->ID, 'country', true );?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="postcode">
                      <h4>Zip
                      </h4>
                    </label>
                    <input type="text" name="zip" class="form-control" id="zip" placeholder="enter your zipcode" title="enter your zipcode" value="<?php echo  get_user_meta( $current_user->ID, 'zip', true );?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="info">
              <div class="col-xs-12">
                    <label for="description">
                      <h4>Description
                      </h4>
                    </label>
                    <textarea class="form-control" name="description" placeholder="Enter small description about you">
                      <?php echo $current_user->description;?>
                    </textarea>
                  </div>
              
              <p><?php echo $current_user->description;?></p>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="vtab2">
          <h3>Security
          </h3>
          <hr>
          <p> Change and set a strong password.
          </p>
          <div class="form-group">
            <div class="col-xs-6">
              <label for="password">
                <h4>Password
                </h4>
              </label>
              <input type="password" class="form-control" name="pass1" id="password" placeholder="password" title="enter your password.">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-6">
              <label for="password2">
                <h4>Verify
                </h4>

              </label>
              <input type="password" class="form-control" name="pass2" id="password2" placeholder="password2" title="enter your password2.">
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade in" id="vtab3">
          <h3>Email & Notifications
          </h3>
          <hr>
           <div class="form-group">
                <div class="col-xs-12">
                  <label for="email">
                    <h4>Email
                    </h4>

                  </label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php echo $current_user->user_email;?>">
                </div>
              </div>
       
        </div>  
        <div role="tabpanel" class="tab-pane fade in" id="vtab4">
          <h3>Messages
          </h3>
          <hr>

          <p>Etiam id pharetra quam. Morbi tristique nunc vel sapien dapibus, sit amet imperdiet quam venenatis. Vestibulum et suscipit urna. Suspendisse volutpat quis est eu volutpat. Nulla non tortor venenatis turpis congue aliquet. Vivamus at elit vel massa elementum tempor sit amet sed odio. Nullam placerat, arcu sed ullamcorper ornare, erat erat placerat quam, in feugiat nulla purus in nunc. Maecenas vitae erat auctor, aliquam tellus et, vulputate eros.
          </p>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-12">
          <br>
           <?php wp_nonce_field( 'update-user' ) ?>
          <input type="hidden" name="pf-submitted" value='pf-submitted'>
          <button class="btn btn-lg btn-success btn-sub" type="submit">
            <i class="fa fa-floppy-o">
            </i> Save
          </button>
          <!-- 	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
          <img src="<?php echo plugins_url('../assets/images/ajax-loader.gif', __FILE__);?>" id="gif" style="display: block; margin: 0 auto; width: 100%; visibility: hidden;">
        </div>
      </div>
    </form>
  </div>

  <!--/col-9-->
</div>
<!--/row-->
</div>
<!--/snippet-->
<script type="text/javascript">
  jQuery('.btn-sub').click(function(e) {
    jQuery('#gif').css('visibility', 'visible');
    jQuery(this).css('display', 'none');
    // e.preventDefault();
  });

    jQuery(function () {
        jQuery("#inputFile").change(function () {
            readURL(this);
        });
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                //alert(e.target.result);
                jQuery('#gif').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


function showTime(){
  var date = new Date();
  var h = date.getHours();
  var m = date.getMinutes();
  var s = date.getSeconds();
  var session = "AM";
if(h == 0){
  h = 12;
}
if(h > 12){
  h = h-12;
  session = "PM";
}
h = (h < 10 ) ? '0' + h : h;
m = (m < 10 ) ? '0' + m : m;
s = (s < 10 ) ? '0' + s : s;
  var time  = h + " : " + m + " : " + s+ " " + session;
  document.getElementById("time").innerText = time;  
  document.getElementById("time").innerContent = time;  
  setTimeout(showTime,1000);
}
showTime();
</script>                                                    

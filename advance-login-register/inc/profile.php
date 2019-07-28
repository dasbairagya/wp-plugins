<?php 
/* template name: profile   */
if(!is_user_logged_in()){
wp_redirect(  home_url());
exit();
}
get_header();
error_reporting(0);
$current_user = wp_get_current_user();
$img = get_user_meta($current_user->ID,'picture', true);
$certificates = get_user_meta( $current_user->ID,'certificates', false);
 
/*for file uploading*/
require_once(ABSPATH . "wp-admin" . '/includes/image.php');
require_once(ABSPATH . "wp-admin" . '/includes/file.php');
require_once(ABSPATH . "wp-admin" . '/includes/media.php');
?>

<section id="user-profile" class="user-profile parallex">
  <div class="container">
    <!-- Row -->
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="profile-sec ">
          <div class="profile-head">
            <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
              <div class="profile-avatar">
                <span>
                  <img class="img-responsive img-circle" alt="" src="<?php echo $img['url'];?>">
                </span>
                <div class="profile-name">
                  <h3> Hey! 
                    <?php echo $current_user->user_login; ?>
                  </h3>
                  <i>Creative Gate Installer
                  </i>
               <!--    <ul class="social-btns">
                    <li>
                      <a href="#" title="">
                        <i class="fa fa-facebook">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="#" title="">
                        <i class="fa fa-google-plus">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="#" title="">
                        <i class="fa fa-twitter">
                        </i>
                      </a>
                    </li>
                  </ul> -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
          <!--     <ul class="profile-count">
                <li>171
                  <i>Followers
                  </i>
                </li>
                <li>13,725
                  <i>Experience
                  </i>
                </li>
                <li>120
                  <i>Questions
                  </i>
                </li>
              </ul> -->
              <ul class="profile-connect">
                <li>
                  <a title="" href="#exampleModalCenter" data-toggle="modal" data-target="#exampleModalCenter">Get Quotation
                  </a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <!-- Profile Sec -->
      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- end container -->
</section>

<?php

if(isset( $_POST['submit'] ) && $_POST['submit'] != null ){
  ob_start();

$id = stripslashes_deep($_POST['user_id']); 
$udisname = ($_POST['udisname']) ? stripslashes_deep($_POST['udisname']) : '';
$business_name = ($_POST['business_name']) ? stripslashes_deep($_POST['business_name']) : '';
$phone = ($_POST['phone']) ? stripslashes_deep($_POST['phone']) : '';
$uemail = ($_POST['uemail']) ? stripslashes_deep($_POST['uemail']) : '';
$phone2 = ($_POST['phone2']) ? stripslashes_deep($_POST['phone2']) : '';
$state = ($_POST['state']) ? stripslashes_deep($_POST['state']) : '';
$city = ($_POST['city']) ? stripslashes_deep($_POST['city']) : '';
$suburb = ($_POST['suburb']) ? stripslashes_deep($_POST['suburb']) : '';
$serv = ($_POST['serv']) ? stripslashes_deep($_POST['serv']) : '';
$others = ($_POST['others']) ? stripslashes_deep($_POST['others']) : '';
$message = ($_POST['message']) ? stripslashes_deep($_POST['message']) : '';
$term_condition = ($_POST['term_condition']) ? stripslashes_deep($_POST['term_condition']) : 'false';
$uploaddir = wp_upload_dir();
if($term_condition != 'false'){

if( $_FILES['picture']['error'] === UPLOAD_ERR_OK ) {
    $upload_overrides = array( 'test_form' => false ); // if you don’t pass 'test_form' => FALSE the upload will be rejected
    $r = wp_handle_upload( $_FILES['picture'], $upload_overrides );
    update_user_meta( $id, 'picture', $r );
}
// if( $_FILES['certificate']['error'] === UPLOAD_ERR_OK ) {
//     $upload_overrides = array( 'test_form' => false ); // if you don’t pass 'test_form' => FALSE the upload will be rejected
//     $r = wp_handle_upload( $_FILES['certificate'], $upload_overrides );

//     update_user_meta( $id, 'certificate', $r );
// }
if(isset($_FILES['upload_attachment']) && $_FILES['upload_attachment']['name'][0] !='' ) {

$files = $_FILES['upload_attachment'];
        $count = 0;
        $galleryImages = array();
        foreach ($files['name'] as $count => $value) {
            if ($files['name'][$count]) {
                $file = array(
                    'name'     => $files['name'][$count],
                    'type'     => $files['type'][$count],
                    'tmp_name' => $files['tmp_name'][$count],
                    'error'    => $files['error'][$count],
                    'size'     => $files['size'][$count]
                );
                $upload_overrides = array( 'test_form' => false );
                $upload = wp_handle_upload($file, $upload_overrides);
                // $filename should be the path to a file in the upload directory.
                $filename = $upload['file'];
                // The ID of the post this attachment is for.
                $parent_post_id = 281;
                // Check the type of tile. We'll use this as the 'post_mime_type'.
                $filetype = wp_check_filetype( basename( $filename ), null );
                // Get the path to the upload directory.
                $wp_upload_dir = wp_upload_dir();
                // Prepare an array of post data for the attachment.
                $attachment = array(
                    'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );
                // Insert the attachment.
                $attach_id = wp_insert_attachment( $attachment, $filename);
                // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                require_once( ABSPATH . 'wp-admin/includes/image.php' );
                // Generate the metadata for the attachment, and update the database record.
                $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                wp_update_attachment_metadata( $attach_id, $attach_data );
                array_push($galleryImages, $attach_id);
            }
            $count++;
            // add images to the gallery field
            //update_field('certificates', $galleryImages, $parent_post_id);
             update_user_meta( $id, 'certificates', $galleryImages );
        }
}

$RESULT  = $wpdb->update('wp_users', array( 'user_email'=>$uemail, 'display_name'=>$udisname), array('ID'=>$id));
//var_dump($RESULT);
if($RESULT>0 || $business_name!='' || $phone!=''|| $phone2!=''|| $state!=''|| $city!=''|| $serv!=''){
update_user_meta( $id, 'business_name', $business_name );
update_user_meta( $id, 'register_phone', $phone );
update_user_meta( $id, 'register_phone2', $phone2 );
update_user_meta( $id, 'state', $state );
update_user_meta( $id, 'city', $city );
update_user_meta( $id, 'suburb', $suburb );
update_user_meta( $id, 'service', $serv );
update_user_meta( $id, 'others', $others );
update_user_meta( $id, 'term_condition', $term_condition );


$message =  '<div class="alert alert-success" role="alert">
<button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<i class="fa fa-check alert-icon"></i> Your Profile uploaded successfully. 
</div>';
// alert("Post uploaded successfully. A confirmation mail has been sent to your email.");
unset($_POST);
}
else{ 
$message = 
'<div class="alert alert-danger" role="alert">
<button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong>Oh snap!</strong> Change a few things up and try submitting again.
</div>';
// alert(" uploading error !");
}

}
else{
  $term = 
'<div class="alert alert-danger" role="alert">
<button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong>Oh snap!</strong> please accept e-gates user and installer Term and condition.
</div>';
}
//header('location: http://localhost/egates/profile/');
ob_flush();
}


?>

<!--home-content-top starts from here-->
<section class="home-content-top">
  <div class="container">
        <div class="row">
      <div id="smsg">     
        <?php if($message){echo $message; ?>
          <script>
          //Using setTimeout to execute a function after 5 seconds.
          setTimeout(function () {
             //Redirect with JavaScript
             //window.location.href= 'http://localhost/egates/profile/';
             window.location.href= '<?php echo site_url();?>/profile/';
          }, 1500);
          </script>
    <?php
        }
        if($term){
          echo $term;
        }
        ?>
      </div>
      </div>
    <!--our-quality-shadow-->
    <div class="clearfix"></div>
    <h1 class="heading1">Welcome to Egates</h1>
    <div class="tabbable-panel margin-tops4 ">
      <div class="tabbable-line">
        <ul class="nav nav-tabs tabtop  tabsetting">
          <li class="active"> <a href="#tab_default_1" data-toggle="tab"> My Account </a> </li>
          <li> <a href="#tab_default_2" data-toggle="tab"> Documents</a> </li>
          
          
        </ul>
          <form action="" enctype="multipart/form-data" class="form-horizontal" method="post">
        <div class="tab-content margin-tops">
         
          <div class="tab-pane active fade in" id="tab_default_1">
            <div class="col-md-4">
              <div class="box-panel">
                <div class="form-group">
                   <img id="img-upload" src="<?php echo $img['url'];?>" alt="">
                  <input name="picture" id="file" placeholder="Upload Image*" class=" btn btn-primary btn-lg" type="file">
                </div>
                
              </div>
            </div>
            <div class="col-md-8">
              <div class="box-panel">

                <fieldset>
                  <!-- Form Name -->
                  <legend>Edit My Profile
                  </legend>
                  <p style="color:#c00;"> 
                  </p>
                  <!-- Text input-->
                  <div id="message">
                  </div>
                  <div class="form-group">
                    <label class="col-md-4 control-label">Name*
                    </label>  
                    <div class="col-md-6 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user">
                          </i>
                        </span>
                        <input  id="name1" placeholder="Name*" class="form-control"   name="udisname" value="<?php echo $current_user->display_name; ?>" type="text">
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="user_id" value="<?php echo $current_user->ID; ?>">
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">Business Name (if you have)
                    </label> 
                    <div class="col-md-6 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user">
                          </i>
                        </span>
                        <input name="business_name" id="business_name" placeholder="Business Name" class="form-control" type="text" value="<?php echo get_user_meta($current_user->ID,'business_name', true);?>">
                      </div>
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">Contact Phone number
                    </label>  
                    <div class="col-md-6 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-earphone">
                          </i>
                        </span>
                        <input name="phone" id="phone" placeholder="Contact Phone number" class="form-control" type="number" value="<?php echo get_user_meta($current_user->ID,'register_phone', true);?>">
                      </div>
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">Email address(Username)
                    </label>  
                    <div class="col-md-6 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-envelope">
                          </i>
                        </span>
                        <input id="email" placeholder="Email address" class="form-control" name="uemail" value="<?php echo $current_user->user_email; ?>" type="text">
                      </div>
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">Contact Phone number 2
                    </label>  
                    <div class="col-md-6 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-earphone">
                          </i>
                        </span>
                        <input name="phone2" id="phone2" placeholder="Contact Phone number 2" class="form-control" type="text" value="<?php echo get_user_meta($current_user->ID,'register_phone2', true);?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group"> 
                    <label class="col-md-4 control-label">State they providing services*
                    </label>
                    <div class="col-md-6 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-home">
                          </i>
                        </span>
                        <select name="state" class="form-control selectpicker states" id="state">
                          <option value="<?php echo get_user_meta($current_user->ID,'state', true);?>">
                            <?php echo get_user_meta($current_user->ID,'state', true);?>
                          </option>
                          <!-- Please select your state
                          </option>
                          <option>Alabama
                          </option>
                          <option>Alaska
                          </option>
                          <option>Arizona
                          </option>
                          <option>Arkansas
                          </option>
                          <option>California
                          </option>
                          <option>Colorado
                          </option>
                          <option>Connecticut
                          </option>
                          <option>Delaware
                          </option>
                          <option>District of Columbia
                          </option>
                          <option> Florida
                          </option>
                          <option>Georgia
                          </option>
                          <option>Hawaii
                          </option>
                          <option>daho
                          </option>
                          <option>Illinois
                          </option>
                          <option>Indiana
                          </option>
                          <option>Iowa
                          </option>
                          <option> Kansas
                          </option>
                          <option>Kentucky
                          </option>
                          <option>Louisiana
                          </option>
                          <option>Maine
                          </option>
                          <option>Maryland
                          </option>
                          <option> Mass
                          </option>
                          <option>Michigan
                          </option>
                          <option>Minnesota
                          </option>
                          <option>Mississippi
                          </option>
                          <option>Missouri
                          </option>
                          <option>Montana
                          </option>
                          <option>Nebraska
                          </option>
                          <option>Nevada
                          </option>
                          <option>New Hampshire
                          </option>
                          <option>New Jersey
                          </option>
                          <option>New Mexico
                          </option>
                          <option>New York
                          </option>
                          <option>North Carolina
                          </option>
                          <option>North Dakota
                          </option>
                          <option>Ohio
                          </option>
                          <option>Oklahoma
                          </option>
                          <option>Oregon
                          </option>
                          <option>Pennsylvania
                          </option>
                          <option>Rhode Island
                          </option>
                          <option>South Carolina
                          </option>
                          <option>South Dakota
                          </option>
                          <option>Tennessee
                          </option>
                          <option>Texas
                          </option>
                          <option> Uttah
                          </option>
                          <option>Vermont
                          </option>
                          <option>Virginia
                          </option>
                          <option>Washington
                          </option>
                          <option>West Virginia
                          </option>
                          <option>Wisconsin
                          </option>
                          <option>Wyoming
                          </option>-->
                        </select> 
                      </div>
                    </div>
                  </div> 
                   <div class="form-group"> 
                    <label class="col-md-4 control-label">City*
                    </label>
                    <div class="col-md-6 selectContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-home">
                          </i>
                        </span>
                        <select name="city" class="form-control selectpicker cities" id="city">
                          <option value="<?php echo get_user_meta($current_user->ID,'city', true);?>">
                            <?php echo get_user_meta($current_user->ID,'city', true);?>
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- Text input-->
             


                   <div class="form-group" id="text1">
                    <label class="col-md-4 control-label">Suburb   
                    </label>  
                    <div class="col-md-6 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-home">
                          </i>
                        </span>
                        <input name="suburb" id="suburb" placeholder="suburb or area code" class="form-control suburb" type="text" value="<?php echo get_user_meta($current_user->ID,'suburb', true);?>">
                      </div>
                    </div>
                  </div>
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">Choose Services you can provide*
                    </label>  
                    <?php $service = get_user_meta($current_user->ID,'service',true);

                    ?>
                    <div class="col-md-6">
                      <div class="checkbox">
                        <label>
                          <input name="serv[]" value="Gate Repair" type="checkbox" <?php if (in_array('Gate Repair', $service)) { echo 'checked'; }?> > : Gate Repair
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="serv[]" value="New Gate Installation" type="checkbox" <?php if (in_array('New Gate Installation', $service)) { echo 'checked'; }?> > : New Gate Installation
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="serv[]" value="Gate Quote" type="checkbox" <?php if (in_array('Gate Quote', $service)) { echo 'checked'; }?> > : Gate Quote
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="serv[]" value="Accessories Installation" type="checkbox" <?php if (in_array('Accessories Installation', $service)) { echo 'checked'; }?> > : Accessories Installation
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input name="serv[]" value="Home Automation" type="checkbox" <?php if (in_array('Home Automation', $service)) { echo 'checked'; }?> > : Home Automation
                        </label>
                      </div>
                                     <div class="checkbox">
                  <label>
                    <input  value="Other" id="other" type="checkbox"  > : Other
                  </label>
                </div>
                <div class="input-group">
                <label id="EnterFavoriteColorLabel"> Other Service Type
                <input type="text" placeholder="Enter Your Service Name" class="form-control" name="others[]"  /></label>
                </div>

                    </div>
                  </div>
                 
                  
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">Upload Certificate* 
                    </label>  
                    <div class="col-md-6 inputGroupContainer">
                      <div class="filew">
                      <!--   <input name="certificate[]" id="file" placeholder="Upload Certificate*" class="form-control" type="file" multiple> -->
                         <input type="file" name="upload_attachment[]" class="form-control" id="featured1" size="50" multiple="multiple">
                      </div>
                    </div>
                  </div>
                  <!-- Success message -->
                  <div class="checkbox1">
                    <label>
                      <input id="condition" type="checkbox" name="term_condition" <?php if(get_user_meta($current_user->ID,'term_condition',true) == 'on') echo 'checked' ;?> >I accept e-gates user and installer 
                      <a href="<?php echo site_url();?>/terms-and-conditions-installer/" style="color:green" ;="">Term and condition
                      </a> 
                    </label>
                  </div>
                  <!-- image upload-->
                  <div class="form-group">
                    <label class="col-md-4 control-label">
                    </label>
                    <div class="col-md-6">
                      <input type="submit" name="submit" value="Update My Profile" class="btn btn-primary btn-lg">
                      <input name="task" value="register" type="hidden">
                    </div>
                  </div>
                </fieldset>
              </div> 
            </div>

          </div>


          <div class="tab-pane fade" id="tab_default_2">
          
            <div class="col-md-12">
             
            <?php
                if ( $certificates[0] ) {
                    foreach ( $certificates[0] as $attachment_id ) {
                        $thumb = wp_get_attachment_image( $attachment_id, 'thumbnail' );
                        $full_size = wp_get_attachment_url( $attachment_id );
                        ?>
                        <div class="col-md-4">
                        
                            <div class="form-group">
                    <img class="img-responsive img-thumbnail" alt="" src="<?php echo $full_size;?>">
                       </div>
                            
                         
                          </div>
                    <?php }
                }
                ?>
            
          </div>
          </div>


           
        </div>
        <!-- end tab content -->
      </form>


      </div>
    </div>
  </div>
</section>

<?php get_footer();?>

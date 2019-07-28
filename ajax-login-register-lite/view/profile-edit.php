<?php 
if(!is_user_logged_in()){
wp_redirect(  home_url());
exit();
}
global $wpdb;
//error_reporting(0);
$current_user = wp_get_current_user();
$img = get_user_meta($current_user->ID,'picture', true);
$logoright = get_user_meta($current_user->ID,'logoright', true);
$logoleft = get_user_meta($current_user->ID,'logoleft', true);
$certificates = get_user_meta( $current_user->ID,'certificates', false);
$certificates1 = get_user_meta( $current_user->ID,'certificates1', false);
$cityies = get_user_meta($current_user->ID,'city', false);
$city_array = $cityies[0];
$suburbs = get_user_meta($current_user->ID,'suburb', true);
$suburb_array = explode(',',$suburbs);

/*Required for file uploading*/
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
// -=-=-=-=-=-=-=-=-=-=-=-Form Processing Starts-=-=-=-=-=-=-=-=-=-=-=-=-=-
if(isset( $_POST['submit'] ) && $_POST['submit'] != null ){
      ob_start();
      $id                   = stripslashes_deep($_POST['user_id']); 
      $udisname             = ($_POST['udisname']) ? stripslashes_deep($_POST['udisname']) : '';
      $business_name        = ($_POST['business_name']) ? stripslashes_deep($_POST['business_name']) : '';
      $phone                = ($_POST['phone']) ? stripslashes_deep($_POST['phone']) : '';
      $uemail               = ($_POST['uemail']) ? stripslashes_deep($_POST['uemail']) : '';
      $phone2               = ($_POST['phone2']) ? stripslashes_deep($_POST['phone2']) : '';
      $state                = ($_POST['state']) ? stripslashes_deep($_POST['state']) : '';
      $city                 = ($_POST['city']) ? stripslashes_deep($_POST['city']) : '';
      $suburb               = ($_POST['suburb']) ? stripslashes_deep($_POST['suburb']) : '';
      $serv                 = ($_POST['serv']) ? stripslashes_deep($_POST['serv']) : '';
      $others               = ($_POST['others']) ? stripslashes_deep($_POST['others']) : '';
      $message              = ($_POST['message']) ? stripslashes_deep($_POST['message']) : '';
      $info              = ($_POST['info']) ? stripslashes_deep($_POST['info']) : '';
      $term_condition       = ($_POST['term_condition']) ? stripslashes_deep($_POST['term_condition']) : 'false';
      $files                = ($_FILES['upload_attachment1']['name'][0] != null) ? $_FILES['upload_attachment1'] : $_FILES['upload_attachment'];
      $meta_key             = ($_FILES['upload_attachment1']['name'][0] != null) ? 'certificates1' : 'certificates';
      // print_r($files);
      // echo  '<hr>';
      // print_r($_FILES);
      // echo '<br>'.$meta_key;
      // die;
      $allowedExts          = array("pdf", "doc", "docx", "jpeg", "jpg", "png"); 
      $allowedMimeTypes     = array( 'application/msword','text/pdf','image/gif','image/jpeg','image/png');
      $suburb_array1        = explode(',',$suburb);

     

      //-----------------Get all the docs's extension in an array-----------------------

      $filetype             = array();
      foreach ($files["name"] as $name) {
      $extension            = end(explode(".", $name));
      if(! in_array($extension, $allowedExts )){
      $filetype[]           = $extension;
        }
      }

      //-----------------Get all the docs's size in an array-----------------------

      $maxsize = array();
      foreach ($files["size"] as $size) {
      if($size>2097152){
      $maxsize[] = $size;
        }
      }

      function gallery_upload($files, $meta_key){
           $current_user = wp_get_current_user();
           $document = get_user_meta( $current_user->ID, $meta_key, false);
            // print_r($document);
            // echo '<hr>'.$meta_key;
            
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

            $upload_gal = array( 'test_form' => false );
            $upload = wp_handle_upload($file, $upload_gal);
            // $filename should be the path to a file in the upload directory.
            $filename = $upload['file'];
            // The ID of the post this attachment is for.
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
            }//end foreach
            
              // debuging
            // echo '</pre>';
            // print_r($galleryImages);
            // echo '</pre>';
            // die;

            if($document[0]!= null){
              $updated_arg = array_merge($document[0],$galleryImages);
            }else{
              $updated_arg = $galleryImages;
            }
            update_user_meta(  $current_user->ID, $meta_key, $updated_arg );

        }
      //-------------------- Server side validation-----------------------------------

      if($term_condition == 'false') { //Start main if
      $message ='<div class="alert alert-danger" role="alert">
      <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>Oh snap!</strong> please accept schoolsafetyprogram term and condition.
      </div>';
      }
      elseif($filetype[0]!="" || $filetype[0]!=null){//file type validation
      $message =  '<div class="alert alert-danger" role="alert">
      <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>File type does not match</strong> 
      </div>';
      } 
      elseif($maxsize[0]!='' || $maxsize[0]!=null) {//file size validation    
      $message =  '<div class="alert alert-danger" role="alert">
      <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>Max Upload size is 2 MB</strong> 
      </div>';
      }//end nested if

      else{ 
            //-------------multiple gallery upload----------------------------------------------
           gallery_upload($files, $meta_key);
            // -----------------------Save user details to the user meta -------------------------------

            $wpdb->update('wp_users', array( 'user_email'=>$uemail, 'display_name'=>$udisname), array('ID'=>$id));
            if($business_name!=''){
            update_user_meta( $id, 'business_name', $business_name );
            }if($phone!=''){
            update_user_meta( $id, 'register_phone', $phone );
            }if($phone2!=''){
            update_user_meta( $id, 'register_phone2', $phone2 );
            }if($state!=''){
            update_user_meta( $id, 'state', $state );
            }if($city_array=='' || $city_array==null){
            update_user_meta( $id, 'city', $city );
            }if($city!= '' && $city_array!=null &&  $city != array_intersect($city, $city_array)){
            $city_merge = array_merge($city, $city_array);
            update_user_meta( $id, 'city', $city_merge );
            }if($serv!=''){
            update_user_meta( $id, 'service', $serv );
            }if($others!=''){
            update_user_meta( $id, 'others', $others );
            }if($term_condition!=false){
            update_user_meta( $id, 'term_condition', $term_condition );
            }if($info!=''){
            update_user_meta( $id, 'info', $info );
            }

            //---------------------Upload profile image to the user meta---------------------

            if( $_FILES['picture']['error'] === UPLOAD_ERR_OK ) {
            $upload_overrides = array( 'test_form' => false ); // if you don’t pass 'test_form' => FALSE the upload will be rejected
            $r = wp_handle_upload( $_FILES['picture'], $upload_overrides );
            update_user_meta( $id, 'picture', $r );
            }if( $_FILES['logoleft']['error'] === UPLOAD_ERR_OK ) {
            $upload_overrides = array( 'test_form' => false ); // if you don’t pass 'test_form' => FALSE the upload will be rejected
            $r = wp_handle_upload( $_FILES['logoleft'], $upload_overrides );
            update_user_meta( $id, 'logoleft', $r );
            }if( $_FILES['logoright']['error'] === UPLOAD_ERR_OK ) {
            $upload_overrides = array( 'test_form' => false ); // if you don’t pass 'test_form' => FALSE the upload will be rejected
            $r = wp_handle_upload( $_FILES['logoright'], $upload_overrides );
            update_user_meta( $id, 'logoright', $r );
            }

            // -------------------------------------------------------------------------------------------------------------------
            $message =  '<div class="alert alert-success" role="alert">
            <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-check alert-icon"></i> Your Profile uploaded successfully. 
            </div>';
            $return = 1;
            unset($_POST);
      }//end main else
      ob_flush();
} //end $_POST;
// -=-=-=-=-=-=-=-=-=-=-Form Processing Ends Here!-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
?>
<div class="wrap">
<!--home-content-top starts from here-->
<section class="home-content-top">
  <div class="container">
    <div class="row">
      <div id="smsg">     
        <?php if(isset($message)){echo $message; }
        if(isset($return) && $return==1){ ?>
        <script>
          //Using setTimeout to execute a function after 5 seconds.
          setTimeout(function () {
            //Redirect with JavaScript
             location.reload();
            
          }
          , 1500);
        </script>
        <?php } ?>
      </div>
    </div>
    <!--our-quality-shadow-->
    <div class="clearfix">
    </div>
    
    <div class="tabbable-panel margin-tops4 ">
      <div class="tabbable-line bs-example">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#tab_default_1" data-toggle="tab">General Info </a></li>
            <li><a href="#tab_default_2" data-toggle="tab">Physical Initiatives</a></li>
            <li><a href="#tab_default_3" data-toggle="tab">Awareness Initiatives</a></li>
          </ul>
        <form action="" enctype="multipart/form-data" class="form-horizontal" method="post">
          <div class="tab-content margin-tops">
            <div class="tab-pane active fade in" id="tab_default_1">
              
              <div class="col-md-8">
                <div class="box-panel">
                  <fieldset>
                    <!-- Form Name -->
                    
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
                    <!-- textarea -->
                    <div class="form-group">
                      <label class="col-md-4 control-label">Info
                      </label>  
                      <div class="col-md-6 inputGroupContainer">
                        <div class="form-group">
                            
                            <textarea name="info" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"><?php echo get_user_meta($current_user->ID,'info', true);?></textarea>
                        </div>
                        
                      </div>
                    </div>

                   
          

                    <!-- Text input-->
                    
                    <!-- Success message -->
                    <div class="checkbox1">
                      <label>
                        <input id="condition" type="checkbox" name="term_condition" 
                               <?php if(get_user_meta($current_user->ID,'term_condition',true) == 'on') echo 'checked' ;?> >I accept schoolsafetyprogram
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
              <div class="col-md-4">
                <div class="profile-sec ">
                  <div class="profile-head">
                    <div class="box-panel">
                      <div class="form-group">
                          <div class="profile-avatar">
                              <span>
                                <img class="img-responsive img-thumbnail" alt="" src="<?php echo $img['url'];?>">
                              </span>
                              
                            </div>
                        <!-- <img id="img-upload" src="<?php echo $img['url'];?>" alt=""> -->
                        <input name="picture" id="file" placeholder="Upload Image*" class=" btn btn-primary btn-lg" type="file">

                      </div>
                        <div class="form-group">
                        <div class="panel panel-default">
                          <div class="panel-heading">Upload Logo</div>
                          <div class="panel-body">   <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                          <div class="row">
                            <div class="col-md-12">

                          <label>Upload Left Logo</label>
                          <img class="img-responsive img-rounded" alt="" src="<?php echo $logoleft['url'];?>">
                        <input name="logoleft" id="logoleft" placeholder="Upload Left Logo*" class=" btn btn-primary btn-lg" type="file">
                         
                         </div>
                         <br />
                         <hr>
                         <div class="col-md-12">
                        <label>Upload Right Logo</label>
                        <img class="img-responsive img-rounded" alt="" src="<?php echo $logoright['url'];?>">
                        <input name="logoright" id="logoright" placeholder="Upload Right Logo*" class=" btn btn-primary btn-lg" type="file">
                         
                        </div>
                        </div>


                        </div>
                      </div></div>
                        </div>
                   


                    </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
            <div class="tab-pane fade" id="tab_default_2">
              <div class="col-md-12">
                <?php
                if ( $certificates[0] ) {
                // var_dump($certificates[0]);
                foreach ( $certificates[0] as $attachment_id ) {
                $thumb = wp_get_attachment_image( $attachment_id, 'thumbnail' );
                $full_size = wp_get_attachment_url( $attachment_id );
                $filetype = wp_check_filetype($full_size);
                //echo $full_size;
                ?>
                <div class="col-md-4">
                  <div class="form-group">
                    <button type="button" class="close" aria-label="Close" id="<?php echo $attachment_id; ?>" meta-key="certificates">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                    <?php
                    if($filetype['ext']=='pdf' ){ ?>
                    <a href="<?php echo $full_size;?>" target="_blank">
                      <img class="img-responsive img-thumbnail" alt="" src="https://site.goigi.co/egates/wp-content/uploads/2018/06/pdf-thumb.png">
                    </a>
                    <?php  }
                      elseif($filetype['ext']=='docx'|| $filetype['ext']=='doc'){ ?>
                    <a href="<?php echo $full_size;?>" target="_blank">
                      <img class="img-responsive img-thumbnail" alt="" src="https://site.goigi.co/egates/wp-content/uploads/2018/06/word-thumb.jpg">
                    </a>
                    <?php  }
                    else{ ?>
                    <a href="<?php echo $full_size;?>" target="_blank">
                      <img class="img-responsive img-thumbnail" alt="" src="<?php echo $full_size;?>">
                    </a>
                    <?php } ?>
                  </div>
                </div>
                <?php }
                }
                ?>

              </div>
                <div class="form-group">
                  <style type="text/css">
                    .wp-admin input[type="file"] {
                          padding: 0px !important;
                      }
                  </style>
                      <label class="col-md-4 control-label">Upload Physical Initiatives 
                      </label>  
                      <div class="col-md-4 inputGroupContainer">
                        <div class="filew">
                          <input type="file" name="upload_attachment[]" class="form-control" id="featured1" size="50" multiple="multiple">
                        </div>
                      </div>
                      <div class="col-md-4"><input type="submit" name="submit" value="Upload to Physical Initiatives " class="btn btn-primary btn-lg"></div>
                    </div>
            </div> 
            <div class="tab-pane fade" id="tab_default_3">
              <div class="col-md-12">
                <?php
                if ( $certificates1[0] ) {
                // var_dump($certificates[0]);
                foreach ( $certificates1[0] as $attachment_id ) {
                $thumb = wp_get_attachment_image( $attachment_id, 'thumbnail' );
                $full_size = wp_get_attachment_url( $attachment_id );
                $filetype = wp_check_filetype($full_size);
                //echo $full_size;
                ?>
                <div class="col-md-4">
                  <div class="form-group">
                    <button type="button" class="close" aria-label="Close" id="<?php echo $attachment_id; ?>" meta-key="certificates1">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                    <?php
                    if($filetype['ext']=='pdf' ){ ?>
                    <a href="<?php echo $full_size;?>" target="_blank">
                      <img class="img-responsive img-thumbnail" alt="" src="https://site.goigi.co/egates/wp-content/uploads/2018/06/pdf-thumb.png">
                    </a>
                    <?php  }
                      elseif($filetype['ext']=='docx'|| $filetype['ext']=='doc'){ ?>
                    <a href="<?php echo $full_size;?>" target="_blank">
                      <img class="img-responsive img-thumbnail" alt="" src="https://site.goigi.co/egates/wp-content/uploads/2018/06/word-thumb.jpg">
                    </a>
                    <?php  }
                    else{ ?>
                    <a href="<?php echo $full_size;?>" target="_blank">
                      <img class="img-responsive img-thumbnail" alt="" src="<?php echo $full_size;?>">
                    </a>
                    <?php } ?>
                  </div>
                </div>
                <?php }
                }
                ?>
              </div>
              <div class="form-group">
                  <style type="text/css">
                    .wp-admin input[type="file"] {
                          padding: 0px !important;
                      }
                  </style>
                      <label class="col-md-4 control-label">Upload Awareness Initiatives 
                      </label>  
                      <div class="col-md-4 inputGroupContainer">
                        <div class="filew">
                          <input type="file" name="upload_attachment1[]" class="form-control" id="featured2" size="50" multiple="multiple">
                        </div>
                      </div>
                      <div class="col-md-4"><input type="submit" name="submit" value="Upload to Awareness Initiatives" class="btn btn-primary btn-lg"></div>
                    </div>
            </div>
          
          </div>
          <!-- end tab content -->
        </form>
      </div>
    </div>
  </div>
</section>
</div>
<script type="text/javascript">
  jQuery('.close').live('click', function() {
  var x = document.getElementById(this.id).getAttribute("meta-key"); 
  // alert(x);
  // return false;
    if(confirm("Are you confirm to delete this?")==true){
      jQuery.ajax({
        type: 'post',
        url: ajaxurl,
        data: {
          action: 'delete_attachment',
          att_ID: this.id,
          meta_key: x,
          //_ajax_nonce: jQuery('#nonce').val(),
          post_type: 'attachment'
        }
        ,
        success: function( html ) {
          alert( html );
          location.reload();
        }
      }
     );
      return false;
    }
  }
 );
</script>
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', jQuery(e.target).attr('href'));
    }
   );
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
      jQuery('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  }
  );
</script>


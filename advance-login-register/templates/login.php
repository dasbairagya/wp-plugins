<?php
/*Template Name: Login*/
echo 'Hello World';
ob_start();
if($_POST['login_username']) {
    global $wpdb; 
    //We shall SQL escape all inputs
    $username = $wpdb->escape($_REQUEST['login_username']);
    $password = $wpdb->escape($_REQUEST['login_password']);
    $remember = $wpdb->escape($_REQUEST['remember_me_checkbox']);
    if($remember) $remember = "true";
    else $remember = "false";
    $login_data = array();
    $response =array();
    $login_data['user_login'] = $username;
    $login_data['user_password'] = $password;
    $login_data['remember'] = $remember;
    $user_table = $wpdb->prefix . 'users';
    $results = $wpdb->get_row( "SELECT * FROM $user_table WHERE user_email='".$username."'");

//  $response = array('return'=>'invalid','msg'=>$results->user_status,'results'=>$results->user_status);
// echo json_encode($response);
//  die;

  if($results){
      $activation_id = $results->ID;
      $activation_key =  get_user_meta( $activation_id, 'has_to_be_activated', true );
      $user_meta=get_userdata($results->ID);
      $user_roles=$user_meta->roles;
    //   if($user_roles[0]!='wholesaler')
    //   {
    //   $response = array('return'=>'not_wholesaler','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
    //             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    //             <strong>Sorry! this email does not belongs to wholesaler account. </strong></div> ');
                
    //   }
      //else
    //   if($activation_key != false ) //uncomment this line for activation auth
      if($activation_key = false ){
         $response = array('return'=>'not_activated','key'=>$activation_key,'msg'=> '<div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Your account has not been activated yet.</strong>To activate it check your email and click on the activation link.</div> ');

      }
      elseif( $results->user_status == 0 ){
        $response = array('return'=>'inactive','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Your account is inactive.</strong> Please contact to site the admin.</div> ');

      }

      else{ 
        $user_verify = wp_signon( $login_data, false ); 
 
          if ( is_wp_error($user_verify) ){
              //loging falis

              $response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>Invalid Username or Password...!</div> ');
                

            } 
            else {
                //login success
                $response = array('return'=>'true','msg'=> '<div class="alert alert-success alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>Login successfull. Redirecting...!</div> ');
                
                
            }
            
    }

  }//end result if
  else{
    $response = array('return'=>'sorry','msg'=> '<div class="alert alert-warning alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>User does not exits! </div> ');
  }
      echo json_encode($response);
 
} //end $_post if

?>

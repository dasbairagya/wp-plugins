<?php
/*################################ Funtions For Member Registration#########################*/

add_action( 'wp_ajax_create_user', 'it_create_user' );
add_action( 'wp_ajax_nopriv_create_user', 'it_create_user' );
function it_create_user() {
    global $wpdb;
    $save_value = array();
    $from_name = get_bloginfo('name');
    $from_email = get_bloginfo('admin_email');
    $fname = $_POST['uname'];
    $email = $_POST['uemail'];
    $password = $_POST['upassword'];
    $register_phone = $_POST['uphone'];
    $businessname = $_POST['businessname'];
    // Handle request then generate response using WP_Ajax_Response
    if(email_exists($email)){
        $save_value[0]="fail";
        $save_value[1] = '<div class="alert alert-danger" role="alert">
        <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>Oh snap!</strong> This email already exists.
            </div>';
            // return $save_value;
    }

    else if(username_exists($fname)){
        $save_value[0]="fail";
        $save_value[1] = '<div class="alert alert-danger" role="alert">
        <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>Oh snap!</strong> User already exists.
            </div>';
            // return $save_value;
    }
   else {
        $user_id = wp_insert_user(array(
                                        'user_login'    =>  $email,
                                        'user_pass' =>  $password,
                                        'first_name'    =>  $fname,
                                        'user_email'    =>  $email,
                                        'display_name'  =>  $fname,
                                        'nickname'  =>  $fname,
                                        //'role'      =>  'wholesaler'
                                    )
                                );
        $code = sha1( $user_id . time() );
        $activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink(288));
        add_user_meta( $user_id, 'has_to_be_activated', $code, true );
        $user_name=  sanitize_title_with_dashes($fname);
        update_user_meta( $user_id, 'register_phone', $register_phone );
        update_user_meta( $user_id, 'business_name', $businessname );
        if($user_id){

            /*******************first mail to user - start **************************/
            $full_name = $fname . ' ' . $lname;
            $fullname = ucwords(strtolower($user_name));
            $subject = "Welcome to ".$from_name;
            $message = '<p>Dear '. $full_name.'!</p><p></p><p>You have successfully created an account to our Website.<br>Your Email: '.$email.'<br> Your password is : '.$password.'<br>To activate your acount click on the folowing link: '.$activation_link;

            //Headers

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            if(!empty($from_email) && filter_var($from_email,FILTER_VALIDATE_EMAIL))//Validating From
                $headers .= "From: ".$from_name." <".$from_email."> \r\n";
                $reply_email = $from_email;

            if($reply_email){
                $headers .= "Reply-To: {$reply_email}\r\n";
                $headers .= "Return-Path: {$from_name}\r\n";
            }
            wp_mail($email, $subject, $message , $headers);

            /******************* ! Mail to user - end **********************/
            /*************** Mail to admin - start ****************************/
            $subject = $from_name."- New customer registration request";
            $message    = '<p>Dear Admin,</p><p>'.$full_name.' is registered in our website!</p><br>User Details are:<br> Name: '.$full_name.'<br>Phone no:'.$register_phone.'<br>Email: '.$email.'<br>'
                . '<p>Best Wishes,<br>Team '.$from_name;
            wp_mail($from_email, $subject, $message , $headers);
            /**************** Mail to admin - end ****************************/
        }

        $save_value[0]='success';
        $save_value[1] = '<div class="alert alert-success" role="alert">
                            <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <p>Thank you for sing up as e-gates installer. Please check your email (inbox) and confirm  link in email to verify your email address.
</p><p>If you have any trouble please contact us on info@egates.com.au</p><p>
If you can’t find email in inbox Please check your spam folder and mark email as no spam for further communication.</p><p>
Thanks</p><p>
E-gates Team</p>

                            </div>';
        $save_value[3]= $activation_link;
        // return $save_value;
    }
    echo json_encode($save_value) ;
    // json_encode($_POST);
    die;
}

/** Plugin Name: (#90328) Login with E-Mail address */
function login_with_email_address( $username ) {
    $user = get_user_by( 'email', $username );
    if ( !empty( $user->user_login ) )
        $username = $user->user_login;
    return $username;
}
add_action( 'wp_authenticate','login_with_email_address' );
add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
wp_redirect( home_url() );
exit();
}
add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}
<?php 
/*Plugin Name: Ajax Login Register Lite
Plugin URI:   https://github.com/dasbairagya/ajax-login-register-lite
Description:  Simple ajax base wordpress login/register plugin. Activate the plugin and then go to your  Settings page to set up basic things. 
Version:      1.0.0
Author:       Filter Action
Author URI:   https://www.filteraction.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
License:     GPL2
Ajax Login Register Lite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
Ajax Login Register Lite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Ajax Login Register Lite. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
if ( ! defined( 'ABSPATH' ) ) {
exit; 
}
if ( ! defined( 'ALRL_FILE' ) ) {
define( 'ALRL_FILE', __FILE__ );
}
define("ALRL_URL", plugin_dir_url( __FILE__ ));
define("ALRL_ROOT_URI", plugins_url( __FILE__ ));
define("ALRL_ADMIN_URI", admin_url());
define("ALRL_PATH", __DIR__);
define('ALRL_PLUGIN', plugin_basename( __FILE__ ));

class ALRL
{
    private $login_redirect;
    public function __construct()
    {
    	//create auto login page 
    	register_activation_hook( __FILE__, array($this, 'create_alrl_login_page' ) );
    	// create auto profile page
    	register_activation_hook( __FILE__, array($this, 'create_alrl_profile_page' ) );
    	//create direct setting links beside the activation 
    	add_filter( "plugin_action_links_".ALRL_PLUGIN, array( $this, 'plugin_add_settings_link'));
    	//create a page template with in plugin
    	add_filter ('theme_page_templates', array( $this, 'create_alrl_page_template' ) );
    	//redirect wp to find page template from this plugin
    	add_filter ('page_template', array( $this, 'redirect_to_alrl_page_template') ); 
    	//create all shortcode
        add_action( 'init', array($this, 'alrl_shortcode_cb' ) );
        //ajax scripts
		add_action( 'wp_ajax_user_login', array( $this,'user_login_func' ) );
		add_action( 'wp_ajax_nopriv_user_login', array($this,'user_login_func' ) );
		add_action( 'wp_ajax_create_user', array( $this,'it_create_user' ) );
		add_action( 'wp_ajax_nopriv_create_user', array($this, 'it_create_user' ) );
		add_action( 'wp_ajax_reset_password', array( $this, 'reset_user_password' ) );
		add_action( 'wp_ajax_nopriv_reset_password', array( $this, 'reset_user_password' ) );
		add_action( 'wp_ajax_delete_attachment', array( $this, 'delete_attachment' ));
		add_action( 'wp_ajax_nopriv_delete_attachment', array( $this, 'delete_attachment' ) );
		//create admin menu
		add_action( 'admin_menu', array( $this, 'create_admin_menu' ) );
		add_action( 'admin_menu', array($this, 'create_user_profile_menu') );
		//register all admin settings
		add_action( 'admin_init', array( $this,'register_alrl_settings' ) );
		//login with email script
 		add_action( 'wp_authenticate', array( $this, 'login_with_email_address' ) );
 		//set logout url
 		add_action( 'wp_logout',array( $this, 'auto_redirect_after_logout' ) );
 		//set ajaxurl
 		add_action( 'wp_head', array( $this, 'upl_ajaxurl' ) );
 		//enqueue script
		add_action( 'init', array( $this, 'alrl_enqueue_script') );
		add_action( 'admin_enqueue_scripts', array( $this, 'alrl_media_enque' ) );
		add_action('after_setup_theme', array($this, 'remove_admin_bar'));
		//add_action( 'admin_init', array($this, 'alrl_no_admin_access'),100);
	
    }

    public function alrl_no_admin_access()
	{
	    $redirect = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : home_url( '/' );
	    if (  !current_user_can('administrator') && !is_admin())
	        exit( wp_redirect( $redirect ) );
	}
    public function remove_admin_bar() {
		if (!current_user_can('administrator') && !is_admin()) {
		  show_admin_bar(false);
		}
	}
	public function alrl_enqueue_script(){ 
		//enque style & js
		wp_enqueue_style ('style', ALRL_URL. 'assets/css/style.css'  );
		wp_enqueue_script( 'register_validate_script', ALRL_URL . 'assets/js/register-validate.js', array(), false, true);
		wp_enqueue_script( 'login_validate_script', ALRL_URL . 'assets/js/login-validate.js', array(), false, true);
		wp_enqueue_script( 'my_custom_script', ALRL_URL . 'assets/js/script.js', array(), false, true);
		wp_localize_script('my_custom_script', 'ajax_object', array(
	        'url' => admin_url('admin-ajax.php'),
	        'ajax_nonce' => wp_create_nonce('ajax-nonce')
    	));
    	
	}

	public function alrl_media_enque(){
		wp_enqueue_media();
	}
	public function alrl_enqueue_bootstrap(){

		wp_enqueue_style ('bootstrap',  'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'  );
		 wp_enqueue_style ('style', ALRL_URL. 'assets/css/style.css'  );
		wp_enqueue_script('bootstrapjs', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js', array(), null, true);
    
	}

	public function upl_ajaxurl(){
	?>
		<script type="text/javascript">
		  var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		</script>
	<?php
	}
	public function auto_redirect_after_logout(){
		$post_id = esc_attr( get_option('logout_redirect') ); //specify post id here
		$post = get_post($post_id); 
			$slug = $post->post_name;
      		$page_slug = site_url($slug);
		$logout_redirect = (!empty(get_option('logout_redirect'))) ? $page_slug : home_url();

		wp_redirect($logout_redirect);
		exit();
	}
	public function login_with_email_address( $username ) {
		$user = get_user_by( 'email', $username );
		if ( !empty( $user->user_login ) )
		$username = $user->user_login;
		return $username;
	}

	public function register_alrl_settings(){
		//register our settings
		register_setting( 'ajax-login-register-lite-settings-group', 'reg_success_msg' );
		register_setting( 'ajax-login-register-lite-settings-group', 'reg_failure_msg' );
		register_setting( 'ajax-login-register-lite-settings-group', 'log_success_msg' );
		register_setting( 'ajax-login-register-lite-settings-group', 'log_failure_msg' );
		register_setting( 'ajax-login-register-lite-settings-group', 'alrl_images' );
		register_setting( 'ajax-login-register-lite-settings-group', 'alrl_logo_height' );
		register_setting( 'ajax-login-register-lite-settings-group', 'alrl_logo_width' );
		register_setting( 'ajax-login-register-lite-settings-group', 'alrl_cookies' );
		register_setting( 'ajax-login-register-lite-settings-group', 'login_redirect' );
		register_setting( 'ajax-login-register-lite-settings-group', 'logout_redirect' );
		register_setting( 'ajax-login-register-lite-settings-group', 'toggle_background_image' );
		register_setting( 'ajax-login-register-lite-settings-group', 'alrl_shortcode_page' );
		register_setting( 'ajax-login-register-lite-settings-group', 'alrl_email_activation' );
	}

    public function create_user_profile_menu(){
    	$parent_slug = 'ajax-login-register-lite';
		$page_title = 'ALRL Profile';
		$menu_title = 'ALRL Profile';
		$capability = 'read';
		$menu_slug = 'my-profile';
		$function_cb= array($this, 'alrl_user_profile_cb');
		$position = 2;
		if(current_user_can( 'administrator' )){
		$mypage = add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function_cb, $icon_url = 'dashicons-id-alt', $position ); 
		}
		else{
			$mypage = add_submenu_page($page_title, $menu_title, $capability, $menu_slug, $function_cb, $icon_url = 'dashicons-id-alt', $position ); 
		}
		add_action( "admin_print_scripts-$mypage", array( $this, 'alrl_enqueue_bootstrap' ) );
	}

	public function create_admin_menu(){
		$page_title = 'ALRL';
		$menu_title = 'ALRL';
		$capability = 'manage_options';
		$menu_slug = 'ajax-login-register-lite';
		$cb_function = array( $this, 'ajax_login_register_lite');
		$position = 2;
		$mypage = add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $cb_function, $icon_url = 'dashicons-unlock', $position  ); 
		add_action( "admin_print_scripts-$mypage", array($this, 'alrl_enqueue_script' ) );
		add_action( "admin_print_scripts-$mypage", array($this, 'alrl_enqueue_bootstrap' ) );
	}
	public function delete_attachment( $post ) {
	    $attached_id = $_POST['att_ID'];
	    $user_id = get_current_user_id();
	    $certificates = get_user_meta( $user_id,'certificates', false);
	    $index_value = array_search($attached_id, $certificates[0]);
	    $msg = 'Attachment has been deleted successfully!';
		    if( wp_delete_attachment( $_POST['att_ID'], true )) {
		         unset($certificates[0][$index_value]);
		         update_user_meta( $user_id, 'certificates', $certificates[0] );
		        echo $msg;
		    }
	    die();
	}
	public function reset_user_password(){
		check_ajax_referer( 'ajax-nonce', 'security' );
		global $wpdb;
		$error = '';
		$success = '';
		// check if we're in reset form
		if( isset( $_POST['reset'] ) && $_POST['reset'] == true )
		{
		$email = trim($_POST['user_login']);
		if( empty( $email ) ) {
		$error = 'Enter a username or e-mail address..';
		$response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>Enter a username or e-mail address..!</div> ');
		} else if( ! is_email( $email )) {
		$error = 'Invalid username or e-mail address.';
		$response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>Invalid username or e-mail address </div>');
		} else if( ! email_exists( $email ) ) {
		$error = 'There is no user registered with that email address.';
		$response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>There is no user registered with that email address.</div> ');
		} else {
		$random_password = wp_generate_password( 12, false );
		$user = get_user_by( 'email', $email );
		$update_user = wp_update_user( array (
		'ID' => $user->ID,
		'user_pass' => $random_password
		)
		);
		// if  update user return true then lets send user an email containing the new password
		if( $update_user ) {
		$to = $email;
		$subject = 'Your new password';
		$sender = get_option('name');
		$message = 'Your new password is: '.$random_password;
		$headers[] = 'MIME-Version: 1.0' . "\r\n";
		$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers[] = "X-Mailer: PHP \r\n";
		$headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";
		$mail = wp_mail( $to, $subject, $message, $headers );
		if( $mail )
		$success = 'Check your email address for you new password.';
		$response = array('return'=>'ok','msg'=> '<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>Check your email address for you new password.</div> ');
		} else {
		$error = 'Oops something went wrong updaing your account.';
		$response = array('return'=>'updatefailed','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>Oops something went wrong updaing your account.</div> ');
		}
		}
		if( ! empty( $error ) )
		/*  echo '<div class="message"><p class="error"><strong>ERROR:</strong> '. $error .'</p></div>';*/
		echo json_encode($response);
		if( ! empty( $success ) )
		/*  echo '<div class="error_login"><p class="success">'. $success .'</p></div>';*/
		echo json_encode($response);
		}
		die;
	}

	public function it_create_user() {
		check_ajax_referer( 'ajax-nonce', 'security' );
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
		'user_pass'     =>  $password,
		'first_name'    =>  $fname,
		'user_email'    =>  $email,
		'display_name'  =>  $fname,
		'nickname'      =>  $fname,
		'user_status'   =>1
		//'role'      =>  'wholesaler'
		)
		);
		$code = sha1( $user_id . time() );
		$activation_link = add_query_arg( array( 'key' => $code, 'user' => $user_id ), get_permalink(288));
		add_user_meta( $user_id, 'has_to_be_activated', $code, true );
		$user_name=  sanitize_title_with_dashes($fname);
		update_user_meta( $user_id, 'phone', $register_phone );
		update_user_meta( $user_id, 'business_name', $businessname );
		if($user_id){
		global $wpdb;
		$status = 1;
		$user_table =  $wpdb->prefix . "users";
		$wpdb->update($user_table, array('user_status'=>$status), array('ID'=>$user_id));
		/*******************first mail to user - start **************************/
		$full_name = $fname . ' ' . $lname;
		$fullname = ucwords(strtolower($user_name));
		$subject = "Welcome to ".$from_name;
		$message = '<p>Dear '. $full_name.'!</p><p></p><p>You have successfully created an account to our Website.<br>Your Email: '.$email.'<br> Your password is : '.$password;
		if('yes' == get_option('alrl_email_activation')){

		$message .='<br>To activate your acount click on the folowing link: '.$activation_link;
		}
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
		$reg_msg = (!empty(get_option('reg_success_msg'))) ? esc_attr( get_option('reg_success_msg') ): 'Registration successfull. Please check your mail for confirmation.';
		$save_value[0]='success';
		$save_value[1] = '<div class="alert alert-success" role="alert">
		<button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'.$reg_msg.'</div>';
		$save_value[3]= $activation_link;
		// return $save_value;
		}
		echo json_encode($save_value) ;
		// json_encode($_POST);
		die;
	}

	public function user_login_func(){
		check_ajax_referer( 'ajax-nonce', 'security' );
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
		if($results->ID){
		//          $response = array('return'=>'invalid', 'msg'=>'<div class="alert alert-danger alert-dismissable fade in">
		//                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		//                <strong>Your account has not been activated yet.</strong>To activate it check your email and click on the activation link.</div> ','data'=>$activation_key);
		// echo json_encode($response);
		// die;
		$activation_id = $results->ID;
		$activation_key =  get_user_meta( $activation_id, 'has_to_be_activated', true );
		$user_meta=get_userdata($results->ID);
		$user_roles=$user_meta->roles;
		if('yes' == get_option('alrl_email_activation')){
		 if($activation_key != false )
			{
			$response = array('return'=>'not_activated','key'=>$activation_key,'msg'=> '<div class="alert alert-danger alert-dismissable fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Your account has not been activated yet.</strong>To activate it check your email and click on the activation link.</div> ');
			}
		}
		// elseif( $results->user_status == 0 ){
		elseif( 1== 2 ){
		$response = array('return'=>'inactive','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Your account is inactive.</strong> Please contact to site the admin.</div> ');
		}
		else{ 
		$user_verify = wp_signon( $login_data, $secure_cookie = '' ); 
	        wp_set_current_user($user_verify->ID);
			wp_set_auth_cookie( $user_verify->ID, true, false );
			do_action( 'wp_login', $username );
			//wp_set_current_user($user->ID);
		if ( is_wp_error($user_verify) ){
		//loging falis
		$response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>Invalid Username or Password...!</div> ');
		} 
		else {
		//login success
	       

      		$post_id = esc_attr( get_option('login_redirect') ); //specify post id here
			$post = get_post($post_id); 
			$slug = $post->post_name;
      		$page_slug = site_url($slug);
			$login_redirect = (!empty(get_option('login_redirect'))) ? $page_slug : home_url();
      		$msg = (!empty(get_option('log_success_msg'))) ? esc_attr( get_option('log_success_msg') ): 'Login successfull. Redirecting...!';
		$response = array('return'=>'true','redirect' => $login_redirect, 'msg'=> '<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>'.$msg.'</div>');
		
		}
		}
		}//end result if
		else{
		$response = array('return'=>'invalid','msg'=> '<div class="alert alert-warning alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong></strong>User does not exits! </div> ');
		}
		echo json_encode($response);
	    exit;
		} //end $_post if
		}
    public function alrl_shortcode_cb(){
    	add_shortcode( 'alrl-login-register-lite', array( $this, 'alrl_login_register_shortcode' ) );
    	add_shortcode('alrl-profile-lite', array( $this, 'alrl_profile_shortcode'));
    }

    public function redirect_to_alrl_page_template($template){
    	if ('profile.php' == basename ($template))
        // $template = WP_PLUGIN_DIR . '/mypluginname/my-custom-template.php';
        $template = ALRL_URL . '/view/profile.php';
    	return $template;
    }
    public function create_alrl_page_template($templates){
 	$templates['profile.php'] = 'My Profile';
    return $templates;
    }
	public function plugin_add_settings_link( $links ) {
	    $settings_link = '<a href="admin.php?page=ajax-login-register-lite">' . __( 'Settings' ) . '</a>';
	    array_push( $links, $settings_link );
	  	return $links;
	}
    public function create_alrl_profile_page(){
		if( get_page_by_title('My Profile') === null ) // page doesn't exist
		{
		     $my_post = array(
		      'post_title'    => wp_strip_all_tags( 'My Profile' ),
		      'post_content'  => '[alrl-profile-lite]',
		      'post_status'   => 'publish',
		      'post_author'   => 1,
		      'post_type'     => 'page',
		    );

		    // Insert the post into the database
		    wp_insert_post( $my_post );

		}
    }
    public function create_alrl_login_page(){
	if( get_page_by_title('ALRL') === null ) // page doesn't exist
		{
		     $my_post = array(
		      'post_title'    => wp_strip_all_tags( 'ALRL' ),
		      'post_content'  => '[alrl-login-register-lite]',
		      'post_status'   => 'publish',
		      'post_author'   => 1,
		      'post_type'     => 'page',
		    );

		    // Insert the post into the database
		    wp_insert_post( $my_post );

		}
    }

	public function alrl_user_profile_cb(){
		include_once('view/profile-edit.php');

	}
	public function ajax_login_register_lite(){
	include_once('admin/admin-settings.php');
	}
	public function admin_image_uploader( $meta_key, $width, $height, $default_img ) {
	    // Set variables
	    $options = get_option( 'alrl_images' );
	   
	    if ( !empty( $options[$meta_key] ) ) {
	        $image_attributes = wp_get_attachment_image_src( $options[$meta_key], array( $width, $height ) );
	        $src = $image_attributes[0];
	        $value = $options[$meta_key];
	    } else {
	        $src = $default_img;
	        $value = '';
	    }

	    $text = __( 'Upload', RSSFI_TEXT );

	    // Print HTML field
	    echo '
	        <div class="upload">
	            <img data-src="' . $default_image . '" src="' . $src . '" width="' . $width . 'px" height="' . $height . 'px" />
	            <div>
	                <input type="hidden" name="alrl_images[' . $meta_key . ']" id="alrl_images[' . $meta_key . ']" value="' . $value . '" />
	                <button type="submit" class="upload_image_button button">' . $text . '</button>
	                <button type="submit" class="remove_image_button button">&times;</button>
	            </div>
	        </div>
	    ';
	}

	public function alrl_html_form_code(){
		include_once('view/form-register-login.php');
	}

	public function alrl_deliver_mail(){
		if ( isset( $_POST['cf-submitted'] ) ) {
		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$subject = sanitize_text_field( $_POST["cf-subject"] );
		$message = esc_textarea( $_POST["cf-message"] );
		$this->validate_form($name, $email, $subject, $message);//validation called here
		// display form error if it exist
		if (is_array($this->form_errors)) {
		foreach ($this->form_errors as $error) {
		echo '<div style="color:red;">';
		echo '<strong>ERROR</strong>:';
		echo $error . '<br/>';
		echo '</div>';
		}
		}
			// get the blog administrator's email address
			if ( count($this->form_errors) < 1 ) {
			$to = get_option( 'admin_email' );
			$headers = "From: $name <$email>" . "\r\n";
				// If email has been process for sending, display a success message
				if ( wp_mail( $to, $subject, $message, $headers ) ) {
				echo '<div>';
				echo '<p>Thanks for contacting me, expect a response soon.</p>';
				echo '</div>';
				} else {
				echo 'An unexpected error occurred';
				}
			}
		}
	}

	public function alrl_login_register_shortcode() {
		ob_start();
		//$this->alrl_deliver_mail();
		$this->alrl_html_form_code();
		return ob_get_clean();
	}

	public function alrl_profile_process(){
	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');
	$allowedExts          = array("jpeg", "jpg", "png"); 
    $allowedMimeTypes     = array('image/gif','image/jpeg','image/png');
  	//$filetype             = array();

      $extension            = end(explode(".", $files["name"]));
      if(! in_array($extension, $allowedExts )){
      $filetype          = $extension;
        }
   
      //$maxsize = array();
 
      if($files["size"]>2097152){
      $maxsize = $size;
        }

	global $current_user;
	//var_dump($_POST);
	$error = array();
	$userdata = array();  
	$userdata['ID'] =  $current_user->ID ;

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['pf-submitted'] ) && $_POST['pf-submitted'] == 'pf-submitted' ) {

			    /* Update user password. */
		    if ( !empty($_POST['pass1'] ) && !empty( $_POST['pass2'] ) ) {
		        if ( $_POST['pass1'] == $_POST['pass2'] ){
		        	$userdata['user_pass'] =  esc_attr( $_POST['pass1'] );
				}
		        else{
		            $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'profile');
		        }
		    }

		    /* Update user information. */
		    if ( !empty( $_POST['url'] ) )
		    	$userdata['user_url'] =  esc_attr( $_POST['url'] );
		       
		    if ( !empty( $_POST['email'] ) ){
		        if (!is_email(esc_attr( $_POST['email'] )))
		            $error[] = __('The Email you entered is not valid.  please try again.', 'profile');
		        elseif(email_exists(esc_attr( $_POST['email'] )) == $current_user->ID ){
		        	$userdata['user_email'] =  esc_attr( $_POST['email'] );
		        }
		        elseif(email_exists(esc_attr( $_POST['email'] )) > 0 )
		            $error[] = __('This email is already used by another user.  try a different one.', 'profile');
		        else{
		        		$userdata['user_email'] =  esc_attr( $_POST['email'] );
		        }
		    }

		    if ( !empty( $_POST['first_name'] ) )
		    	$userdata['first_name'] =  esc_attr( $_POST['first_name'] );
		    if ( !empty( $_POST['last_name'] ) )
		    	$userdata['last_name'] =  esc_attr( $_POST['last_name'] );
		    if ( !empty( $_POST['description'] ) )
		    	$userdata['description'] =  esc_attr( $_POST['description'] );
		    if ( !empty( $_POST['phone'] ) )
		        update_user_meta( $current_user->ID, 'phone', esc_attr( $_POST['phone'] ) );
		    if ( !empty( $_POST['address1'] ) )
		        update_user_meta( $current_user->ID, 'address1', esc_attr( $_POST['address1'] ) );
		    if ( !empty( $_POST['address2'] ) )
		        update_user_meta( $current_user->ID, 'address2', esc_attr( $_POST['address2'] ) );
		    if ( !empty( $_POST['city'] ) )
		        update_user_meta( $current_user->ID, 'city', esc_attr( $_POST['city'] ) );
		    if ( !empty( $_POST['country'] ) )
		        update_user_meta( $current_user->ID, 'country', esc_attr( $_POST['country'] ) );		    
		    if ( !empty( $_POST['zip'] ) )
		        update_user_meta( $current_user->ID, 'zip', esc_attr( $_POST['zip'] ) );
		    if($filetype!="" || $filetype!=null){//file type validation
		      $error[]  =  __('File type does not match.', 'profile');
		      } 
		    if($maxsize!='' || $maxsize!=null) {//file size validation    
		       $error[]  =  __('Max Upload size is 2 MB.', 'profile');
		      }//end nested if
		    /* Redirect so the page will show updated info.*/
		    if ( count($error) > 0 ){ echo '<div class="alert alert-danger alert-dismissable fade in">
		        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		        <strong>Oh snap! </strong><ul><li>'. implode("</li><li>", $error) . '</li></ul></div>';}
		    if ( count($error) == 0 ) {
		        //action hook for plugins and extra fields saving
		        $user_id = wp_update_user($userdata);
		        do_action('edit_user_profile_update', $current_user->ID);
		        /*Upload profile pic*/
		        if( $_FILES['user_pic']['error'] === UPLOAD_ERR_OK ) {
	            $upload_overrides = array( 'test_form' => false ); // if you don’t pass 'test_form' => FALSE the upload will be rejected
	            $r = wp_handle_upload( $_FILES['user_pic'], $upload_overrides );
	            update_user_meta( $current_user->ID, 'user_pic', $r );
	        	}
		        /* Re login the user after password change*/
		        if(!empty($userdata['user_pass'])){
		       	wp_set_password( $userdata['user_pass'], $user_id );
		        wp_set_current_user($userdata['ID'] );
				wp_set_auth_cookie( $userdata['ID'], true, false );
				do_action( 'wp_login', $userdata['user_email'] );
				}
		        echo '<div class="alert alert-success alert-dismissable fade in">
		        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		        <strong>All right ! </strong>Profile updated successfully!</div>';  
		    }
		  
		}
 		

	}
	public function alrl_profile_shortcode(){
		ob_start();
		global $current_user, $wp_roles;
		$img = get_user_meta($current_user->ID,'user_pic', true);
		$img = (!empty($img)) ? $img['url'] : 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png';
		// print_r($current_user);
		$this->alrl_profile_process();
		include_once('view/profile.php');
		return ob_get_clean();
	}
}

new ALRL();

?>
<?php 
$folder = '/egates';
require_once($_SERVER['DOCUMENT_ROOT'] . $folder . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . $folder . '/wp-load.php');
//  $gi_settings_options = get_option( 'gi_settings_option_name' ); // Array of All Options
//  $folder_name_0 = $gi_settings_options['folder_name_0']; // Folder Name
// echo $folder_name_0;
//  die;
global $wpdb;
if(isset($_POST['status']) && $_POST['user_id']){
	$status = $_POST['status'];
	$user_id = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$admin_email = get_option( 'admin_email' );
	// $sqli = "update my_order set status= $status where order_id= $order_id";
	$results = $wpdb->update('wp_users', array('user_status'=>$status), array('ID'=>$user_id));
	if($results>0){
		$status = ($status == 1) ? 'active' : 'inactive';
		$from_email = $user_email;
		$user_name = $user_name;
		$admin_email = $admin_email;
		$subject = 'Account Status Changed';
		$body = '<html><head></head> 
		              <body>
			              <h3>Dear<em> '.$user_name.',</em></h3>
			              <h3 style="color: #004496;">Your account is now '.$status.'.</h3>
		              </body>
	              </html>';
		$headers="From:".$user_name."< ".$from_email. " >\r\n";
		$headers .= "Reply-To:".$admin_email."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$to = $from_email;
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n"; 
		if(wp_mail( $to, $subject, $body, $headers )){
			echo 'Status has been changed successfully!';
		}
		else{
			//failed to deliver mail
			echo 'Status has been changed successfully with error code 471';
		}
	}
	else{
		//update failed
		echo 'Server error';
	}
}
else{
	//status or user_id not set
	echo 'Opps! Something went wrong.';
}
?>
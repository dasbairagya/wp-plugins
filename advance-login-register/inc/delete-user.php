<?php
$folder = '/egates';
require_once($_SERVER['DOCUMENT_ROOT'] . $folder . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . $folder . '/wp-load.php');
if(isset($_POST['user_id'])){
	$user_id=$_POST['user_id'];
	// $sqli = "update my_order set status= $status where order_id= $order_id";
	$results = $wpdb->delete('wp_users', array( 'ID'=>$user_id) );
	if($results>0){
		echo 'User has been deleted successfully!';
	}
	else{
		echo 'Server error';	
	}
}
else{
	echo 'Opps! Something went wrong.';
}
?>
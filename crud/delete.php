<?php 
/* 
*Template Name:Delete
*/    
$q = intval($_GET['q']);
global $post;
global $wpdb;
 $result = $wpdb->delete( 'markers', array( 'ID' => $q ), array( '%d' ) );
if($result){
 $message =  "<br /><center><code>Vegan have been deleted successfully........! </code></center> <br />";
}
else{
	$message="Failed!";
}
echo $message;


?>
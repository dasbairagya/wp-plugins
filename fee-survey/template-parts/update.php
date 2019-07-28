<?php 
/* 
*Template Name:update
*/    
global $post;
global $wpdb;
	$uname = $_POST['uname'];
	$umonth = $_POST['umonth'];
	$uamount = $_POST['uamount'];
	$ustatus = $_POST['ustatus'];
	$uid = $_POST['uid'];

$con = mysqli_connect("localhost","biz15_sunshineda","VWHbTd_Whvi^","biz15_sunshinedaycare");

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    // Select all the rows in the markers tables_to_repair
      $query = "UPDATE fee_survey SET name='$uname', month='$umonth', amount='$uamount', status='$ustatus' WHERE id='$uid'";
      // var_dump($query);
    $result = mysqli_query($con,$query);

if($result){
 $message =  "<br /><center><code>Student have been updated successfully........! </code></center> <br />";
}
else{
	$message="Failed!";
}
echo $message;


?>
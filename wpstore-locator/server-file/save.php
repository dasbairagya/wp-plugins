<?php 
/* 
*Template Name:save
*/    
	$name = $_POST['name'];
	$address = $_POST['address'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$type = $_POST['type'];
	$story = $_POST['story'];
    $con = mysqli_connect("localhost","biz15_isavedasou","dR5gm?Olyc4E");
mysqli_select_db($con, "biz15_isavedasoulwp") or die ("no database");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    // Select all the rows in the markers tables_to_repair
    $query = "INSERT INTO markers(name,address,lat,lng,cat,story) VALUES ('$name','$address','$lat','$lng','$type','$story')";
    $result = mysqli_query($con,$query);
    if ($result) {
    
    		echo "<h2>success...!</h2>";
      // die('Invalid query: ' . mysql_error());
    }
    // else{
    // 	echo "success...!";
    // }

else{
	echo "Access Denied...!";
}

?>
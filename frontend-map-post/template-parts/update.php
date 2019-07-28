<?php 
/* 
*Template Name:update
*/    
global $post;
global $wpdb;
	$name = $_POST['name'];
	$address = $_POST['address'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$type = $_POST['type1'];
	$story = $_POST['story'];
	$city_id = $_POST['city_id'];

	$con = mysqli_connect("localhost","root","","isavedasoulwp");

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    // Select all the rows in the markers tables_to_repair
      $query = "UPDATE markers SET name='$name', address='$address', lat='$lat', lng='$lng', cat='$type', story='$story' WHERE id='$city_id'";
      // var_dump($query);
    $result = mysqli_query($con,$query);

//  $result = $wpdb->update( 
// 	'markers', 
// 	array( 
// 		'name' => '$name',	
// 		'address' => '$address',
// 		'lat' => '$lat',
// 		'lng' => '$lng',
// 		'type' => '$type',
// 		'story' => '$story',
// 	), 
// 	array( 'ID' => $city_id ), 
// 	array( 
// 		'%s',	
// 		'%s',	
// 		'%d',	
// 		'%d',	
// 		'%s',	
// 		'%s'	
// 	), 
// 	array( '%d' ) 
// );
if($result){
 $message =  "<br /><center><code>Vegan have been updated successfully........! </code></center> <br />";
}
else{
	$message="Failed!";
}
echo $message;


?>
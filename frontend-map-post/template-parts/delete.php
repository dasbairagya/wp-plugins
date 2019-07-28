<?php 
/*
*Template Name: delete
*/

global $wpdb;
if(isset($_POST['delete_row']))
 {
     $id=$_POST['row_id'];
    $result = $wpdb->delete('markers', array('id' => $id), array('%d'));
     if($result){
    echo "success";
    exit();
     }
}
// $q = intval($_GET['q']);

// $con = mysqli_connect("localhost","root","","isavedasoulwp");

// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }

// // Select all the rows in the markers tables_to_repair
// $query = "DELETE * FROM markers WHERE id=".$q;
// $result = mysqli_query($con,$query);
// if (!$result) {
//   die('Invalid query: ' . mysql_error());
// }
// else{
//   echo "Oops something went wrong...!";
// }

?>


            
            
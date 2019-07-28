<?php    
/*
*Template Name: Save
*/
	$name = $_POST['name2'];
	$month = $_POST['month2'];
	$amount = $_POST['amount2'];
	$status = $_POST['status2'];
$con = mysqli_connect("localhost","biz15_sunshineda","VWHbTd_Whvi^","biz15_sunshinedaycare");
    // $con = mysqli_connect("localhost","biz15_sunshineda","VWHbTd_Whvi^");
mysqli_select_db($con, "biz15_sunshinedaycare") or die ("no database");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    // Select all the rows in the markers tables_to_repair
    $query = "INSERT INTO fee_survey(name,month,amount,status) VALUES ('$name','$month','$amount','$status)";
    $result = mysqli_query($con,$query);
    if ($result) {echo "<h2>success...!</h2>"; }
   else{ echo "Access Denied...!";}

?>
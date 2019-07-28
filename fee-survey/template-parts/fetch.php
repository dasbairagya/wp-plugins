<?php 
/*
*Template Name: fetch
*/

$q = intval($_GET['q']);

$con = mysqli_connect("localhost","biz15_sunshineda","VWHbTd_Whvi^","biz15_sunshinedaycare");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Select all the rows in the markers tables_to_repair
$query = "SELECT * FROM fee_survey WHERE id=".$q;
$result = mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
while ($row = mysqli_fetch_assoc($result)){ 
?>

<div class="form-group">
            <input class="form-control " type="text" id="name1" name="name1" value="<?php echo $row['name']?>">
            </div>
            <div class="form-group">
            <input class="form-control " type="text" id="month1" name="month1" value="<?php echo $row['month']?>">
            </div>
            <div class="form-group">
            <input class="form-control " type="text" id="amount1" name="amount1" value="<?php echo $row['amount']?>">
            </div>
            <div class="form-group">
            <input class="form-control " type="text" id="status1" name="status1" value="<?php echo $row['status']?>">
            </div>
            
          
            
            <div class="form-group">
            <input type="hidden" id="std-id" name="std-id" value="<?php echo $q ;?>">
            </div>

            
            <?php  }?>
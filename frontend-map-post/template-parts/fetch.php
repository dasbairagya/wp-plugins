<?php 
/*
*Template Name: fetch
*/

$q = intval($_GET['q']);

$con = mysqli_connect("localhost","root","","isavedasoulwp");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Select all the rows in the markers tables_to_repair
$query = "SELECT * FROM markers WHERE id=".$q;
$result = mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
while ($row = mysqli_fetch_assoc($result)){ 
?>

<div class="form-group">
            <input class="form-control " type="text" id="title1" name="title" value="<?php echo $row['name']?>">
            </div>
            <div class="form-group">
            <input class="form-control " type="text" id="address1" name="address" value="<?php echo $row['address']?>">
            </div>
            <div class="form-group">
            <input class="form-control " type="text" id="lat1" name="lat" value="<?php echo $row['lat']?>">
            </div>
            <div class="form-group">
            <input class="form-control " type="text" id="lng1" name="lng" value="<?php echo $row['lng']?>">
            </div>
            <div class="form-group">
            <select name="type" id="veg" class="form-control" >
                            <option value="">Select a category</option>
                            <option value="green">First kisses</option>
                            <option value="blue">Last kisses</option>
                            <option value="red">Hot 'n Heavy</option>
                            <option value="yellow">Friends and Family</option>
                            <option value="perple">All other kisses</option>                    
                            
                        </select>
            </div>
            
            <div class="form-group">
            <textarea rows="2" class="form-control" id="story1" name="story">
                <?php echo htmlspecialchars($row['story']);?>
            </textarea>
            <input type="hidden" id="city-id" name="city-id" value="<?php echo $q ;?>">
            </div>

            
            <?php  }?>
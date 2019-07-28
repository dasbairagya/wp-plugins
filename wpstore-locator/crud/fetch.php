<?php 
/*
*Template Name: fetch
*/

$q = intval($_GET['q']);

$con = mysqli_connect("localhost","root","","research");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Select all the rows in the markers tables_to_repair
$query = "SELECT * FROM markers WHERE '".$q."'";
$result = mysqli_query($con,$query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'name="' . parseToXML($row['name']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['cat'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>
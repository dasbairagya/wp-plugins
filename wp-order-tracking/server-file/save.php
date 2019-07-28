<?php 
require_once('connect.php');
 
	$permsn = $_POST['permsn'];
	$user_id = $_POST['user_id'];
	$forms = explode(',', $permsn);

    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $q = "SELECT * FROM permission WHERE user_id =".$user_id;
      $result = mysqli_query($con,$q);
      $row=mysqli_num_rows($result);
      if($row>0){
  			
		      	$sql = "DELETE FROM permission WHERE user_id=".$user_id;
		      	 if(mysqli_query($con, $sql)){
							foreach($forms as $form_name){
						    $query = "INSERT INTO permission( user_id, form_name) VALUES ('$user_id','$form_name')";
						    $member_result = mysqli_query($con,$query);
						}
					}
					else{
						$member_result = 'Oops something went wrong...!';
					}

		  
		  }
 
      else{
			foreach($forms as $form_name){
			    $query = "INSERT INTO permission( user_id, form_name) VALUES ('$user_id','$form_name')";
			       $member_result = mysqli_query($con,$query);
				}
				
		}
 
    if ($member_result) {
    		echo '<div class="alert alert-success animated slideInDown"><strong>Permission set successfullay!</strong></div>';
    }
    else{
    	echo '<div class="alert alert-error animated slideInDown">Access Denied...!</div>';
    }
?>
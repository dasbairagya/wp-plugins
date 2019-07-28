<?php 
global $wpdb;
if(isset($_POST['delete_row']))
 {
     $id=$_POST['row_id'];
    $result = $wpdb->delete('fee_survey', array('id' => $id), array('%d'));
     if($result){
    echo "success";
    exit();
     }
}

?>


            
            
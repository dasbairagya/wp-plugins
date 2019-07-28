<?php
global $wpdb;
$currnet_user_id = get_current_user_id();
$current_user   = wp_get_current_user();
$role_name      = $current_user->roles[0];
$sqli = "SELECT * FROM permission WHERE user_id =".$currnet_user_id;
$results = $wpdb->get_results($sqli);
$i=1;
foreach ($results as $result) { ?>
<li class="<?php echo ($i==1)?'active':'';?>"><a href="#tab_<?php echo $i;?>" data-toggle="tab" id="tab<?php echo $i;?>" class="tab" onClick="changeColor(this.id)"><?php echo $result->form_name; ?></a></li>
<?php 
$i++;
} 
?>
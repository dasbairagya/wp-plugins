<?php
// include_once('random-gallery.php');
// $test = new PRI();
global $post;
if(isset($_POST['id']) && $_POST['action']=='get-id'){
$post_id =  $_POST['id'];
//$result = get_post_galleries_images($post_id);
echo $post_id;
}
else{
	echo 'error';
}

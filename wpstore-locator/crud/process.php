<?php 
/**
 *
 * Template Name:Send
 *
 */
global $post;
global $wpdb;
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$from_email = 'das@gmail.com';
$from_name = 'das';
$username = $name;

// ---------------------- first mail to user - start -------------------------
$fullname = ucwords(strtolower($user_name));
$subject = $subject;
$message = '<p>Dear '. ucwords(strtolower($email)).',</p><p></p><p>Your order has been taken .<br> User Name: '.$username.
'<br>  Email     : '.$email.
'<br>  Phone     : '.$mobile.
'<br>  Message   : '.$message.
'<br>';
//Headers
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
if(!empty($from_email) && filter_var($from_email,FILTER_VALIDATE_EMAIL))//Validating From
    $headers .= "From: ".$from_name." <".$from_email."> \r\n";
$reply_email = $from_email;
if($reply_email){
    $headers .= "Reply-To: {$reply_email}\r\n";
    $headers .= "Return-Path: {$from_name}\r\n";
}
$send= wp_mail($email, $subject, $message , $headers);
//--------------------------- first mail to user - end -------------------------------------

//--------------------------- Mail to admin - start-------------------------------------

$subject = $from_name."- New Order Request";
$message    = '<p>Dear Admin,</p><p>'.$username.' trying to contact you in our website!</p><br>User Details are:<br>
 User Name: '.$username.
'<br>  Email     : '.$email.
'<br>  Phone     : '.$mobile.
'<br>  Subject     : '.$subject.
'<br>  Message   : '.$message.
'<br>'. '<p>Best Wishes,<br>Team '.$from_name;
wp_mail($from_email, $subject, $message , $headers);
//--------------------------- Mail to admin - end -----------------------------------------------
     
if($send){
echo "<p class='success'>Success !</p>";
}
else{
echo "<p class='error'>Oops ! Something went wrong</p>";
}
    
   
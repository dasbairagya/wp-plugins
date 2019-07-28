<?php
ob_start();

		global $wpdb;

		$error = '';
		$success = '';

		// check if we're in reset form
		if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] )
		{
			$email = trim($_POST['user_login']);

			if( empty( $email ) ) {
				$error = 'Enter a username or e-mail address..';
				$response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>Enter a username or e-mail address..!</div> ');
			} else if( ! is_email( $email )) {
				$error = 'Invalid username or e-mail address.';
					$response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>Invalid username or e-mail address </div>');
			} else if( ! email_exists( $email ) ) {
				$error = 'There is no user registered with that email address.';
							$response = array('return'=>'invalid','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>There is no user registered with that email address.</div> ');
			} else {

				$random_password = wp_generate_password( 12, false );
				$user = get_user_by( 'email', $email );

				$update_user = wp_update_user( array (
						'ID' => $user->ID,
						'user_pass' => $random_password
					)
				);

				// if  update user return true then lets send user an email containing the new password
				if( $update_user ) {
					$to = $email;
					$subject = 'Your new password';
					$sender = get_option('name');

					$message = 'Your new password is: '.$random_password;

					$headers[] = 'MIME-Version: 1.0' . "\r\n";
					$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$headers[] = "X-Mailer: PHP \r\n";
					$headers[] = 'From: '.$sender.' < '.$email.'>' . "\r\n";

					$mail = wp_mail( $to, $subject, $message, $headers );
					if( $mail )
						$success = 'Check your email address for you new password.';
							$response = array('return'=>'ok','msg'=> '<div class="alert alert-success alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>Check your email address for you new password.</div> ');

				} else {
					$error = 'Oops something went wrong updaing your account.';
					$response = array('return'=>'updatefailed','msg'=> '<div class="alert alert-danger alert-dismissable fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong></strong>Oops something went wrong updaing your account.</div> ');
					
				}

			}

			if( ! empty( $error ) )
			/*	echo '<div class="message"><p class="error"><strong>ERROR:</strong> '. $error .'</p></div>';*/
			 echo json_encode($response);

			if( ! empty( $success ) )
			/*	echo '<div class="error_login"><p class="success">'. $success .'</p></div>';*/
				echo json_encode($response);
		}
	?>
<?php
/*Plugin Name: Ajax Get In Touch */
if ( ! defined( 'ABSPATH' ) ) { exit; }
class agit 
{
	private $form_errors = array();
	function __construct(){
		add_action('init', array($this, 'create_admin_menu'));
		add_shortcode( 'AGIT', array( $this,'cf_shortcode') );
	}
	public function create_admin_menu(){
		$page_title = 'Ajax Get In Touch';
		$menu_title = 'Ajax Get In Touch';
		$capability = 'manage_options';
		$menu_slug  = 'get-in-touch';
		$function   = array($this, 'get_in_touch');
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function , $icon_url = 'dashicons-format-status', $position = 6 );
	}
	public function get_in_touch(){
		?>
		<div class="wrap">
			
		</div>
		<?php
	}
	// html form view
	public function html_form_code() {
	echo '<div>';
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Your Name (required) <br/>';
	echo '<input type="text" class="form-control" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Email (required) <br/>';
	echo '<input type="email" class="form-control" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Subject (required) <br/>';
	echo '<input type="text" class="form-control" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Your Message (required) <br/>';
	echo '<textarea rows="10" cols="35" class="form-control" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
	echo '</p>';
	echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
	echo '</form>';
	echo '</div>';
	}
	//validate the form
	public function validate_form( $name, $email, $subject, $message ) {
 
        // If any field is left empty, add the error message to the error array
        if ( empty($name) || empty($email) || empty($subject) || empty($message) ) {
            array_push( $this->form_errors, 'No field should be left empty' );
        }
 
        // if the name field isn't alphabetic, add the error message
        if ( strlen($name) < 4 ) {
            array_push( $this->form_errors, 'Name should be at least 4 characters' );
        }
 
        // Check if the email is valid
        if ( !is_email($email) ) {
            array_push( $this->form_errors, 'Email is not valid' );
        }
    }
	public function deliver_mail() {
	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted'] ) ) {
			// sanitize form values
			$name    = sanitize_text_field( $_POST["cf-name"] );
			$email   = sanitize_email( $_POST["cf-email"] );
			$subject = sanitize_text_field( $_POST["cf-subject"] );
			$message = esc_textarea( $_POST["cf-message"] );
            $this->validate_form($name, $email, $subject, $message);//validation called here
            // display form error if it exist
            if (is_array($this->form_errors)) {
                foreach ($this->form_errors as $error) {
                    echo '<div style="color:red;">';
                    echo '<strong>ERROR</strong>:';
                    echo $error . '<br/>';
                    echo '</div>';
                }
            }
			// get the blog administrator's email address
           if ( count($this->form_errors) < 1 ) {
			$to = get_option( 'admin_email' );

			$headers = "From: $name <$email>" . "\r\n";

			// If email has been process for sending, display a success message
			if ( wp_mail( $to, $subject, $message, $headers ) ) {
				echo '<div>';
				echo '<p>Thanks for contacting me, expect a response soon.</p>';
				echo '</div>';
			} else {
				echo 'An unexpected error occurred';
			}
		  }
		}
	}

	public function cf_shortcode() {
		ob_start();
		$this->deliver_mail();
		$this->html_form_code();
		return ob_get_clean();
	}

}
new agit();
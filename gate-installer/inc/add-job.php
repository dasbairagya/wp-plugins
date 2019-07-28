<?php 
error_reporting(0);

 $gi_settings_options = get_option( 'gi_settings_option_name' ); // Array of All Options
 $folder_name_0 = $gi_settings_options['folder_name_0']; // Folder Name

$folder = '/egates';
require_once($_SERVER['DOCUMENT_ROOT'] . $folder . '/wp-config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . $folder . '/wp-load.php');
if ( ! function_exists( 'wp_handle_upload' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
}
require_once(ABSPATH . 'wp-admin/includes/image.php');
global $wpdb;
if( isset( $_POST['installer_id'] ) && $_POST['installer_id'] != null ){

$job_title = $_POST['job_title'];
$job_description = $_POST['job_description'];
$file1 = $_FILES['featured_img' ];
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$customer_contact = $_POST['customer_contact'];
$customer_address = $_POST['customer_address'];
$installer_name = $_POST['installer_name'];
$installer_id = $_POST['installer_id'];

$wp_upload_dir = wp_upload_dir();

$upload_path      = str_replace( '/', DIRECTORY_SEPARATOR, $wp_upload_dir['path'] ) . DIRECTORY_SEPARATOR;
//echo 'upload path='.$upload_path.'<br>';
//output=>C:\xampp\htdocs\egates\wp-content\uploads\2018\05\
$upload_url      = str_replace( '/', DIRECTORY_SEPARATOR, $wp_upload_dir['url'] ) . DIRECTORY_SEPARATOR;
//echo $wp_upload_dir['url'];
//output=>http://localhost/egates/wp-content/uploads/2018/05/
//echo 'upload url='.$upload_url.'<br>';
//output=>http:\\localhost\egates\wp-content\uploads\2018\05\

        $img = $_POST['featured_img'];
        $img = str_replace('data:image/jpeg;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $decoded = base64_decode($img) ;
        $filename         = 'job.jpeg';
        $hashed_filename  = md5( $filename . microtime() ) . '_' . $filename;
        $image_upload     = file_put_contents( $upload_path . $hashed_filename, $decoded );
        //output=>780831

        //HANDLE UPLOADED FILE
        $file             = array();
        $file['error']    = 'UPLOAD_ERR_OK';
        $file['tmp_name'] = $upload_path . $hashed_filename;
        $file['name']     = $hashed_filename;
        $file['type']     = 'image/jpeg';
        $file['size']     = filesize( $upload_path . $hashed_filename );
        $file['url']     = $wp_upload_dir['url'] .'/'. basename($file['name']);
        
        $filename = $file['url'];
            // $upload_overrides = array( array('test_form' => FALSE, 'test_upload' => FALSE, 'test_type' => FALSE) ); // if you don’t pass 'test_form' => FALSE the upload will be rejected
            // $file_return = wp_handle_upload( $file, $upload_overrides );
            // var_dump($file_return);
            //die;
            //IO=> array(3) { ["file"]=> string(60) "C:\xampp\htdocs\egates/wp-content/uploads/2018/05/Tulips.jpg" ["url"]=> string(61) "http://localhost/egates/wp-content/uploads/2018/05/Tulips.jpg" ["type"]=> string(10) "image/jpeg" } 

        $attachment = array(
         'post_mime_type' => $file['type'],
         'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
         'post_content' => '',
         'post_status' => 'inherit',
         'guid' => $wp_upload_dir['url']. '/' . basename( $filename ),
         );
        //  var_dump($attachment);
        // echo 'TEMPNAME='.$filename.'<br>';
        // echo 'basename='.basename($filename).'<br>';
        // echo 'NAME='.$file['name'] .'<br>';
       
        $attach_id = wp_insert_attachment( $attachment, $filename );

        $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
        wp_update_attachment_metadata( $attach_id, $attach_data );

$post_info = array(
        'post_title' =>  wp_strip_all_tags($job_title),
        'post_content' => $job_description,
        'post_type' => 'job',
        'post_author' => $installer_id,
        'post_status'=>'publish'
);
$pid = wp_insert_post( $post_info );
add_post_meta($pid, 'image', $file );
add_post_meta($pid, 'image_ID', $attach_id );
update_post_meta($pid,'_thumbnail_id',$attach_id);

set_post_thumbnail( $pid, $thumbnail_id );
update_post_meta($pid,'customer_name',$customer_name);
update_post_meta($pid,'customer_email',$customer_email);
update_post_meta($pid,'customer_contact',$customer_contact);
update_post_meta($pid,'customer_address',$customer_address);
// wp_set_object_terms($pid, $country,'country');
// wp_set_object_terms($pid, $zip,'zip');
// wp_set_object_terms($pid, $city,'city');
// update_field('email', $email, $pid);

    if($pid){
        
        $message =  '<div class="alert alert-success" role="alert">
                    <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-check alert-icon"></i> Job added successfully.
                </div>';
           
    }
    else{ 
        $message = 
         '<div class="alert alert-danger" role="alert">
        <button style="width: 50px" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <strong>Oh snap!</strong> Change a few things up and try submitting again.
            </div>';
 
     }
echo $message;
 
}
?>

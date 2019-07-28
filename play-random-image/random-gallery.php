<?php
/*Plugin Name: Play Random Image
Plugin URI:   https://github.com/dasbairagya/play-random-image
Description:  Simple WordPress Plugin To Play Random Image
Version:      1.0.0
Author:       IGI
Author URI:   https://www.goigi.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
License:     GPL2
Play Random Image is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
Play Random Image is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Play Random Image. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/
if ( ! defined( 'ABSPATH' ) ) {
exit; // Exit if accessed directly.
}
if ( ! defined( 'PRI_FILE' ) ) {
define( 'PRI_FILE', __FILE__ );
}
if(! defined( 'PRI_URL' )){
define("PRI_URL", plugin_dir_url( __FILE__ ));
}
if(!function_exists('wp_get_current_user')) {
include(ABSPATH . "wp-includes/pluggable.php"); 
}
class PRI{
public function __construct() {
add_action( 'init', array( $this, 'codex_gallery_init') );
add_action("add_meta_boxes", array( $this, 'add_custom_meta_box' ) );
add_filter( 'manage_edit-random_gallery_columns', array( $this, 'my_edit_movie_columns' ) ) ;
add_action( 'manage_random_gallery_posts_custom_column', array( $this, 'my_manage_movie_columns'), 10, 2 );
add_shortcode('Gallery', array( $this, 'cpt_content_func' ) );
add_action('wp_enqueue_scripts', array( $this, 'pri_enqueue_script' ) );
}
//createcustom post type
public function codex_gallery_init() {
$labels = array(
'name'               => _x( 'PRI', 'post type general name', 'your-plugin-textdomain' ),
'singular_name'      => _x( 'Gallery', 'post type singular name', 'your-plugin-textdomain' ),
'add_new'            => 'Add Gallery',
'all_items'          => 'All Gallery',
'edit_item'          =>'Edit Gallery',
);
$args = array(
'labels'             => $labels,
'description'        => __( 'Description.', 'your-plugin-textdomain' ),
'public'             => true,
'publicly_queryable' => true,
'show_ui'            => true,
'show_in_menu'       => true,
'query_var'          => true,
'rewrite'            => array( 'slug' => 'random_gallery' ),
'capability_type'    => 'post',
'has_archive'        => true,
'menu_position'      => 5,
'menu_icon'			 => 'dashicons-editor-unlink',
'supports'           => array( 'title', 'editor', 'thumbnail')
);
register_post_type( 'random_gallery', $args );
}
//create custom meta box for Galleries
public function add_custom_meta_box(){
add_meta_box("shortcode-meta-box", "Shortcode", array( $this, 'custom_meta_box_markup' ), "random_gallery", "side", "high", $post);
}
public function custom_meta_box_markup($post){
echo '<b>[Gallery id='.  $post->ID. ']</b>';
}
//create custom column for Galleries
public function my_edit_movie_columns( $columns ) {
$columns = array(
'cb' => '<input type="checkbox" />',
'title' => __( 'Gallery' ),
'short_code' => __( 'Shortcode' ),
'date' => __( 'Date' )
);
return $columns;
}
public function my_manage_movie_columns( $column, $post_id ) {
global $post;
switch( $column ) {
case 'short_code' :
printf( __( '<b> [Gallery id= %s]</b>' ), $post_id );
break;
case 'status' :
_e( 'No Status' );
break;
default :
break;
}
}
//shuffle images from the galley short code and return one
public function show_gallery_image_urls($gallery_id){
$galleries = get_post_galleries_images( $gallery_id );
$image_list  = array();
foreach( $galleries as $gallery ) {
foreach( $gallery as $image ) {	
$image_list .=  $image ;
}
}
shuffle($gallery);
return  $gallery[0];
}
//create the shortcode
public function cpt_content_func($atts){
$atts = shortcode_atts(array('id' => null,), $atts, 'testing' );
$gallery_id = $atts['id'];
$posts= array();
$posts = get_post( $gallery_id);
$img = PRI_URL.'img/no_Image.jpg';
$url = wp_get_attachment_url( get_post_thumbnail_id($gallery_id) );  
$url = ($url)?$url:$img;          
$random_image_url = $this->show_gallery_image_urls( $gallery_id );
$html = '<div class="imgwrapper "><h2>Click to view random image</h2>';
$html .= '<img class="center-block centered-gdb" id="" data-toggle="modal" data-target="#myModal" onclick="poppic('.$gallery_id.')" src="'. $url.'">';
$html .= '</div>';
?>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onClick="window.location.reload()" class="close" data-dismiss="modal">&times;
        </button>
        <h4 class="modal-title">Random Image form your gallery
        </h4>
      </div>
      <div class="modal-body">
        <img class="center-block centered-gdb" id="flip-img" src="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pri" data-dismiss="modal" onClick="window.location.reload()">Do You Wanna Continue? 
        </button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function poppic(post){
    var dynamic_image = "<?php echo $this->show_gallery_image_urls($gallery_id);?>";
    var target_loc = document.getElementById("flip-img");
    target_loc.src = dynamic_image;
  }
  var modal = document.getElementById('myModal');
  var close = document.getElementsByClassName("close");
</script>
<?php
return $html;
}
//enque script 
public function pri_enqueue_script() {   
wp_enqueue_style ('random-style', PRI_URL. 'css/style.css'  );
}
public function test(){
echo 'test';
}
}
$pri = new PRI();

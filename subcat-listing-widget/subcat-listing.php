<?php
/*
Plugin Name: Subcat Listing Widget
Plugin URI: http://github.com/dasbairagya/subcat-listing-widget
Description: It's a very simple plugin to display all the subcategories of the current categories whilch will list in your website sidebar and you can define category list for your own custom taxonomy.
Version: 1.0.0
Author:       Gopal Dasbairagya
Author URI: http://github.com/dasbairagya/subcat-listing-widget
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
 Subcat Listing Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
Subcat Listing Widget is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Subcat Listing Widget. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


add_action( 'widgets_init', 'register_my_custom_widget'); 
// register my_custom_widget widget
function register_my_custom_widget() {
    register_widget( 'my_custom_widget' );
}
//create my custom widget
class my_custom_widget extends WP_Widget{
var $textdomain;
	public function __construct() {
		 $this->textdomain = 'mycolorpicker';
		parent::__construct( 'my_custom_widget', // Base ID
							 'Subcat Listing Wedget', // Name
							  array( 'description' => esc_html__( 'List the subcategoris of the current categories developed by G.D.Bairagya', 'text_domain' ),) // Args
							);
		// if(!is_admin())
		 add_action('mcw_style',array($this,'mcw_style_func'));		
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget in the fornt-end
		echo $args['before_widget'];
		if ( ! empty( $instance['mcw_title'] ) && !$instance['mcw_hide_title']) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['mcw_title'] ) . $args['after_title'];
		}
		// add css 		
		do_action('mcw_style');
		do_action('mcw_script');
		/** return category list */
		if($instance['mcw_taxonomy_type']){
			$va_category_HTML .='<div class="cstback"><ul class="ve-cat-widget-listing">';
			$currentTerm = get_queried_object();//get the current term
			
				$args_val = array( 'hide_empty=0','parent' =>$currentTerm->$term_id );				
				
				//$terms = get_terms( $instance['mcw_taxonomy_type'], $args_val );

 				$terms = get_categories(array(
                            'parent'       =>$currentTerm->term_id,
                            'hide_empty'   => 1,
                            'hierarchical' => 1,
                            'taxonomy'     => $instance['mcw_taxonomy_type'],
                            'pad_counts'   => 1,
                            'order'        => 'DESC',
                            'orderby'      => 'name'
                            )
                          );

				if ( $terms ) {	

					foreach ( $terms as $term ) {
						
						$term_link = get_term_link( $term );
						
						if ( is_wp_error( $term_link ) ) {
						continue;
						}
						
					$carrentActiveClass='class="tax_class txtclr"';	
					$id = ' id ="'. $term->term_id.'"';
					
					if($term->taxonomy=='category' && is_category())
					{
					  $thisCat = get_category(get_query_var('cat'),false);
					  if($thisCat->term_id == $term->term_id)
						$carrentActiveClass='class="active-cat tax_class"';
				    }
					 
					if(is_tax())
					{
					    $currentTermType = get_query_var( 'taxonomy' );
					    $termId= get_queried_object()->term_id;
						 if(is_tax($currentTermType) && $termId==$term->term_id)
						  $carrentActiveClass='class="active-cat tax_class"';
					}
						
						$va_category_HTML .='<li '.$carrentActiveClass.$id.'><a class="gdbcolr" href="'.$term_link.'">' . $term->name . '</a>';
						if (empty( $instance['mcw_hide_count'] )) {
						$va_category_HTML .='<span class="post-count float-right">('.$term->count.')</span>';
						}
						$va_category_HTML .='</li>';
					}
				}
				else{
					$va_category_HTML .= '<li><h5>Subcategory not found.</h5></li>';
				}
			$va_category_HTML .='</ul></div>';
			echo $va_category_HTML;
			}
	
		echo $args['after_widget'];
		?>
	
<?php

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$mcw_title 					= ! empty( $instance['mcw_title'] ) ? $instance['mcw_title'] : esc_html__( 'My Custom Widget', 'text_domain' );
		$mcw_hide_title 			= ! empty( $instance['mcw_hide_title'] ) ? $instance['mcw_hide_title'] : esc_html__( '', 'text_domain' );
		$mcw_taxonomy_type 			= ! empty( $instance['mcw_taxonomy_type'] ) ? $instance['mcw_taxonomy_type'] : esc_html__( 'category', 'text_domain' );
		$mcw_hide_count 			= ! empty( $instance['mcw_hide_count'] ) ? $instance['mcw_hide_count'] : esc_html__( '', 'text_domain' );
		?>
	
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'mcw_title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mcw_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mcw_title' ) ); ?>" type="text" value="<?php echo esc_attr( $mcw_title ); ?>">
		</p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mcw_hide_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mcw_hide_title' ) ); ?>" type="checkbox" value="1" <?php checked( $mcw_hide_title, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'mcw_hide_title' ) ); ?>"><?php _e( esc_attr( 'Hide Title' ) ); ?> </label> 
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'mcw_taxonomy_type' ) ); ?>"><?php _e( esc_attr( 'Taxonomy Type:' ) ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mcw_taxonomy_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mcw_taxonomy_type' ) ); ?>">
					<?php 
					$args = array(
					  'public'   => true,
					  '_builtin' => false
					  
					); 
					$output = 'names'; // or objects
					$operator = 'and'; // 'and' or 'or'
					$taxonomies = get_taxonomies( $args, $output, $operator ); 
					array_push($taxonomies,'category');
					if ( $taxonomies ) {
					foreach ( $taxonomies as $taxonomy ) {

						echo '<option value="'.$taxonomy.'" '.selected($taxonomy,$mcw_taxonomy_type).'>'.$taxonomy.'</option>';
					}
					}

				?>    
		</select>
		</p>
		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'mcw_hide_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'mcw_hide_count' ) ); ?>" type="checkbox" value="1" <?php checked( $mcw_hide_count, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'mcw_hide_count' ) ); ?>"><?php _e( esc_attr( 'Hide Count' ) ); ?> </label> 
		</p>

		<p><a href="mailto:dasbairagyagopal@gmail.com">Contact to Author</a></p>
   

		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
	// processes widget options to be saved
	$instance = array();
	$mcw_title = $new_instance['mcw_title']; 
	$mcw_hide_title = $new_instance['mcw_hide_title']; 
	$mcw_taxonomy_type = $new_instance['mcw_taxonomy_type']; 
	$mcw_hide_count = $new_instance['mcw_hide_count']; 
	$instance['mcw_title'] = ( ! empty( $mcw_title) ) ? strip_tags( $mcw_title ) : '';
	$instance['mcw_hide_title'] = ( ! empty( $mcw_hide_title ) ) ? strip_tags( $mcw_hide_title ) : '';
	$instance['mcw_taxonomy_type'] = ( ! empty( $mcw_taxonomy_type ) ) ? strip_tags( $mcw_taxonomy_type ) : '';
	$instance['mcw_hide_count'] = ( ! empty( $mcw_hide_count ) ) ? strip_tags( $mcw_hide_count ) : '';

	return $instance;
	}

public function mcw_style_func(){
	?>
	<style type="text/css">
	.widget.widget_my_custom_widget{
		background: #ff6a28;
	}
	.cstback ul.ve-cat-widget-listing li.tax_class > a {
    background: #ff6a28;
    color: #fff !important;
	}
	.cstback ul.ve-cat-widget-listing li.tax_class > a:hover {
	    color: #222222 !important;
	}
	.txtclr span.post-count{
		color: #fff !important;
	}
	</style>
	<?php
	}

}
/* end custom widget class*/


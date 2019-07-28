add_role(
'wholesaler', __('Wholesaler' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => false,
        'delete_posts' => false, // Use false to explicitly deny
        'wholesale'=>true,
    )
);
$roleC= get_role('wholesaler');
$roleC->add_cap('wholesale');

add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {

    global $user_ID;

    if ( current_user_can('wholesaler') ) {
    remove_menu_page( 'edit.php?post_type=thirstylink' );
    remove_menu_page( 'edit.php?post_type=wprss_feed' );
    remove_menu_page( 'authorhreview' );
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('upload.php'); // Media
    remove_menu_page('link-manager.php'); // Links
    remove_menu_page('edit-comments.php'); // Comments
    remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('plugins.php'); // Plugins
    remove_menu_page('themes.php'); // Appearance
    remove_menu_page('users.php'); // Users
    remove_menu_page('tools.php'); // Tools
    remove_menu_page('options-general.php'); // Settings
    remove_menu_page( 'wpcf7' ); 
    remove_menu_page( 'vc-welcome' ); 
    remove_menu_page( 'theme-general-settings' ); 

    }
}

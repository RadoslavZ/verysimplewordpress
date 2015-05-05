<?php
/* FEATRED POST */
function add_featured_meta_box($post){
	$featured = get_post_meta($post->ID, '_featured-post', true);
	echo "<label for='_featured-post'>".__('Feature this post?', 'foobar')."</label>";
	echo "<input type='checkbox' name='featured-post' id='featured-post' value='1' ".checked(1, $featured)." />";
}
add_action( 'widgets_init', 'arphabet_widgets_init' );
	function save_featured_meta($post_id){
	// Do validation here for post_type, nonces, autosave, etc...
	if (isset($_REQUEST['featured-post']))
	update_post_meta(esc_attr($post_id), '_featured-post', esc_attr($_REQUEST['featured-post']));
	// I like using _ before my custom fields, so they are only editable within my form rather than the normal custom fields UI
}
add_action('save_post', 'save_featured_meta');


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/* BLOG POST EXCERPT CUSTOMIZATION */
function new_excerpt_more( $more ) {
	return '...<br><a class="read-more btn btn-default readmoreButton" href="'. 
	get_permalink( get_the_ID() ) . '">' . __('Continue reading', 'your-text-domain') . '<span class="glyphicon glyphicon-circle-arrow-right readmoreArrow" aria-hidden="true"></span></a>';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );


/* MENU */
require_once('wp_bootstrap_navwalker.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Wp Boot' ),
) );


/* FEATURED IMAGE SUPPORT */
add_theme_support( 'post-thumbnails' );
add_image_size( 'single-post-thumbnail', 960, 400 );


/* Register our sidebars and widgetized areas */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Bottom Widgets',
		'id'            => 'home_right_1',
		'before_widget' => '<div class="col-md-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
?>



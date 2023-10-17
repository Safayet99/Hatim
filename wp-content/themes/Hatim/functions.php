<?php

function my_menu(){
    register_nav_menus(array(
        'main_menu'=>"Main Menu",
        'footer_menu1'=>"Footer Section 1",
        'footer_menu2'=>"Footer Section 2",
    ));
}
add_action('init','my_menu');


/**
 * Add custom attributes or classes to links in wp_nav_menu
 */
add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args, $depth ) {
    if (property_exists($args, 'link_atts')) {
        $atts = array_merge($atts, $args->link_atts);
    }
    if (property_exists($args, "link_atts_$depth")) {
        $atts = array_merge($atts, $args->{"link_atts_$depth"});
    }

    if(empty($atts['class'])) {
        $atts['class'] = '';
    }

    $classes = explode(' ', $atts['class']);

    $patterns = apply_filters( 'nav_menu_css_class_unescape_patterns', '/___/');
    $replacements = apply_filters( 'nav_menu_css_class_unescape_replacements', ':' );
    $classes = array_map(function($cssclass) use( $patterns, $replacements) {
        return preg_replace($patterns, $replacements, $cssclass);
    }, $classes);

    if (property_exists($args, 'a_class')) {
        $arr_classes = explode(' ', $args->a_class);
        $classes = array_merge($classes, $arr_classes);
    }
    if (property_exists($args, "a_class_$depth")) {
        $arr_classes = explode(' ', $args->{"a_class_$depth"});
        $classes = array_merge($classes, $arr_classes);
    }

    $atts['class'] = implode(' ', $classes);

    return $atts;
}, 1, 4 );

/**
 * Add custom classes to lis in wp_nav_menu
 */
add_filter( 'nav_menu_css_class', function ( $classes, $item, $args, $depth ) {
    if (property_exists($args, 'li_class')) {
        $arr_classes = explode(' ', $args->li_class);
        $classes = array_merge($classes, $arr_classes);
    }
    if (property_exists($args, "li_class_$depth")) {
        $arr_classes = explode(' ', $args->{"li_class_$depth"});
        $classes = array_merge($classes, $arr_classes);
    }

    return $classes;
}, 1, 4 );

/**
 * Add custom classes to ul.sub-menu in wp_nav_menu
 */
add_filter('nav_menu_submenu_css_class', function( $classes, $args, $depth ) {
    if (property_exists($args, 'submenu_class')) {
        $arr_classes = explode(' ', $args->submenu_class);
        $classes = array_merge($classes, $arr_classes);
    }

    if (property_exists($args, "submenu_class_$depth")) {
        $arr_classes = explode(' ', $args->{"submenu_class_$depth"});
        $classes = array_merge($classes, $arr_classes);
    }

    return $classes;
}, 1, 3);

/**
 * Apply our new custom attributes to widgetized wp_nav_menus
 */
add_filter('widget_nav_menu_args', function($nav_menu_args, $nav_menu, $args, $instance) {

    return $nav_menu_args;
}, 10, 4);

// custome logo
function my_custom_logo_setup(){
    $arg=array(
        'height'        => 100,
        'width'         => 400,
        'flex-height'   => true,
        'flex-width'    => true,
        'header-text' => array('site-title','site-description')
    );
    add_theme_support('custom-logo',$arg);
}
add_action('after_setup_theme','my_custom_logo_setup');




// slider post type
add_action( 'init', 'my_theme_slider' );
// The custom function to register a custom article post type
function my_theme_slider() {
    // Set the labels. This variable is used in the $args array
    $labels = array(
        'name'               => __( 'Slider' ),
        'singular_name'      => __( 'Slider' ),
        'add_new'            => __( 'Add New Slider' ),
        'add_new_item'       => __( 'Add New Slider' ),
        'edit_item'          => __( 'Edit Slider' ),
        'new_item'           => __( 'New Slider' ),
        'all_items'          => __( 'All Sliders' ),
        'view_item'          => __( 'View Slider' ),
        'search_items'       => __( 'Search Slider' ),
        'featured_image'     => 'Slider Image',
        'set_featured_image' => 'Add Slider Image'
    );
// The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'Slider image and details add',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
    );
    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type('slider', $args);
}

// Hook into the 'init' action to register the custom post type on WordPress initialization
add_action( 'init', 'my_theme_slider' );

add_theme_support('post-thumbnails');
add_image_size('full', 9999, 9999, false);




include_once('WPEX_Options_Panel.php');
// Register new Options panel.
$panel_args = [
    'title'           => 'My Options',
    'option_name'     => 'my_options',
    'slug'            => 'my-options-panel',
    'user_capability' => 'manage_options',
];
$panel_settings = [
    'email_address' => [
        'label'       => esc_html__( 'Email Address', 'text_domain' ),
        'type'        => 'text',
        'description' => 'This will show in header',
    ],
    'contact_number' => [
        'label'       => esc_html__( 'Contact number', 'text_domain' ),
        'type'        => 'text',
        'description' => 'This will show in header',
    ],
    'button' => [
        'label'       => esc_html__( 'Button', 'text_domain' ),
        'type'        => 'text',
        'description' => 'This will show in header',
    ],
    'button1' => [
        'label'       => esc_html__( 'Button1', 'text_domain' ),
        'type'        => 'text',
        'description' => 'This will show in header',
    ],

   
    'Our_product' => [
        'label'       => esc_html__( 'Our Product', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Our Product Text',
    ],
    'Our_product_tagline' => [
        'label'       => esc_html__( 'Our Product Tagline', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Our Product Tagline Text',
    ],
    'Chill_image' => [
        'label'       => esc_html__( 'Chill Image', 'text_domain' ),
        'type'        => 'image',
        'description' => 'Chill Image will show into Client.',
    ],
    'Product' => [
        'label'       => esc_html__( 'Product', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Product Text',
    ],
    'Product_tagline' => [
        'label'       => esc_html__( 'Product Tagline', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Product Tagline Text',
    ],
    'Service' => [
        'label'       => esc_html__( 'Service', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Service Text',
    ],
    'Service_tagline' => [
        'label'       => esc_html__( 'Service Tagline', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Service Tagline Text',
    ],
    'Client_image' => [
        'label'       => esc_html__( 'Client Image', 'text_domain' ),
        'type'        => 'image',
        'description' => 'Client Image will show into Client.',
    ],
    'Review' => [
        'label'       => esc_html__( 'Review', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Review Text',
    ],
    'Reviewer_name' => [
        'label'       => esc_html__( 'Reviewer Name', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Reviewer Text',
    ],
    'Cust_image' => [
        'label'       => esc_html__( 'Cust Image', 'text_domain' ),
        'type'        => 'image',
        'description' => 'Cust Image will show into Client.',
    ],
    'Project' => [
        'label'       => esc_html__( 'Project', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Project Text',
    ],
    'Factory' => [
        'label'       => esc_html__( 'Factory', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Factory Text',
    ],
    'map' => [
        'label'       => esc_html__( 'Enter Link', 'text_domain' ),
        'type'        => 'map_link',
        'description' => 'Factory Text',
    ],
   
    'Factory_image' => [
        'label'       => esc_html__( 'Factory Image', 'text_domain' ),
        'type'        => 'image',
        'description' => 'Factory Image will show into Client.',
    ],
    'Footer_image' => [
        'label'       => esc_html__( 'Footer Image', 'text_domain' ),
        'type'        => 'image',
        'description' => 'This image will show into footer.',
    ],
    'Footer' => [
        'label'       => esc_html__( 'Footer', 'text_domain' ),
        'type'        => 'text',
        'description' => 'Footer',
    ],


    
    'Pg_image' => [
        'label'       => esc_html__( 'PG Image', 'text_domain' ),
        'type'        => 'image',
        'description' => 'This image will show into footer.',
    ],
    
];


new WPEX_Options_Panel( $panel_args, $panel_settings );
// Enqueue admin scripts and styles for the options panel
// function mytheme_admin_scripts(){
//     wp_enqueue_media();
//     wp_enqueue_script('mytheme-admin-script', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), '1.0', true);
// }
// add_action('admin_enqueue_scripts', 'mytheme_admin_scripts');

// Categories post type
add_action( 'init', 'my_theme_product_cat' );
// The custom function to register a custom article post type
function my_theme_product_cat() {
    // Set the labels. This variable is used in the $args array
    $labels = array(
        'name'               => __( 'product_cat' ),
        'singular_name'      => __( 'product_cat' ),
        'add_new'            => __( 'Add New product_cat' ),
        'add_new_item'       => __( 'Add New product_cat' ),
        'edit_item'          => __( 'Edit product_cat' ),
        'new_item'           => __( 'New product_cat' ),
        'all_items'          => __( 'All product_cat' ),
        'view_item'          => __( 'View product_cat' ),
        'search_items'       => __( 'Search product_cat' ),
        // 'featured_image'     => 'product_cat Image',
        'featured_image'     => 'product_cat Image',
        'set_featured_image' => 'Add product_cat Image'
    );
// The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'product_cat image and details add',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'       => false,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
    );
    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type('product_cat', $args);
}
add_theme_support('post-thumbnails');
add_image_size('full', 9999, 9999, false);



// image gallery========================
function theme_customizer_sections($wp_customize) {
    // Create a new section for the gallery customization
    $wp_customize->add_section('gallery_section', array(
        'title' => __(' Image Gallery', 'your_theme_textdomain'),
        'priority' => 30,
    ));
}
add_action('customize_register', 'theme_customizer_sections');

function theme_customizer_controls($wp_customize) {
    // Image Settings and Controls
    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting('gallery_image_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'gallery_image_' . $i, array(
            'label' => __('Image ' . $i, 'Narosundar'),
            'section' => 'gallery_section',
            'settings' => 'gallery_image_' . $i,
        )));
    }
}
add_action('customize_register', 'theme_customizer_controls');

function get_gallery_images() {
    $gallery_images = array();

    // Retrieve the URLs of the customizer settings for each image
    for ($i = 1; $i <= 6; $i++) {
        $gallery_images[] = get_theme_mod('gallery_image_' . $i);
    }

    return $gallery_images;
}


// slider post type  for factory
add_action( 'init', 'my_theme_factory' );
// The custom function to register a custom article post type
function my_theme_factory() {
    // Set the labels. This variable is used in the $args array
    $labels = array(
        'name'               => __( 'factory' ),
        'singular_name'      => __( 'Slider' ),
        'add_new'            => __( 'Add New Slider' ),
        'add_new_item'       => __( 'Add New Slider' ),
        'edit_item'          => __( 'Edit Slider' ),
        'new_item'           => __( 'New Slider' ),
        'all_items'          => __( 'All Sliders' ),
        'view_item'          => __( 'View Slider' ),
        'search_items'       => __( 'Search Slider' ),
        'featured_image'     => 'Slider Image',
        'set_featured_image' => 'Add Slider Image'
    );
// The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'Slider image and details add',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
    );
    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type('factory', $args);
}


// forwidget plugin
function register_address_widget_area() {
    register_sidebar(
        array(
            'id' => 'address-widget-area',
            'name' => esc_html__( 'Footer Address', 'theme-domain' ),
            'description' => esc_html__( 'Your address in footer', 'theme-domain' ),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        )
    );
}
    add_action( 'widgets_init', 'register_address_widget_area' );


    // Categories post Furniture
add_action( 'init', 'my_theme_product_cat1' );
// The custom function to register a custom article post type
function my_theme_product_cat1() {
    // Set the labels. This variable is used in the $args array
    $labels = array(
        'name'               => __( 'product_cat1' ),
        'singular_name'      => __( 'product_cat1' ),
        'add_new'            => __( 'Add New product_cat1' ),
        'add_new_item'       => __( 'Add New product_cat1' ),
        'edit_item'          => __( 'Edit product_cat1' ),
        'new_item'           => __( 'New product_cat1' ),
        'all_items'          => __( 'All product_cat1' ),
        'view_item'          => __( 'View product_cat1' ),
        'search_items'       => __( 'Search product_cat1' ),
        // 'featured_image'     => 'product_cat1 Image',
        'featured_image'     => 'product_cat1 Image',
        'set_featured_image' => 'Add product_cat1 Image'
    );
// The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'product_cat1 image and details add',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'has_archive'       => false,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
    );
    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type('product_cat1', $args);
}
add_theme_support('post-thumbnails');
add_image_size('full', 9999, 9999, false);


// contact us button==============================================
 
  
  





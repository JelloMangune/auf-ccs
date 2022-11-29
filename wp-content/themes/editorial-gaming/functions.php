<?php
/**
 * Editorial Gaming functions.
 *
 * @package Editorial
 * @subpackage Editorial gaming
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Set the theme version, based on theme stylesheet.
 *
 * @global string editorial_gaming_version
 */
function editorial_gaming_theme_version_info() {
    $editorial_gaming_theme_info = wp_get_theme();
    $GLOBALS['editorial_gaming_version'] = $editorial_gaming_theme_info->get( 'Version' );
}

add_action( 'after_setup_theme', 'editorial_gaming_theme_version_info' );

//google fonts
function editorial_gaming_fonts_url(){
	$fonts_url = '';

	$editorial_gaming_archivo = _x( 'on', 'Archivo: on or off', 'editorial-gaming' );


	if ( 'off' !== $editorial_gaming_archivo ) {

		$font_families = array();

		if ( 'off' !== $editorial_gaming_archivo ) {
				$font_families[] = 'Archivo:300,400,400i,700,700i,800';
		}

		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );

}


/**
 * Managed the theme default color
 */
function editorial_gaming_customize_register( $wp_customize ) {
	global $wp_customize;

	$wp_customize->get_setting( 'editorial_theme_color' )->default = '#D31919';

}

add_action( 'customize_register', 'editorial_gaming_customize_register', 20 );

/*------------------------------------------------------------------------------------------------*/
/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'editorial_gaming_scripts', 99 );

function editorial_gaming_scripts() {

    global $editorial_gaming_version;

    //google fonts
    wp_enqueue_style( 'editorial-gaming-fonts', editorial_gaming_fonts_url(), array(), null );

    wp_dequeue_style( 'editorial-style' );

    wp_dequeue_style( 'editorial-responsive-style' );

    wp_enqueue_style( 'editorial-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $editorial_gaming_version ) );

    wp_enqueue_style( 'editorial-parent-responsive', get_template_directory_uri() . '/assets/css/editorial-responsive.css', array(), esc_attr( $editorial_gaming_version ) );

    wp_enqueue_style( 'editorial-gaming-style', get_stylesheet_uri(), array(), esc_attr( $editorial_gaming_version ) );

    wp_enqueue_script( 'theia-sticky-sidebar', get_stylesheet_directory_uri() . '/js/stickysidebar/theia-sticky-sidebar.js', array( 'jquery' ), '1.4.0', true );

    wp_enqueue_script( 'editorial-gaming-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );


 	$get_categories = get_categories( array( 'hide_empty' => 1 ) );

    $editorial_gaming_theme_color = esc_attr( get_theme_mod( 'editorial_theme_color', '#D31919' ) );
    $editorial_gaming_theme_hover_color = editorial_hover_color( $editorial_gaming_theme_color, '-50' );

        $output_css = '';

        foreach( $get_categories as $category ){

            $cat_color = esc_attr( get_theme_mod( 'editorial_category_color_'.strtolower( $category->name ), '#D31919' ) );
            $cat_hover_color = esc_attr( editorial_hover_color( $cat_color, '-50' ) );
            $cat_id = esc_attr( $category->term_id );

            if( !empty( $cat_color ) ) {
                $output_css .= ".category-button.mt-cat-".$cat_id." a { background: ". $cat_color ."}\n";

                $output_css .= ".category-button.mt-cat-".$cat_id." a:hover { background: ". $cat_hover_color ."}\n";

                $output_css .= ".block-header.mt-cat-".$cat_id." { border-left: 2px solid ".$cat_color." }\n";

                $output_css .= ".rtl .block-header.mt-cat-".$cat_id." { border-left: none; border-right: 2px solid ".$cat_color." }\n";
                 
                $output_css .= ".archive .page-header.mt-cat-".$cat_id." { border-left: 4px solid ".$cat_color." }\n";

                $output_css .= ".rtl.archive .page-header.mt-cat-".$cat_id." { border-left: none; border-right: 4px solid ".$cat_color." }\n";

                $output_css .= "#site-navigation ul li.mt-cat-".$cat_id." { border-bottom-color: ".$cat_color." }\n";
            }
        }

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.edit-link .post-edit-link ,.reply .comment-reply-link,.home-icon,.search-main,.header-search-wrapper .search-form-main .search-submit,.mt-slider-section .bx-controls a:hover,.widget_search .search-submit,.error404 .page-title,.archive.archive-classic .entry-title a:after,#mt-scrollup,.widget_tag_cloud .tagcloud a:hover,.sub-toggle,#site-navigation ul > li:hover > .sub-toggle, #site-navigation ul > li.current-menu-item .sub-toggle, #site-navigation ul > li.current-menu-ancestor .sub-toggle,.ticker-content-wrapper .bx-controls a:hover,.home .home-icon a, .home-icon a:hover, .home-icon a:focus,.editorial-dark-mode .ticker-content-wrapper .bx-controls a,.widget_tag_cloud .tagcloud a:hover, .widget.widget_tag_cloud a:hover,#masthead #site-navigation ul li a.sub-toggle{ background:". $editorial_gaming_theme_color ."}\n";

        $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.widget_search .search-submit,.widget_tag_cloud .tagcloud a:hover,.ticker-content-wrapper .bx-controls a:hover{ border-color:". $editorial_gaming_theme_color ."}\n";

        $output_css .= ".comment-list .comment-body ,.header-search-wrapper .search-form-main{ border-top-color:". $editorial_gaming_theme_color ."}\n";

        $output_css .= "#site-navigation ul li,.header-search-wrapper .search-form-main:before{ border-bottom-color:". $editorial_gaming_theme_color ."}\n";

        $output_css .= ".archive .page-header,.block-header, .widget .widget-title-wrapper, .related-articles-wrapper .widget-title-wrapper{ border-left-color:". $editorial_gaming_theme_color ."}\n";

        $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,#cancel-comment-reply-link,#cancel-comment-reply-link:before, .logged-in-as a,.top-menu ul li a:hover,#footer-navigation ul li a:hover,#site-navigation ul li:hover > a, #site-navigation ul li.current-menu-item > a, #site-navigation ul li.current_page_item > a, #site-navigation ul li.current-menu-ancestor > a, #site-navigation ul li.focus > a,.slider-meta-wrapper a:hover,.featured-meta-wrapper span:hover,.featured-meta-wrapper a:hover,.post-meta-wrapper > span:hover,.post-meta-wrapper span > a:hover ,.grid-posts-block .post-title a:hover,.list-posts-block .single-post-wrapper .post-content-wrapper .post-title a:hover,.column-posts-block .single-post-wrapper.secondary-post .post-content-wrapper .post-title a:hover,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.entry-title a:hover,.entry-meta span a:hover,.post-readmore a:hover,.archive-classic .entry-title a:hover,
            .archive-columns .entry-title a:hover,.related-posts-wrapper .post-title a:hover,.block-header .block-title a:hover,.widget .widget-title a:hover,.related-articles-wrapper .related-title a:hover,.entry-meta > span:hover:before,.editorial-dark-mode .widget_archive a:hover,.editorial-dark-mode .widget_categories a:hover,.editorial-dark-mode .widget_recent_entries a:hover,.editorial-dark-mode .widget_meta a:hover,.editorial-dark-mode .widget_recent_comments li:hover,.editorial-dark-mode .widget_rss li:hover,.editorial-dark-mode .widget_pages li a:hover,.editorial-dark-mode .widget_nav_menu li a:hover,.editorial-dark-mode .wp-block-latest-posts li a:hover,.editorial-dark-mode .wp-block-archives li a:hover,.editorial-dark-mode .wp-block-categories li a:hover,.editorial-dark-mode .wp-block-page-list li a:hover{ color:". $editorial_gaming_theme_color ."}\n";

        $refine_output_css = editorial_css_strip_whitespace( $output_css );

        wp_add_inline_style( 'editorial-gaming-style', $refine_output_css );

}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 function editotial_gaming_body_classes( $classes ) {
    
    /**
     * option for dark mode
     */
     $editorial_gaming_dark_mode_option = esc_attr( get_theme_mod( 'editorial_gaming_dark_mode_option', 'enable' ) );
     if ( 'enable' == $editorial_gaming_dark_mode_option ) {
        $classes[] = esc_attr( 'editorial-dark-mode' );
     }
     
     return $classes;
 }
 
 add_filter( 'body_class', 'editotial_gaming_body_classes' );
 
 /**
 * Function for displaying menu item description
 */
function editorial_gaming_nav_description( $item_output, $item, $depth, $args ) {
    if ( ! empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="menu-item-description">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'editorial_gaming_nav_description', 10, 4 );
 
 // required customizer file.
require get_stylesheet_directory() . '/inc/customizer.php';
require get_stylesheet_directory() . '/inc/mt-theme-settings.php';
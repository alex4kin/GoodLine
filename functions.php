<?php
/**
 * functions.php
 * The theme's functions
 */
/*
 * Constants
 * */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . 'assets/images' );
define( 'JS', THEMEROOT . 'assets/js' );

/*
 * Theme setup
 * */
if ( ! function_exists( 'alfa_theme_setup' ) ) {
	function alfa_theme_setup() {
		/* Make the theme available for translation */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'alfa', $lang_dir );

		/* Add support automatic feed links */
		add_theme_support( 'automatic-feed-links' );

		/* Add support for post thumbnails */
		add_theme_support( 'post-thumbnails' );

		/* Add support for post formats */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video'
			)
		);

		/* Register nav menus */
		register_nav_menus( array(
			'main-menu' => __('Main menu', 'alfa')
		) );
	}

	add_action( 'after_setup_theme', 'alfa_theme_setup' );
}

/* Get post meta */
if ( ! function_exists( 'alfa_post_meta' ) ) {
	function alfa_post_meta() {
		if ( get_post_type() === 'post' ) {
			// post author
			echo '<p class="post-meta">';
			echo '<span>' . get_the_date() . ' </span>';
			//_e('by', 'alfa');
			printf(' : <a href="%' . '1$s" rel="author"> %2$s </a> : ', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );
			//_e('on', 'alfa');
			//echo ' &ndash; <span>' . get_the_date() . ' </span>';
			if ( is_sticky() ) {
				echo ' <span class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'alfa' ) . '</span>';
			}
			echo '</p>';
			if ( is_user_logged_in() ) {
				echo '<p>';
				// The categories.
				$category_list = get_the_category_list( ', ' );
				if ( $category_list ) {
					echo '<span class="meta-categories"> ' . $category_list . ' </span>';
				}
				// The tags.
				$tag_list = get_the_tag_list( '', ', ' );
				if ( $tag_list ) {
					echo '<span class="meta-tags"> ' . $tag_list . ' </span>';
				}
				echo '</p>';
			}
			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<p>';
				edit_post_link( __( 'Edit', 'alfa' ), '<span class="meta-edit">', '</span>' );
				echo '</p>';
			}
		}
	}
}

/* Numbered pagination */
if ( ! function_exists( 'alfa_numbered_pagination' ) ) {
	function alfa_numbered_pagination() {
		$args = array(
			'prev_next' => false,
			'type' => 'array'
		);

		echo '<div class="col-md-12">';
		$pagination = paginate_links( $args );

		if ( is_array( $pagination ) ) {
			echo '<ul class="nav nav-pills">';
			foreach ( $pagination as $page ) {
				if ( strpos( $page, 'current' ) ) {
					echo '<li class="active"><a href="#">' . $page . '</a></li>';
				} else {
					echo '<li>' . $page . '</li>';
				}
			}
			echo '</ul>';
		}
		echo '</div>';
	}
}

/* Navigation to the next/previous set of posts */
if ( ! function_exists( 'alfa_paging_nav' ) ) {
	function alfa_paging_nav() { ?>
		<ul class="nav-paging">
			<?php
			if ( get_previous_posts_link() ) : ?>
				<li class="next">
					<?php previous_posts_link( __( 'Newer Posts', 'alfa' ) ); ?>
				</li>
			<?php endif;
			?>
			<?php
			if ( get_next_posts_link() ) : ?>
				<li class="previous">
					<?php next_posts_link( __( 'Older Posts', 'alfa' ) ); ?>
				</li>
			<?php endif;
			?>
		</ul> <?php
	}
}

/* Register widget areas */
if ( ! function_exists( 'alfa_widget_init' ) ) {
	function alfa_widget_init() {
		if (function_exists('register_sidebar')) {
			register_sidebar( array(
				'name' => __('Main Widget Area', 'alfa'),
				'id' => 'main-sidebar',
				'description' => __('Appears in the blog pages', 'alfa'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div><!-- // .widget -->',
				'before_title' => '<h2>',
				'after_title' => '</h2>'
			) );
		}
	}

	add_action( 'widgets_init', 'alfa_widget_init' );
}

/* Scripts */
if ( ! function_exists( 'alfa_scripts' ) ) {
	function alfa_scripts() {
		/* Register scripts */
		wp_register_script( 'bootstrap-js', THEMEROOT . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'lightbox-js', THEMEROOT . '/assets/lightbox/js/lightbox-2.6.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'afscript-js', THEMEROOT . '/assets/js/afscript.js', array( 'jquery' ), false, true );

		/* Load custom scripts */
		wp_enqueue_script('bootstrap-js');
		wp_enqueue_script('lightbox-js');
		wp_enqueue_script('afscript-js');

		/* Load the stylesheets */
		wp_enqueue_style( 'bootstrap-css', THEMEROOT . '/assets/bootstrap/css/bootstrap.min.css' );
		wp_enqueue_style( 'fontawesome-css', THEMEROOT . '/assets/fontawesome/css/font-awesome.min.css' );
		wp_enqueue_style( 'master-css', THEMEROOT . '/assets/css/master.css' );
		wp_enqueue_style( 'gallerylb-css', THEMEROOT . '/assets/lightbox/css/lightbox.css' );
	}

	add_action( 'wp_enqueue_scripts', 'alfa_scripts' );
}

/* Excluding Categories from Homepage */

/* MU plugin cyr2lat. */
require_once get_parent_theme_file_path( '/inc/cyr-to-lat.php' );

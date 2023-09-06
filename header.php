<?php
/**
 * header.php
 * The theme header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ) ?>">
	<title><?php wp_title( '::', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri().'/'; ?>assets/favicon/favicon.png">

	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<nav class="navbar _navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">

			<button type="button" class="navbar-toggle collapsed burger" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="inner"></span>
			</button>
			<?php if ( is_home() ) { ?>
				<a href="<?php echo site_url().'/'; ?>" class="language-selector ru">RU</a>
				<a href="<?php echo site_url().'/en/'; ?>" class="language-selector en">EN</a>
			<?php } else { ?>
				<a href="<?php echo site_url().'/'.get_page_uri(); ?>" class="language-selector ru">RU</a>
				<a href="<?php echo site_url().'/en/'.get_page_uri(); ?>" class="language-selector en">EN</a>
			<?php } ?>
			<a class="navbar-brand" href="<?php echo esc_url( home_url('/') ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div class="searchontop">
				<form role="search" method="get" id="searchform-top" action="<?php echo home_url( '/' ) ?>" >
					<label class="screen-reader-text" for="s">
						<?php echo __( 'Search for:', 'alfa' ); ?>
					</label>
					<input type="text" value="<?php echo get_search_query() ?>" placeholder="<?php echo __( 'Search', 'alfa' ); ?>" name="s" id="s">
					<input type="submit" id="searchsubmit" value="<?php echo __( 'Search', 'alfa' ); ?>">
				</form>
				<i class="fa fa-search"></i>
			</div>
			<?php
				wp_nav_menu( array(
					'menu_class' => 'nav navbar-nav navbar-right',
					'menu_location' => 'main-menu',
					'container' => false
				) );
			?>
		</div><!-- // .nav-collapse -->
	</div>
</nav><!-- // .navbar -->

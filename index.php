<?php
/*
 * index.php
 *
 * The main template file
 * */
?>

<?php get_header(); ?>

<main class="contentus">
	<div class="container-fluid" role="main">
		<div class="row main-content">

			<div class="col-sm-8 mainbar">
				<?php
				$promos = get_cat_ID('promos');
				$footers = get_cat_ID('footers');
				$excludeCats = 'cat=-' . $promos . ', -' . $footers;
				$ex_query = new WP_Query( $excludeCats );
				?>
				<?php if ( $ex_query->have_posts() ) : while ( $ex_query->have_posts() ) : $ex_query->the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
				<?php endwhile ?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif ?>

				<?php alfa_numbered_pagination(); ?>

			</div><!-- // .mainbar -->

			<div class="col-sm-4 sidebar">

				<?php get_sidebar(); ?>

			</div><!-- // .sidebar -->

		</div><!-- // .main-content -->
	</div>
</main><!-- // .container -->

<?php get_footer(); ?>

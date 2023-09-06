<?php
/**
 * footer.php
 * The template for footer
 */
?>

<footer class="main-footer">
	<div class="container-fluid">

		<!-- Row of columns -->
		<div class="row">

			<?php
			$args = array(
				'posts_per_page' => 1,
				'orderby'        => 'ASC',
				'category_name'  => 'footer-one'
			);
			$query = new WP_query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				echo ( '<div class="col-md-4 col-sm-6 col-xs-12">' );
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<h2 class="section-title">' . get_the_title() . '</h2>';
					echo '<div class="entry-content">';
					the_excerpt();
					echo '</div>';
				}
				echo ( '<p><a class="btn btn-default" href="');
				the_permalink();
				echo ('" role="button">' . __( 'View details', 'alfa') . '</a></p>');
				echo ( '</div><!-- // footer-one -->' );
			}
			wp_reset_postdata();
			?>

			<?php
			$args = array(
				'posts_per_page' => 1,
				'orderby'        => 'ASC',
				'category_name'  => 'footer-two'
			);
			$query = new WP_query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				echo ( '<div class="col-md-4 col-sm-6 col-xs-12">' );
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<h2 class="section-title">' . get_the_title() . '</h2>';
					echo '<div class="entry-content">';
					the_excerpt();
					echo '</div>';
				}
				echo ( '<p><a class="btn btn-default" href="');
				the_permalink();
				echo ('" role="button">' . __( 'View details', 'alfa') . '</a></p>');
				echo ( '</div><!-- // footer-two -->' );
			}
			wp_reset_postdata();
			?>

			<?php
			$args = array(
				'posts_per_page' => 1,
				'orderby'        => 'ASC',
				'category_name'  => 'footer-three'
			);
			$query = new WP_query( $args );
			// The Loop
			if ( $query->have_posts() ) {
				echo ( '<div class="col-md-4 col-sm-12 col-xs-12">' );
				while ( $query->have_posts() ) {
					$query->the_post();
					echo '<h2 class="section-title">' . get_the_title() . '</h2>';
					echo '<div class="entry-content">';
					the_excerpt();
					echo '</div>';
				}
				echo ( '<p><a class="btn btn-default" href="');
				the_permalink();
				echo ('" role="button">' . __( 'View details', 'alfa') . '</a></p>');
				echo ( '</div><!-- // footer-three -->' );
			}
			wp_reset_postdata();
			?>

		</div><!-- // .row -->

		<hr>

		<div class="copyright">
			<p>&copy;&nbsp;<?php echo date('Y'); ?> Goodline.spb.ru</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

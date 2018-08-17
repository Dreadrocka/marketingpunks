<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

				<!-- <?php // get_template_part( 'loop-templates/content', 'page' ); ?> -->

				<?php the_title(); ?>

				<?php the_content(); ?>

				<?php endwhile; // end of the loop. ?>

				<?php $case_args = array(
					'post_type' => 'case_studies',
					'orderby' => 'ID',
					'order' => 'ASC'
				);

				$case_query = new WP_Query($case_args);

				while ( $case_query->have_posts() ) : $case_query->the_post();

					get_template_part( 'loop-templates/content', get_post_format() );
					?>

				<?php endwhile; // end of the loop. ?>

				<?php wp_reset_query(); ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
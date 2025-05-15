<?php
/**
 * The main template file
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="col-md-7 me-md-auto site-main" id="main">
				
				<?php
				if ( have_posts() ) : ?>
				<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="col">
							<?php get_template_part( 'loop-templates/content', 'home' ); ?>
						</div>
					
					<?php endwhile; ?>
				</div>
				
				<?php else : ?>
					<?php get_template_part( 'loop-templates/content', 'none' ); ?>
				<?php endif; ?>

				<?php understrap_pagination(); ?>
					
			</main>

			
			<?php
			get_template_part( 'sidebar-templates/sidebar', 'right' );
			?>
			
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();

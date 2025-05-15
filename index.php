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
					$selected_cat = isset($_GET['category']) ? intval($_GET['category']) : '';
					$categories = get_categories( array(
						'slug' => array('footy', 'cricket'),
						'hide_empty' => false,
					) );
					?>
					<form method="get" class="mb-4">
						<label for="category" class="form-label">Filter by Sport:</label>
						<select name="category" id="category" class="form-select" onchange="this.form.submit()">
							<option value="">-- Select your sport --</option>
							<?php foreach ( $categories as $cat ) : ?>
								<option value="<?php echo esc_attr( $cat->term_id ); ?>" <?php selected( $selected_cat, $cat->term_id ); ?>>
									<?php echo esc_html( $cat->name ); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</form>

				
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 10,
						'paged' => $paged,
					);

					if ( $selected_cat ) {
						$args['cat'] = $selected_cat;
					}

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) : ?>

				<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
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

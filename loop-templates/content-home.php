<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('card h-100'); ?> id="post-<?php the_ID(); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
            <img
                src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'full' ) ); ?>"
                class="card-img-top"
                alt="<?php the_title_attribute(); ?>"
                loading="lazy"
            />
        <?php endif; ?>

        <div class="card-body">
        <h5 class="card-title">
            <a href="<?php the_permalink(); ?>" class="stretched-link text-decoration-none text-dark">
                <?php the_title(); ?>
            </a>
        </h5>
            <?php if ( 'post' === get_post_type() ) : ?>
            <p class="card-subtitle text-muted mb-2">
                <?php understrap_posted_on(); ?>
            </p>
        <?php endif; ?>

        <p class="card-text">
            <?php the_excerpt(); ?>
        </p>
        </div>
    
        <div class="card-footer bg-white border-0">
        <?php understrap_entry_footer(); ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->

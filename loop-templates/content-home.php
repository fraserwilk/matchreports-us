<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <wa-card with-image with-header with-footer class="card-overview">
        <div slot="header" class="wa-split">
            <img
                slot="image"
                src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'full' ) ); ?>"
                alt="<?php echo esc_attr( get_the_title() ); ?>"
                class="wa-frame wa-border-radius-l"
                loading="lazy"
            />

            <div class="wa-heading">
                <?php
                the_title(
                    sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                    '</a>'
                );
                ?>
            </div>
            <small class="wa-caption-m">
                <?php if ( 'post' === get_post_type() ) : ?>

                    <div>
                        <?php understrap_posted_on(); ?>
                    </div><!-- .entry-meta -->

                <?php endif; ?>
            </small>
        </div>

		

    
        <div class="entry-content">

            <?php
            the_excerpt();
            understrap_link_pages();
            ?>

        </div><!-- .entry-content -->

        <div slot="footer" class="wa-split:column wa-align-items-start">
            <?php understrap_entry_footer(); ?>
        </div>
    </wa-card>

</article><!-- #post-<?php the_ID(); ?> -->

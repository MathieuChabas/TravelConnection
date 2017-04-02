<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row blog-posts">
        <div class="col-sm-offset-2 col-sm-6">
            <div class="single-post">
                <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
                <span class="date"><?php the_date() ?></span>
                <div class="blog-image">
                    <?php the_post_thumbnail() ?>
                </div>
                <div class="excerpt">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

            // Previous/next post navigation.
            the_post_navigation( array(
            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
            '<span class="post-title">%title</span>',
            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
            '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
            '<span class="post-title">%title</span>',
            ) );
            ?>
        </div>
        <div class="col-sm-3 blog-side-bar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</article><!-- #post-## -->

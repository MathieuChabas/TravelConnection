<?php
/* Template Name: Blog */

get_header(); ?>
	<div class="container-fluid">
        <article>
            <?php
            $wp_query = new WP_Query();
            $wp_query->query('posts_per_page=5' . '&paged='.$paged);
            ?>
            <div class="row blog-posts">
                <div class="col-sm-offset-2 col-sm-6">
                    <?php
                    while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <div class="single-post">
                            <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
                            <span class="date"><?php the_date() ?></span>
                            <div class="blog-image">
                                <?php the_post_thumbnail() ?>
                            </div>
                            <div class="excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
                        </div>
                    <?php endwhile; ?>

                    <?php if ($paged > 1) { ?>

                        <nav id="nav-posts">
                            <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
                            <div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
                        </nav>

                    <?php } else { ?>

                        <nav id="nav-posts">
                            <div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
                        </nav>

                    <?php } ?>

                    <?php wp_reset_postdata(); ?>
                </div>
                <div class="col-sm-3 blog-side-bar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </article>
	</div><!-- .content-area -->

<?php get_footer(); ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( have_posts() ) : ?>
    <ul class="block_grid by_2">
        <?php /* Start loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <li>
                <?php wpbp_post_before(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php wpbp_post_inside_before(); ?>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('inform_medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <header class="post-header">
                        <div class="post-meta">
                            <time class="post-date updated" datetime="<?php the_time('c'); ?>" pubdate><?php printf(__('Posted on %s', 'wpbp'), get_the_time(__('l, F jS, Y', 'wpbp'))); ?></time>
                            <span class="post-author byline author vcard"><?php _e('by', 'wpbp'); ?> <?php the_author_posts_link(); ?></span>
                        </div>
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                    </header>
                    <section class="post-content">
                        <?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search ?>
                            <?php the_excerpt(); ?>
                        <?php else : ?>
                            <?php the_content(); ?>
                        <?php endif; ?>
                    </section>
                    <footer class="post-footer">
                        <p class="post-tags"><?php the_tags(); ?></p>
                    </footer>
                    <?php wpbp_post_inside_after(); ?>
                </article>
                <?php wpbp_post_after(); ?>
            </li>
        <?php endwhile; // End the loop ?>
    </ul>

    <?php /* Display navigation to next/previous pages when applicable */ ?>
    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="post-nav">
            <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'wpbp' ) ); ?></div>
            <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'wpbp' ) ); ?></div>
        </nav>
    <?php endif; ?>
<?php else : ?>
    <div class="notice">
        <p class="bottom"><?php _e('Sorry, no results were found.', 'wpbp'); ?></p>
    </div>
    <?php get_search_form(); ?>
<?php endif; ?>
